<?php 
$HOST = "localhost";
$USER = "u20295";
$PASS = "7045626";
$DB = "u20295";
$PREFIX = "";


    if(!mysql_connect("$HOST", "$USER", "$PASS")) exit(mysql_error());
    else {echo "";}
    
    if (!mysql_select_db($DB)) exit(mysql_error());
    else{echo "";}
    
    mysql_query('SET NAMES cp1251;');

?>