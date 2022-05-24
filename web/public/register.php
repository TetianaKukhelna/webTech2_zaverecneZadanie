<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['nameR'])) {
        $conn = null;
        try {
            $conn = new PDO("mysql:host=mysql;dbname=final_zadanie", "dev", "dev");
            $conn->exec("set names utf8");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Database could not be connected: " . $exception->getMessage();
        }
        $name = $_POST['nameR'];
        $apiKey = password_hash($name, PASSWORD_DEFAULT);
        $result = $conn->query("insert into user (name,api_key) values ('$name', '$apiKey');");
        if ($result) {
            echo json_encode(['status' => 'success', 'apiKey' => $apiKey]);
        } else {
            echo json_encode(['status' => 'FAILED']);
        }

        exit();
    }
}