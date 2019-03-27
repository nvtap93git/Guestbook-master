<?php
$host="localhost";
$username="root";
$password="123456";
$db_name="guestbook";



$conn = new PDO("mysql:host=$host;dbname=guestbook", $username, $password, array(PDO::ATTR_PERSISTENT => true));
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



