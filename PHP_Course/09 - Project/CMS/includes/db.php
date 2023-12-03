<?php
ob_start();
session_start();

const DB_HOST = "localhost";
const DB_USER = "root";
const DB_PASSWORD = "";
const DB_NAME = "cms";

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$query = "SET NAMES utf8";
mysqli_query($connection, $query);

if (!$connection) {
    echo "We are not connected";
}
