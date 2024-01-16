<?php


class Manage
{
    private $config;

    public function __construct($configFilePath)
    {

        $this->config = parse_ini_file($configFilePath, true);

        if ($this->config === false) {
            throw new Exception("Niste uspijeli ucitati Manage file $configFilePath");
        }
    }

    public function get($section, $key)
    {
        if (isset($this->config[$section][$key])) {
            return $this->config[$section][$key];
        } else {
            throw new Exception(" '$key' konfiguracijski kljuc nije naden u sekciji  '$section'");
        }
    }
}


?>
