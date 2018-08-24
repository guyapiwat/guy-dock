<?

class XmlToArray
{
	 
	var $xml='';
	 
	/**
	 * Default Constructor
	 * @param $xml = xml data
	 * @return none
	 */
	 
	function XmlToArray($xml)
	{
		$this->xml = $xml;
	}
	 
	/**
	 * _struct_to_array($values, &$i)
	 *
	 * This is adds the contents of the return xml into the array for easier processing.
	 * Recursive, Static
	 *
	 * @access    private
	 * @param    array  $values this is the xml data in an array
	 * @param    int    $i  this is the current location in the array
	 * @return    Array
	 */
	 
	function _struct_to_array($values, &$i)
	{
		$child = array();
		if (isset($values[$i]['value'])) array_push($child, $values[$i]['value']);
		 
		while ($i++ < count($values)) {
			switch ($values[$i]['type']) {
				case 'cdata':
					array_push($child, $values[$i]['value']);
					break;
					 
				case 'complete':
					$name = $values[$i]['tag'];
					if(!empty($name)){
						$child[$name]= ($values[$i]['value'])?($values[$i]['value']):'';
						if(isset($values[$i]['attributes'])) {
							$child[$name] = $values[$i]['attributes'];
						}
					}
					break;
					 
				case 'open':
					$name = $values[$i]['tag'];
					$size = isset($child[$name]) ? sizeof($child[$name]) : 0;
					$child[$name][$size] = $this->_struct_to_array($values, $i);
					break;
					 
				case 'close':
					return $child;
					break;
			}
		}
		return $child;
	}//_struct_to_array
	 
	/**
	 * createArray($data)
	 *
	 * This is adds the contents of the return xml into the array for easier processing.
	 *
	 * @access    public
	 * @param    string    $data this is the string of the xml data
	 * @return    Array
	 */
	function createArray()
	{
		$xml    = $this->xml;
		$values = array();
		$index  = array();
		$array  = array();
		$parser = xml_parser_create();
		xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
		xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
		xml_parse_into_struct($parser, $xml, $values, $index);
		xml_parser_free($parser);
		$i = 0;
		$name = $values[$i]['tag'];
		$array[$name] = isset($values[$i]['attributes']) ? $values[$i]['attributes'] : '';
		$array[$name] = $this->_struct_to_array($values, $i);
		return $array;
	}//createArray
	 
	 
}//XmlToArray



function xml($xml){
	$xmlObj    = new XmlToArray($xml);
	$arrayData = $xmlObj->createArray();
	return $arrayData;
}

function httpPost($ip=null,$port=80,$uri=null,$content=null) {
	if (empty($ip))         { return false; }
	if (!is_numeric($port)) { return false; }
	if (empty($uri))        { return false; }
	if (empty($content))    { return false; }
	// generate headers in array.
	$t   = array();
	$t[] = 'POST ' . $uri . ' HTTP/1.1';
	$t[] = 'Content-Type: application/x-www-form-urlencoded';
	$t[] = 'Host: ' . $ip . ':' . $port;
	$t[] = 'Content-Length: ' . strlen($content);
	$t[] = 'Connection: close';
	$t   = implode("\r\n",$t) . "\r\n\r\n" . $content;

	//
	// Open socket, provide error report vars and timeout of 10
	// seconds.
	//
	$fp  = @fsockopen($ip,$port,$errno,$errstr,10);
	// If we don't have a stream resource, abort.
	if (!(get_resource_type($fp) == 'stream')) { return false; }
	//
	// Send headers and content.
	//
	if (!fwrite($fp,$t)) {
		fclose($fp);
		return false;
	}
	//
	// Read all of response into $rsp and close the socket.
	//
	$rsp = '';
	while(!feof($fp)) { $rsp .= fgets($fp,8192); }
	fclose($fp);
	//
	// Call parseHttpResponse() to return the results.
	//
	return parseHttpResponse($rsp);
}

//
// Accepts provided http content, checks for a valid http response,
// unchunks if needed, returns http content without headers on
// success, false on any errors.
//
function parseHttpResponse($content=null) {
	if (empty($content)) { return false; }
	// split into array, headers and content.
	$hunks = explode("\r\n\r\n",trim($content));
	if (!is_array($hunks) or count($hunks) < 2) {
		return false;
	}
	$header  = $hunks[count($hunks) - 2];
	$body    = $hunks[count($hunks) - 1];
	$headers = explode("\n",$header);
	unset($hunks);
	unset($header);
	if (!validateHttpResponse($headers)) { return false; }
	if (in_array('Transfer-Coding: chunked',$headers)) {
		return trim(unchunkHttpResponse($body));
	} else {
		return trim($body);
	}
}

//
// Validate http responses by checking header.  Expects array of
// headers as argument.  Returns boolean.
//
function validateHttpResponse($headers=null) {
	if (!is_array($headers) or count($headers) < 1) { return false; }
	switch(trim(strtolower($headers[0]))) {
		case 'http/1.0 100 ok':
		case 'http/1.0 200 ok':
		case 'http/1.1 100 ok':
		case 'http/1.1 200 ok':
			return true;
			break;
	}
	return false;
}

//
// Unchunk http content.  Returns unchunked content on success,
// false on any errors...  Borrows from code posted above by
// jbr at ya-right dot com.
//
function unchunkHttpResponse($str=null) {
	if (!is_string($str) or strlen($str) < 1) { return false; }
	$eol = "\r\n";
	$add = strlen($eol);
	$tmp = $str;
	$str = '';
	do {
		$tmp = ltrim($tmp);
		$pos = strpos($tmp, $eol);
		if ($pos === false) { return false; }
		$len = hexdec(substr($tmp,0,$pos));
		if (!is_numeric($len) or $len < 0) { return false; }
		$str .= substr($tmp, ($pos + $add), $len);
		$tmp  = substr($tmp, ($len + $pos + $add));
		$check = trim($tmp);
	} while(!empty($check));
	unset($tmp);
	return $str;
}

?>