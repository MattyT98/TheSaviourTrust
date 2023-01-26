<?php
    //$Path = "http://localhost/test/CarEvents/";
    $Path ="";

    switch($_SERVER['SERVER_NAME']){
        case '192.168.0.137' : //development view from other device
            $Path ="http://192.168.0.137/test/TheSaviourTrust";
          break;
        case 'localhost': //development
            $Path ="http://localhost/test/TheSaviourTrust";
          break;
        case 'https://www.TheSaviourTrust.com': //production
            $Path = "https://www.TheSaviourTrust.com/";
          break;
      }
?>
