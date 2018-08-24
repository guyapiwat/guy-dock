	var xmlHttp;

	function autocreateRQ(){
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
	function autostartRQ(fieldcheck,fieldval,fieldskip,fieldarg,fielddesc,tb,panel,panel2,codeid){
	document.getElementById('ok').disabled=true;
		autocreateRQ();
			pPanel = panel;
			nPanel = panel2;
		page = "autoerrcheck.php?fchk="+encodeURIComponent(fieldcheck)+"&farg="+encodeURIComponent(fieldarg)+"&fval="+encodeURIComponent(fieldval)+"&fskip="+encodeURIComponent(fieldskip)+"&fdesc="+encodeURIComponent(fielddesc)+"&tb="+tb+"&nchk="+encodeURIComponent(codeid);
		//alert(page);
		xmlHttp.open("get", page, true);
		xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=utf-8'");
		xmlHttp.setRequestHeader("Cache-Control", "no-cache");
		xmlHttp.setRequestHeader("Pragma", "no-cache");
		xmlHttp.onreadystatechange = function (){
			if(xmlHttp.readyState == 4){
				if(xmlHttp.status == 200){
					autosaveResult(xmlHttp.responseText);
				}else{					
					autosaveResult("error " + xmlHttp.statusText);
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
	
	function autosaveResult(pMessage){

		var divStatus = document.getElementById(pPanel);
		
		var msginfo = pMessage.split(",");
		//alert(msginfo.length);
		if(msginfo.length > 1){
			divStatus.innerHTML = "<font color='#009900'>"+msginfo[0]+"</font>";
			document.getElementById(nPanel).value = msginfo[1];			
		}else{
			//alert(nPanel);
			divStatus.innerHTML = pMessage;
			document.getElementById(nPanel).value = "";
		}
	
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
		}/*
		if(pMessage=="<font color='#009900'>pass</font>")
			document.getElementById('ok').disabled=false;*/
	}