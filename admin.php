<!doctype html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page</title>
</head>
<body>
<a href="index_page.php">Naspat</a>
<style>
    body{
        background: rgb(206,240,255);
        background: linear-gradient(90deg, rgb(255, 207, 168) 1%, rgb(222, 193, 153) 49%, rgb(255, 253, 207) 99%);;
        background-size: cover;
        text-align: -webkit-center;
    }
    form{
        width: 50% !important;
    }
</style>
</body>
</html>
<?php

require_once "_db.php";
require_once "Inventor.php";
require_once "Invention.php";
require_once "templates/_base.php";

$file = fopen("vynalezy.csv","r");

while (($pole = fgetcsv($file)) !== FALSE) {

    $inventor = Inventor::searchByDescription($pole[7]);
    print_r($inventor);

    if(!$inventor)
    {
        $inventor = new Inventor();
        $inventor->setName($pole[0]);
        $inventor->setSurname($pole[1]);
        $inventor->setBirthDate($pole[3]);
        $inventor->setBirthPlace($pole[4]);
        $inventor->setDescription($pole[7]);
        $inventor->save();
        $inventor_id = $inventor->getId();
    }

    $invention = new Invention();
    $invention->setInventorId($inventor->getId());
    $invention->setInventionDate($pole[8]);
    $invention->setDescription($pole[9]);
    $invention->save();

}

fclose($file);
//$redirectUrl = baseUrl('/index_page.php');
//header("Location: {$redirectUrl}");
exit;
?>
