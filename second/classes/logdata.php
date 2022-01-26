<?php

class LogData {
    public $Datetime;
    public $IP;
    public $AccURL;
    public $VisURL;

    public function __construct($date, $time, $ip, $accURL, $visURL)
    {
        $this->Datetime = $date . ' ' . $time;
        $this->IP = $ip;
        $this->AccURL = $accURL;
        $this->VisURL = $visURL;
    }

    public function PrintData()
    {
        echo 'Datetime: ' . $this->Datetime . '<br>';
        echo 'IP: ' . $this->IP . '<br>';
        echo 'Account URL: ' . $this->AccURL . '<br>';
        echo 'Visited URL: ' . $this->VisURL . '<br>';
        echo '<hr>';
    }
}