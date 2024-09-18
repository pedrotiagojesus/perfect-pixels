<?php

class Config
{
    private static $instance = null;
    private $config = [];

    private function __construct()
    {
        $this->config = require 'config_data.php';
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Config();
        }
        return self::$instance;
    }

    public function get($key)
    {
        return isset($this->config[$key]) ? $this->config[$key] : null;
    }
}
