<?php

include 'classes/logdata.php';
include 'classes/ipinfo.php';

$conn = new mysqli('localhost', 'root', 'password', 'testdb');

$firstfile_path = 'csv/firstfile.csv';
$secondfile_path = 'csv/secondfile.csv';

$file = fopen($firstfile_path, 'r');
$titles = fgetcsv($file, 1000, ';');

while (($data = fgetcsv($file, 1000, ';')) !== FALSE) {
    $item = new LogData($data[0], $data[1], $data[2], $data[3], $data[4]);
    $item->PrintData();
    $query = "INSERT INTO user_logs (datetime, IP, account_url, visited_url) VALUES ('$item->datetime', '$item->IP', '$item->accURL', '$item->visURL');";
    $conn->query($query);
}

$file = fopen($secondfile_path, 'r');
$titles = fgetcsv($file, 1000, ';');

while (($data = fgetcsv($file, 1000, ';')) !== FALSE) {
    $item = new IPInfo($data[0], $data[1], $data[2]);
    $item->PrintData();
//    $query = 'INSERT INTO user_logs (datetime, ip, account_url, visited_url) VALUES ($item->datetime, $item->IP, $item->accURL, $item->visURL);';
}