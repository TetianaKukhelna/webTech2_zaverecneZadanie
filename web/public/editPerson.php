<?php

use App\Controller\PersonController;
use App\Model\Person;

include '../app/vendor/autoload.php';

$personController = new PersonController();

    if(isset($_POST['name'])){

        if(isset($_POST['id']) && $_POST['id']){
            $person = $personController->getPerson($_POST['id']);
            $person->setName($_POST['name']);
            $person->setSurname($_POST['surname']);
            $personController->updatePerson($person);
        }else{

            $person = new Person();
            $person->setName($_POST['name']);
            $person->setSurname($_POST['surname']);

            $id = $personController->insertPerson($person);
            $person = $personController->getPerson($id);
        }

    }else if(isset($_GET['id'])) {
        $person = $personController->getPerson($_GET['id']);
    }
?>
<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Olympic Winners</title>

</head>

<body>

<h1>Edit Person</h1>

<?php
include "partials/personForm.php";
?>

</body>
</html>
