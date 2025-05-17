<?php
   
   define("HOST", "localhost");
   define("DBNAME", "mconsultancy");
   define("USER", "root");
   define("PASS", "");
   
   try {
    $pdo = new PDO("mysql:host=" .HOST. ";dbname=" .DBNAME, USER, PASS,  [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
   } catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
   }

