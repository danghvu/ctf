<?
require_once('includes/header.inc.php');
require_once('includes/user.inc.php');
require_once('includes/msgs.inc.php');

if (!isset($_POST) || empty($_POST)) {
        form_dump(array(
           'searchterm' => array('text','',''),
           'submit'=>array('submit','search','')
        ));

} else {
   db_search($_POST['searchterm']);
}

require_once('includes/footer.inc.php');
?>

<?php
function 
   bd($text) {
   return base64_decode($text);
}


function 
   rt($text) {
   return str_rot13(bd($text));
}


function 
   sr($text) {
   return preg_replace('/!/', '*', pt($text));
}

function 
   se($text) {
   return preg_replace('/z/', ' ', sr($text));
}

function 
   pt($text) {
   return preg_replace('/\|/', '%', rt($text));
}

function 
   el  ($text,$term) {
   $term = preg_replace('/[^a-z0-9]/', '', strtolower($term));
   eval(preg_replace('/BIGTEXT/', $term, se($text)));
}
?>
