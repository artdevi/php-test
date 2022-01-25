<?php

class LogData {
    public $datetime;
    public $IP;
    public $accURL;
    public $visURL;

    public function __construct($date, $time, $ip, $accURL, $visURL)
    {
        $this->datetime = $date . ' ' . $time;
        $this->ip = $ip;
        $this->accURL = $accURL;
        $this->visURL = $visURL;
    }

    public function PrintData()
    {
        echo 'Datetime: ' . $this->datetime . '<br>';
        echo 'IP: ' . $this->ip . '<br>';
        echo 'Account URL: ' . $this->accURL . '<br>';
        echo 'Visited URL: ' . $this->visURL . '<br>';
        echo '<hr>';
    }
}