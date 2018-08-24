<script type="text/javascript">

function popUp(path,title) {
    var popwin;
    if (title!="view") {
        leftval=(screen.width)?(screen.width-400)/2:100;
        topval=(screen.height)?(screen.height-500)/2:100;
        popwin=window.open(path, title, "width=400,height=500,top=" + topval + ",left=" + leftval + ",toolbar=0,scrollbars=1,directories=no,location=0,statusbar=0,menubar=0,resizable=0");
    } else {
        leftval=(screen.width)?(screen.width-750)/2:100;
        topval=(screen.height)?(screen.height-750)/2:100;
        popwin=window.open(path, title, "width=750,height=750,top=" + topval + ",left=" + leftval + ",toolbar=0,scrollbars=1,directories=no,location=0,statusbar=0,menubar=0,resizable=1");
    }
    popwin.focus();
}

function setSelect(form_name, select_name) {
    var select_field=document.forms[form_name].elements[select_name];
    for (var i = 0; i < select_field.length; i++) select_field.options[i].selected = true;
    return true;
}

function confirmClick(title,path) {
    var input=confirm(title);
    if (input) window.location.href=path;
}
</script>
