<?php

class IPInfo {
    public $IP;
    public $Browser;
    public $OS;

    public function __construct($IP, $Browser, $OS)
    {
        $this->IP = $IP;
        $this->Browser = $Browser;
        $this->OS = $OS;
    }

    public function PrintData()
    {
        echo 'IP: ' . $this->IP . '<br>';
        echo 'Browser: ' . $this->Browser . '<br>';
        echo 'OS: ' . $this->OS . '<br>';
        echo '<hr>';
    }
}