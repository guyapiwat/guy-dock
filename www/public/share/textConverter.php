<?php

function UtfToTis($text)
{
    return iconv( 'UTF-8','TIS-620',$text);
}


function TisToUtf($text)
{
    return iconv( 'TIS-620','UTF-8',$text);
}

?>