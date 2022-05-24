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

//    public function getAllPeople()
//    {
//        $stmt = $this->conn->prepare("select osoby.*, count(p.placing) as gold_count from osoby left outer join (select * from umiestnenia where placing=1) p on p.person_id = osoby.id group by osoby.id;");
//	$stmt->execute();
//
//	$people = $stmt->fetchAll(PDO::FETCH_CLASS, "App\Model\Person");
//
//        foreach ($people as $person) {
//            $stmt = $this->conn->prepare("select umiestnenia.*, city from umiestnenia join oh on umiestnenia.oh_id = oh.id where person_id = :personId;");
//            $stmt->bindParam(":personId", $person->getId(), PDO::PARAM_INT);
//            $stmt->execute();
//            $placements = $stmt->fetchAll(PDO::FETCH_CLASS, "App\Model\Placement");
//            $person->setPlacements($placements);
//        }
//
//        return $people;
//    }

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

//    public function updatePerson(Person $person){
//        $stmt = $this->conn->prepare("update osoby set name=:name, surname=:surname where id=:personId");
//        $name = $person->getName();
//        $id = $person->getId();
//        $surname = $person->getSurname();
//        $stmt->bindParam(":personId", $id, PDO::PARAM_INT);
//        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
//        $stmt->bindParam(":surname", $surname, PDO::PARAM_STR);
//        $stmt->execute();
//    }

}
