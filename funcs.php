<?php

function cleanpost($a) {
    if (is_array($_POST[$a])) {
	$r=array();
	foreach ($_POST[$a] as &$b){
	    $r[] = htmlspecialchars($b);
	}
    } elseif (!is_array($_POST[$a])) {
	$r = isset($_POST[$a]) ? htmlspecialchars($_POST[$a]) : false;
    } else {
	$r = false;
    }    
    return $r;
}

function cleanget($a){    
    $r = isset($_GET[$a]) ? htmlspecialchars($_GET[$a]) : false;
    return $r;
}

function imgredirect($src,$loc,$txt,$alert=FALSE){
    $alert = $alert ? 'alert(\''.$txt.'\');' : false;
    return '<img src="'.$src.'" onload="'.$alert.'window.location.replace(\''.$loc.'\');"><p>'.$txt.'</p>';
}

?>
