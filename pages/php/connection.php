<?php
    global $pdo;
    
    // $dsn = "mysql:host=sql12.freemysqlhosting.net;dbname=sql12706538";
    // $dbusername = "sql12706538";
    // $dbpassword = "VMxQJXE4eb";
    $dsn = "mysql:host=accc-beirut-port-project-chrisbadran01-59f0.i.aivencloud.com;port=23242;dbname=accc beirut port project";
    $dbusername = "avnadmin";
    $dbpassword = "AVNS_1qx0a8w6NK94k2i_mts";

    try {
        $pdo = new PDO($dsn, $dbusername, $dbpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        echo "Connection failed: " .$e->getMessage();
    }
?>