<?php

include 'classes/logdata.php';
include 'classes/ipinfo.php';

function CollectFirstCSVData($conn, $path)
{
    $file = fopen($path, 'r');
    $titles = fgetcsv($file, 1000, ';');

    while (($data = fgetcsv($file, 1000, ';')) !== FALSE) {
        $item = new LogData($data[0], $data[1], $data[2], $data[3], $data[4]);
        $item->PrintData();
        $query = "INSERT INTO user_logs (datetime, IP, account_url, visited_url) VALUES ('$item->Datetime', '$item->IP', '$item->AccURL', '$item->VisURL');";
        $conn->query($query);
    }
}

function CollectSecondCSVData($conn, $path)
{
    $file = fopen($path, 'r');
    $titles = fgetcsv($file, 1000, ';');

    while (($data = fgetcsv($file, 1000, ';')) !== FALSE) {
        $item = new IPInfo($data[0], $data[1], $data[2]);
        $item->PrintData();
        $query = "INSERT INTO ip_info (ip, browser, os) VALUES ('$item->IP', '$item->Browser', '$item->OS');";
        $conn->query($query);
    }
}

function PrintDataFromSQL($conn) {

    // Не знаю, как лучше записать столь длинный SQL-запрос.
    // Думал о том, чтобы записать в отдельный .sql файл и выполнять запрос с файла, но это решение показалась мне еще более странным.
    $query = 'SELECT 
       user_logs.ip as usr_IP,
       ip_info.browser,
       (SELECT account_url FROM user_logs WHERE datetime = (SELECT MIN(datetime) FROM user_logs WHERE ip = usr_ip) AND ip = usr_ip) AS first_acc_url,
	   (SELECT visited_url FROM user_logs WHERE datetime = (SELECT MAX(datetime) FROM user_logs WHERE ip = usr_ip) AND ip = usr_ip) AS last_visited_url,
       COUNT(DISTINCT visited_url) AS visited_count
    FROM user_logs JOIN ip_info ON user_logs.ip = ip_info.ip
    GROUP BY user_logs.ip;';

    $result = $conn->query($query);
    echo '<table align="center" cellspacing="2" border="1" cellpadding="5" width="80%">';
    echo '<tr><td>IP</td><td>Browser</td><td>First logined user</td><td>Last visited page</td><td>Count of visited unique pages</td></tr>';
    while ($row = mysqli_fetch_row($result)) {
        echo '<tr>';
        foreach ($row as $item) {
            echo '<td>' . $item . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';


}
