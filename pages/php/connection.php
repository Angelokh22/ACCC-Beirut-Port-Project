<?php
    global $pdo;
    
    $dsn = "mysql:host=sql12.freemysqlhosting.net;dbname=sql12706538";
    $dbusername = "sql12706538";
    $dbpassword = "VMxQJXE4eb";

    try {
        $pdo = new PDO($dsn, $dbusername, $dbpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        echo "Connection failed: " .$e->getMessage();
    }
?>