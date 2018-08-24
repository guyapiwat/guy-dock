// JavaScript Document
//check(NULL,size,type,dup,real,name)

function createRQ(){
	if(window.ActiveXObject){
		xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
	}else if(window.XMLHttpRequest){
		xmlHttp = new XMLHttpRequest();
	}
}

function check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg){
	//var nullVal = nullCheck.split('=');
	//var APB = 0; //alphabet define
	//var NMB = 1; //number define
	//var numreg = "(^[0-9])";
	var basiccheck =0;
	var basicnum =0;
	var numreg = "(^-?[1-9](\d{1,2}(\,\d{3})*|\d*)|^0{1})";
	//var digitreg = "(^-?[1-9](\d{1,2}(\,\d{3})*|\d*)|^0{1})";
	var alpreg = "(^[a-z]|[A-Z])";
//var test = "0";
//var tmp = test.split("5");
//alert(tmp[0]);
	sizeCheck = sizeCheck.toString();
	var sizeVal = sizeCheck.split("=");
	formatCheck = formatCheck.toString();
	var formatVal = formatCheck.split("=");
	dupCheck = dupCheck.toString();
	var dupVal = dupCheck.split("=");
	realCheck = realCheck.toString();
	var realVal = realCheck.split("=");
	//dupCheck = dupCheck.toString();
	//var dupVal = dupCheck.split("=");
	//alert(document.getElementById(idName).value);
	basicnum = parseInt(nullCheck) + parseInt(sizeVal[0]) + parseInt(formatVal[0]);
	if(nullCheck==1 && document.getElementById(idName).value==""){
		alert("ข้อมูลในช่อง " + errmsg + "ไม่ได้กรอก");
		document.getElementById(idName).focus();
		return false;
	}else	
		basiccheck++;
	if(sizeVal[0]==1 && document.getElementById(idName).value.length!=sizeVal[1]){
		alert("ข้อมูลในช่อง " + errmsg + "เป็นข้อมูลที่ต้องมีขนาด " + sizeVal[1] + "เท่านั้น");
		document.getElementById(idName).focus();
		return false;
	}else if(sizeVal[0]==1)
		basiccheck++;
	if(formatVal[0]==1){
		var regular;
		var m;
		if(formatVal[1]=="ALP"){
			regular = new RegExp(alpreg);
  			if(!regular.exec(document.getElementById(idName).value)){
				alert("ข้อมูลในช่อง " + errmsg + "มีรูปแบบข้อมูลผิดพลาด ต้องเป็นตัวอักษรเท่านั้น");
				document.getElementById(idName).focus();
				return false;
			}else	
				basiccheck++;
		}else if(formatVal[1]=="NMB"){
			regular = new RegExp(numreg);
  			if(!regular.exec(document.getElementById(idName).value)){
				alert("ข้อมูลในช่อง " + errmsg + "มีรูปแบบข้อมูลผิดพลาด ต้องเป็นตัวเลขเท่านั้น");
				document.getElementById(idName).focus();
				return false;
			}else	
				basiccheck++;
		}
		
	}
	//alert(idName+" "+basiccheck +" "+ basicnum);
	if(basiccheck == basicnum){
		if(dupVal[0]==1){
			createRQ();
			//alert(n);
			page = "checkdup.php?tb="+dupVal[1]+"&key="+idName+"&cuase=" + document.getElementById(idName).value;
			xmlHttp.open("get", page, true);
			xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=tis-620'");
			xmlHttp.onreadystatechange = function (){
				if(xmlHttp.readyState == 4){
					if(xmlHttp.status == 200){
						var ans = xmlHttp.responseText;
						if(ans.indexOf("1")>=0){
							alert(errmsg+" "+document.getElementById(idName).value+" ซ้ำ");
							document.getElementById(idName).focus();
							return false;
						}
					}else{					
						alert("error " + xmlHttp.statusText);
					}
				}
			};
			xmlHttp.send(null);
		}
		if(realVal[0]==1){
			createRQ();
			//alert(n);
			page = "checkdup.php?tb="+realVal[1]+"&key="+idName+"&cuase=" + document.getElementById(idName).value;
			xmlHttp.open("get", page, true);
			xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=tis-620'");
			xmlHttp.onreadystatechange = function (){
				if(xmlHttp.readyState == 4){
					if(xmlHttp.status == 200){
						var ans = xmlHttp.responseText;
						if(ans.indexOf("0")>=0){
							alert(errmsg+" "+document.getElementById(idName).value+" ไม่มีอยู่จริง");
							document.getElementById(idName).focus();
							return false;
						}
					}else{					
						alert("error " + xmlHttp.statusText);
					}
				}
			};
			xmlHttp.send(null);
		}
	}
	return true;

}