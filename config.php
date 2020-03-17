<?php 
$HOST = "localhost";
$USER = "u17494";
$PASS = "2172210";
$DB = "u17494";
$PREFIX = "";


    if(!mysql_connect("$HOST", "$USER", "$PASS")) exit(mysql_error());
    else {echo "";}
    
    if (!mysql_select_db($DB)) exit(mysql_error());
    else{echo "";}
    
    mysql_query('SET NAMES cp1251;');

?>