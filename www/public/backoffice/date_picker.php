<?php  
$jquery_ui_v="1.8.5";  
$theme=array(  
    "0"=>"base",  
    "1"=>"black-tie",  
    "2"=>"blitzer",  
    "3"=>"cupertino",  
    "4"=>"dark-hive",  
    "5"=>"dot-luv",  
    "6"=>"eggplant",  
    "7"=>"excite-bike",  
    "8"=>"flick",  
    "9"=>"hot-sneaks",  
    "10"=>"humanity",  
    "11"=>"le-frog",  
    "12"=>"mint-choc",  
    "13"=>"overcast",  
    "14"=>"pepper-grinder",  
    "15"=>"redmond",  
    "16"=>"smoothness",  
    "17"=>"south-street",  
    "18"=>"start",  
    "19"=>"sunny",  
    "20"=>"swanky-purse",  
    "21"=>"trontastic",  
    "22"=>"ui-darkness",  
    "23"=>"ui-lightness",  
    "24"=>"vader"  
);  
$jquery_ui_theme=$theme[15];  
?>  
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/<?=$jquery_ui_v?>/themes/<?=$jquery_ui_theme?>/jquery-ui.css" />  
<style type="text/css">  
.ui-tabs{  
    font-family:tahoma;  
    font-size:11px;  
}  
</style>  
<style type="text/css">
.ui-datepicker-trigger {
width: 23px;
vertical-align: bottom;
height: 24px;
margin-left: 5px;
cursor: pointer;
}
.ui-datepicker{
	width:220px;
	font-family:tahoma;
	font-size:11px;
	text-align:center;
}
#dateInput1 {width:100px;}
#dateInput2 {width:100px;}
#dateInput3 {width:100px;} 
#dateInput4 {width:100px;}
#dateInput5 {width:100px;}
#dateInput6 {width:100px;} 
</style>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js"></script>
<script type="text/javascript">
	var wording = "<?=$_SESSION['wording'];?>";
	if(wording == "EN"){
		var date_1 = ['Sun.', 'Mon.', 'Tue.', 'Wed.', 'Thu.', 'Fri.', 'Sat.'];
		var month_1 = ['January','February','March','April','May','June','July','August','September','October','November','December'];
	}
	else{
		var date_1 = ["อาทิต","จันท","อังคาร","พุธ","พฤ","ศุก","เสา"];
		var month_1 = ["มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"];
	}


