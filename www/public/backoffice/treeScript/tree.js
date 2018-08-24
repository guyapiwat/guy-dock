	var xmlHttp;
	var pPanel;
	function createTree(panel){
		stat = "s_"+panel;
	var stat = "s_" + panel;
	 check = document.getElementById(stat).my;
		 if(check == "+"){
	 		document.getElementById(stat).my="-";
			startRQ(panel,0);
	 	}else if(check == "-"){
			document.getElementById(stat).my="+";
			startRQ(panel,1);
		}
	}
	function createRQ(){
		if(window.ActiveXObject){
			xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		}else if(window.XMLHttpRequest){
			xmlHttp = new XMLHttpRequest();
		}
	}
	function startRQ(panel,flag){
		createRQ();
		//alert(n);
		if(flag == 0){
			pPanel = "h_"+panel;
			page = "tree_view.php?pmc=" + panel;
		}else{
			pPanel = "h_" + panel;
			page = "clear_tree_view.php?pmc=" + panel;
		}
		xmlHttp.open("get", page, true);
		xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=tis-620'");
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
	}
	function test(panel){
		alert(document.getElementById("s_"+panel).innerHTML);
	}
	
