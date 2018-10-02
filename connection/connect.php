<?php

$server	    = 'db4free.net:3306';
$username	= 'sirsuccess';
$password	= 'blessing';
$database	= 'weekten';

$con = new mysqli($localhost, $username, $password, $dbname);

if($con->connect_error) {
    die("connection failed : " . $con->connect_error);
}

/* end of file */