$(function(){
	var dateBefore=null;
	$("#dateInput1").datepicker({
		dateFormat: 'dd-mm-yy',
		showOn: 'button',
buttonImage: 'datetimepick/images/cal.gif',
		buttonImageOnly: true,
		dayNamesMin: date_1, 
		monthNamesShort: month_1,
		changeMonth: true,
		changeYear: true,
		beforeShow:function(){	
			if($(this).val()!=""){
				var arrayDate=$(this).val().split("-");		
				arrayDate[2]=parseInt(arrayDate[2]);
				$(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);
			}
			setTimeout(function(){
				$.each($(".ui-datepicker-year option"),function(j,k){
					var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;
					$(".ui-datepicker-year option").eq(j).text(textYear);
				});				
			},50);
		},
		onChangeMonthYear: function(){
			setTimeout(function(){
				$.each($(".ui-datepicker-year option"),function(j,k){
					var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;
					$(".ui-datepicker-year option").eq(j).text(textYear);
				});				
			},50);		
		},
		onClose:function(){
			if($(this).val()!="" && $(this).val()==dateBefore){			
				var arrayDate=dateBefore.split("-");
				arrayDate[2]=parseInt(arrayDate[2]);
				$(this).val(arrayDate[2]+"-"+arrayDate[1]+"-"+arrayDate[0]);	
			}		
		},
		onSelect: function(dateText, inst){ 
			dateBefore=$(this).val();
			var arrayDate=dateText.split("-");
			arrayDate[2]=parseInt(arrayDate[2]);
			$(this).val(arrayDate[2]+"-"+arrayDate[1]+"-"+arrayDate[0]);
		}	

	});

	// Date Input 2 /////////////////////

	$("#dateInput2").datepicker({
		dateFormat: 'dd-mm-yy',
		showOn: 'button',
		buttonImage: 'datetimepick/images/cal.gif',
		buttonImageOnly: true,
		dayNamesMin: date_1, 
		monthNamesShort: month_1,
		changeMonth: true,
		changeYear: true,
		beforeShow:function(){	
			if($(this).val()!=""){
				var arrayDate=$(this).val().split("-");		
				arrayDate[2]=parseInt(arrayDate[2]);
				$(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);
			}
			setTimeout(function(){
				$.each($(".ui-datepicker-year option"),function(j,k){
					var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;
					$(".ui-datepicker-year option").eq(j).text(textYear);
				});				
			},50);
		},
		onChangeMonthYear: function(){
			setTimeout(function(){
				$.each($(".ui-datepicker-year option"),function(j,k){
					var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;
					$(".ui-datepicker-year option").eq(j).text(textYear);
				});				
			},50);		
		},
		onClose:function(){
			if($(this).val()!="" && $(this).val()==dateBefore){			
				var arrayDate=dateBefore.split("-");
				arrayDate[2]=parseInt(arrayDate[2]);
				$(this).val(arrayDate[2]+"-"+arrayDate[1]+"-"+arrayDate[0]);	
			}		
		},
		onSelect: function(dateText, inst){ 
			dateBefore=$(this).val();
			var arrayDate=dateText.split("-");
			arrayDate[2]=parseInt(arrayDate[2]);
			$(this).val(arrayDate[2]+"-"+arrayDate[1]+"-"+arrayDate[0]);
		}	

	});
	$("#dateInput3").datepicker({
		dateFormat: 'dd-mm-yy',
		showOn: 'button',
buttonImage: 'datetimepick/images/cal.gif',
		buttonImageOnly: true,
		dayNamesMin: date_1, 
		monthNamesShort: month_1,
		changeMonth: true,
		changeYear: true,
		beforeShow:function(){	
			if($(this).val()!=""){
				var arrayDate=$(this).val().split("-");		
				arrayDate[2]=parseInt(arrayDate[2]);
				$(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);
			}
			setTimeout(function(){
				$.each($(".ui-datepicker-year option"),function(j,k){
					var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;
					$(".ui-datepicker-year option").eq(j).text(textYear);
				});				
			},50);
		},
		onChangeMonthYear: function(){
			setTimeout(function(){
				$.each($(".ui-datepicker-year option"),function(j,k){
					var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;
					$(".ui-datepicker-year option").eq(j).text(textYear);
				});				
			},50);		
		},
		onClose:function(){
			if($(this).val()!="" && $(this).val()==dateBefore){			
				var arrayDate=dateBefore.split("-");
				arrayDate[2]=parseInt(arrayDate[2]);
				$(this).val(arrayDate[2]+"-"+arrayDate[1]+"-"+arrayDate[0]);	
			}		
		},
		onSelect: function(dateText, inst){ 
			dateBefore=$(this).val();
			var arrayDate=dateText.split("-");
			arrayDate[2]=parseInt(arrayDate[2]);
			$(this).val(arrayDate[2]+"-"+arrayDate[1]+"-"+arrayDate[0]);
		}	

	});

	// rdate //////

	$("#dateInput3").datepicker({
		dateFormat: 'dd-mm-yy',
		showOn: 'button',
buttonImage: 'datetimepick/images/cal.gif',
		buttonImageOnly: true,
		dayNamesMin: date_1, 
		monthNamesShort: month_1,
		changeMonth: true,
		changeYear: true,
		beforeShow:function(){	
			if($(this).val()!=""){
				var arrayDate=$(this).val().split("-");		
				arrayDate[2]=parseInt(arrayDate[2]);
				$(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);
			}
			setTimeout(function(){
				$.each($(".ui-datepicker-year option"),function(j,k){
					var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;
					$(".ui-datepicker-year option").eq(j).text(textYear);
				});				
			},50);
		},
		onChangeMonthYear: function(){
			setTimeout(function(){
				$.each($(".ui-datepicker-year option"),function(j,k){
					var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;
					$(".ui-datepicker-year option").eq(j).text(textYear);
				});				
			},50);		
		},
		onClose:function(){
			if($(this).val()!="" && $(this).val()==dateBefore){			
				var arrayDate=dateBefore.split("-");
				arrayDate[2]=parseInt(arrayDate[2]);
				$(this).val(arrayDate[2]+"-"+arrayDate[1]+"-"+arrayDate[0]);	
			}		
		},
		onSelect: function(dateText, inst){ 
			dateBefore=$(this).val();
			var arrayDate=dateText.split("-");
			arrayDate[2]=parseInt(arrayDate[2]);
			$(this).val(arrayDate[2]+"-"+arrayDate[1]+"-"+arrayDate[0]);
		}	

	});

	$("#dateInput4").datepicker({
		dateFormat: 'dd-mm-yy',
		showOn: 'button',
buttonImage: 'datetimepick/images/cal.gif',
		buttonImageOnly: true,
		dayNamesMin: date_1, 
		monthNamesShort: month_1,
		changeMonth: true,
		changeYear: true,
		beforeShow:function(){	
			if($(this).val()!=""){
				var arrayDate=$(this).val().split("-");		
				arrayDate[2]=parseInt(arrayDate[2]);
				$(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);
			}
			setTimeout(function(){
				$.each($(".ui-datepicker-year option"),function(j,k){
					var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;
					$(".ui-datepicker-year option").eq(j).text(textYear);
				});				
			},50);
		},
		onChangeMonthYear: function(){
			setTimeout(function(){
				$.each($(".ui-datepicker-year option"),function(j,k){
					var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;
					$(".ui-datepicker-year option").eq(j).text(textYear);
				});				
			},50);		
		},
		onClose:function(){
			if($(this).val()!="" && $(this).val()==dateBefore){			
				var arrayDate=dateBefore.split("-");
				arrayDate[2]=parseInt(arrayDate[2]);
				$(this).val(arrayDate[2]+"-"+arrayDate[1]+"-"+arrayDate[0]);	
			}		
		},
		onSelect: function(dateText, inst){ 
			dateBefore=$(this).val();
			var arrayDate=dateText.split("-");
			arrayDate[2]=parseInt(arrayDate[2]);
			$(this).val(arrayDate[2]+"-"+arrayDate[1]+"-"+arrayDate[0]);
		}	

	});

	$("#dateInput5").datepicker({
		dateFormat: 'dd-mm-yy',
		showOn: 'button',
buttonImage: 'datetimepick/images/cal.gif',
		buttonImageOnly: true,
		dayNamesMin: date_1, 
		monthNamesShort: month_1,
		changeMonth: true,
		changeYear: true,
		beforeShow:function(){	
			if($(this).val()!=""){
				var arrayDate=$(this).val().split("-");		
				arrayDate[2]=parseInt(arrayDate[2]);
				$(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);
			}
			setTimeout(function(){
				$.each($(".ui-datepicker-year option"),function(j,k){
					var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;
					$(".ui-datepicker-year option").eq(j).text(textYear);
				});				
			},50);
		},
		onChangeMonthYear: function(){
			setTimeout(function(){
				$.each($(".ui-datepicker-year option"),function(j,k){
					var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;
					$(".ui-datepicker-year option").eq(j).text(textYear);
				});				
			},50);		
		},
		onClose:function(){
			if($(this).val()!="" && $(this).val()==dateBefore){			
				var arrayDate=dateBefore.split("-");
				arrayDate[2]=parseInt(arrayDate[2]);
				$(this).val(arrayDate[2]+"-"+arrayDate[1]+"-"+arrayDate[0]);	
			}		
		},
		onSelect: function(dateText, inst){ 
			dateBefore=$(this).val();
			var arrayDate=dateText.split("-");
			arrayDate[2]=parseInt(arrayDate[2]);
			$(this).val(arrayDate[2]+"-"+arrayDate[1]+"-"+arrayDate[0]);
		}	

	});

	$("#dateInput6").datepicker({
		dateFormat: 'dd-mm-yy',
		showOn: 'button',
buttonImage: 'datetimepick/images/cal.gif',
		buttonImageOnly: true,
		dayNamesMin: date_1, 
		monthNamesShort: month_1,
		changeMonth: true,
		changeYear: true,
		beforeShow:function(){	
			if($(this).val()!=""){
				var arrayDate=$(this).val().split("-");		
				arrayDate[2]=parseInt(arrayDate[2]);
				$(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);
			}
			setTimeout(function(){
				$.each($(".ui-datepicker-year option"),function(j,k){
					var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;
					$(".ui-datepicker-year option").eq(j).text(textYear);
				});				
			},50);
		},
		onChangeMonthYear: function(){
			setTimeout(function(){
				$.each($(".ui-datepicker-year option"),function(j,k){
					var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;
					$(".ui-datepicker-year option").eq(j).text(textYear);
				});				
			},50);		
		},
		onClose:function(){
			if($(this).val()!="" && $(this).val()==dateBefore){			
				var arrayDate=dateBefore.split("-");
				arrayDate[2]=parseInt(arrayDate[2]);
				$(this).val(arrayDate[2]+"-"+arrayDate[1]+"-"+arrayDate[0]);	
			}		
		},
		onSelect: function(dateText, inst){ 
			dateBefore=$(this).val();
			var arrayDate=dateText.split("-");
			arrayDate[2]=parseInt(arrayDate[2]);
			$(this).val(arrayDate[2]+"-"+arrayDate[1]+"-"+arrayDate[0]);
		}	

	});
	

	
	
	
});
</script>

