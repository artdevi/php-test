<?php

include 'functions.php';

$conn = new mysqli('localhost', 'root', 'password', 'testdb');

//CollectFirstCSVData($conn, 'csv/firstfile.csv');
//CollectSecondCSVData($conn, 'csv/secondfile.csv');
PrintDataFromSQL($conn);