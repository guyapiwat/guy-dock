<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/base/jquery-ui.css">
<script type='text/javascript'>//<![CDATA[ 
$(window).load(function(){
$("#tabs").tabs();
});//]]>  

</script>
 <style type='text/css'> 
    #tabs {width: 630px;    margin-left: 11px; border: 0;border-radius: 0;    }
    .tab-border {border: 1px solid #D3D3D3;margin-top: -2px;}
    .ui-widget-header {border: 0px solid #fff;background: none;color: #222222;font-weight: bold;}
    .ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active {
border: 1px solid #aaaaaa/*{borderColorActive}*/;
background: #009900/*{bgColorActive}*/ url(images/ui-bg_glass_65_ffffff_1x400.png)/*{bgImgUrlActive}*/ 50%/*{bgActiveXPos}*/ 50%/*{bgActiveYPos}*/ repeat-x/*{bgActiveRepeat}*/;
font-weight: normal/*{fwDefault}*/;
color: #212121/*{fcActive}*/;
}
.ui-state-active a {color:#fff !important;}

  </style>
  <div id="tabs">
    <ul>
        <li><a href="#tabs-1">สินค้า</a></li>
        
        <li><a href="#tabs-2">สินค้า Package</a></li>
      <!-- <li><a href="#tabs-3">สินค้าของแถม</a></li>
      <li><a href="#tabs-4">สินค้าพนักงาน</a></li>
   --></ul>
    <div class="tab-border">
    <div id="tabs-1">
        <iframe width="580" height="605" frameborder="0" src="./product_show.php" ></iframe>
    </div>
   <div id="tabs-2">
       <iframe width="580" height="605" frameborder="0" src="./package_show3.php" ></iframe>
    </div>
	 <!--
    <div id="tabs-3">
       <iframe width="580" height="605" frameborder="0" id='FrameID2'  src="./product_show_free.php" ></iframe>
    </div-->
    <!--<div id="tabs-4">
       <iframe width="580" height="605" frameborder="0" id='FrameID2'  src="./product_show_cs.php" ></iframe>
    </div>-->
    </div>
 
</div>