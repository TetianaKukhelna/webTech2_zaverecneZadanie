<?php

namespace App\Controller;

use App\Helper\Database;
use App\Model\Person;
use PDO;

class PersonController
{

    private PDO $conn;

    public function __construct()
    {
        $this->conn = (new Database())->getConnection();
    }

    public function getApi($api)
    {
        $stmt = $this->conn->prepare("SELECT api_key FROM user WHERE api_key = :api");
        $stmt->bindParam(":api", $api);
        $stmt->execute();
        $api = $stmt->fetch();
        return $api;
    }

    public function getSimulation($id)
    {
        $stmt = $this->conn->prepare("SELECT id, username, created_at, command, status, error_log FROM logs WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $log = $stmt->fetch();
        return $log;
    }

    public function insertSimulation($username, $command, $status, $error_log): int
    {
        $stmt = $this->conn->prepare("INSERT INTO logs (username, command, status, error_log) values (:username, :command, :status, :error_log)");
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":command", $command);
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":error_log", $error_log);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }
}
