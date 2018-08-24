	var xmlHttp;

	function createRQ(){
		if(window.ActiveXObject){
			xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		}else if(window.XMLHttpRequest){
			xmlHttp = new XMLHttpRequest();
		}
	}
	//flag 
	//-format : null-size-format-dup-real-loop
	//-value : 0/1-0/size-0/1/2-0/1-0/1-0/1
	//
	function startRQ(fieldcheck,fieldval,fieldskip,fieldarg,fielddesc,tb,panel){
		document.getElementById('ok').disabled=true;
		createRQ();
		//alert(n);
		pPanel = panel;
		page = "errcheck.php?fchk="+encodeURIComponent(fieldcheck)+"&farg="+encodeURIComponent(fieldarg)+"&fval="+encodeURIComponent(fieldval)+"&fskip="+encodeURIComponent(fieldskip)+"&fdesc="+encodeURIComponent(fielddesc)+"&tb="+tb;
		//alert(page);
		xmlHttp.open("get", page, true);
		xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=utf-8'");
		xmlHttp.onreadystatechange = function (){
			if(xmlHttp.readyState == 4){
				if(xmlHttp.status == 200){
					saveResult(xmlHttp.responseText);
				}else{					
					saveResult("error " + xmlHttp.statusText);
				}
			}
		};
		xmlHttp.send(null);

	}
	
	/*function getRQBody(pForm){
		var nParams = new Array();
		for(i=0;i<pForm.elements.length; i++){
			var pParam = encodeURIComponent(pForm.elements[i].name);
			pParam += "=";
			pParam += encodeURIComponent(pForm.elements[i].value);
			nParams.push(pParam);
		}
		return nParams.join("&");
	}*/
	
	function saveResult(pMessage){
		var divStatus = document.getElementById(pPanel);
		divStatus.innerHTML = pMessage;
		//document.getElementById('sp_name').value = 
		//pMessage = pMessage.replace(String.fromCharCode(13),"x");
		//pMessage = pMessage.replace(String.fromCharCode(13),"y");
		for(i=0;i<pMessage.length;i++){
			if(pMessage.charCodeAt(i)==10)
				pMessage = pMessage.replace(String.fromCharCode(10),String.fromCharCode(9));
		}
		for(i=0;i<pMessage.length;i++){
			if(pMessage.charCodeAt(i)==13)
				pMessage = pMessage.replace(String.fromCharCode(13),String.fromCharCode(9));
		}
		//for(i=0;i<pMessage.length;i++){
		//	if(pMessage.charCodeAt(i)==9)
		//		pMessage = pMessage.replace(String.fromCharCode(9),"x");
		//}
		while(pMessage.charCodeAt(0)==9){
			pMessage = pMessage.substr(1);
			//alert(pMessage.charCodeAt(0));
			 //alert(pMessage);
		}
	 
		if(pMessage.indexOf('pass') > 0 ){
			
		 
			document.getElementById('ok').disabled=false;
		}
	}
