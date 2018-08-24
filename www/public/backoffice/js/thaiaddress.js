	var xmlHttp;
	var pPanel;
	function createAddressRQ(){
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
	function startAddressRQ(table,val){
		createAddressRQ();
		//alert(table);
		pPanel = table+"Section";
		page = table+"Select.php?tb="+table+"&val="+val;
		//alert(page);
		xmlHttp.open("get", page, true);

		xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=utf-8'");
		xmlHttp.onreadystatechange = function (){

			if(xmlHttp.readyState == 4){
				if(xmlHttp.status == 200){
					//		alert(xmlHttp.responseText);

					saveAddressRS(xmlHttp.responseText);
				}else{					
					saveAddressRS("error " + xmlHttp.statusText);
				}
			}
		};
		xmlHttp.send(null);

	}
	
	
	function saveAddressRS(pMessage){
		var divStatus = document.getElementById(pPanel);
		//alert(pMessage);
		divStatus.innerHTML = pMessage;

		//pMessage = pMessage.replace(String.fromCharCode(13),"x");
		//pMessage = pMessage.replace(String.fromCharCode(13),"y");
	}
