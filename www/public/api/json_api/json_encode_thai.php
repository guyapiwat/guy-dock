<?php
function js_thai_encode($data)
{	// fix all thai elements
    if (is_array($data))
    {
        foreach($data as $a => $b)
        {
            if (is_array($data[$a]))
            {
                $data[$a] = js_thai_encode($data[$a]);
            }
            else
            {
                $data[$a] = iconv("tis-620","utf-8",$b);
            }
        }
    }
    else
    {
        $data =iconv("tis-620","utf-8",$data);
    }
    return $data;
}
?>
