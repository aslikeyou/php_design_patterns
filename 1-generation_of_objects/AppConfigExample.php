<?php

class Settings {
    static $COMMSTYPE = 'Bloggs';
}

class AppConfig {
    private static $instance;
    private $commsManager;

    private function __construct()
    {
        $this->init();
    }

    private function init() {
        switch (Settings::$COMMSTYPE) {
            case 'Mega':
                $this->commsManager = new MegaCommsManager();
                break;
            default:
                $this->commsManager = new BloggsCommsManager();
        }
    }

    public static function getInstance() {
        if(empty(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getCommsManager() {
        return $this->commsManager;
    }
}

$commsManager = AppConfig::getInstance()->getCommsManager();
print $commsManager->getApptEncoder()->encode();