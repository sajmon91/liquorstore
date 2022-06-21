<?php 


// DB params
if($_SERVER['SERVER_NAME'] == "localhost")
{
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'liquorstore');
}else{
    define('DB_HOST', 'sql11.freemysqlhosting.net');
    define('DB_USER', 'sql11501168');
    define('DB_PASS', 'CAT6Dr8t8N');
    define('DB_NAME', 'sql11501168');
}



 ?>