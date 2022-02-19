<?php

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'customers';

$dbc = mysqli_connect($host, $username, $password, $dbname);


$sql = 'SELECT * FROM tbl_cust;';

$res = $dbc->query($sql);



$staff = mysqli_fetch_all($res);
