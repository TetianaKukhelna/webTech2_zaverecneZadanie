<?php

use App\Controller\PersonController;
include '../app/vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $db = new PersonController();
    $api = $db ->getApi($_POST['api']);
    $name = $_POST['name'];
    $command = $_POST['command'];

    if ($api == null || empty($api) || !isset($api)) {
        echo json_encode(['apiDB'=>$api,'apiServer'=>$_POST['api'],'status'=>"FAILED",'name'=>$name,'result'=>"UNAUTHORIZED ACCESS \nRegister to get API KEY"]);
        return;
    }

    $output = "";
    exec('octave-cli --eval '.'"pkg load control;'.$_POST['command'].'"' , $output);
    $output = implode("\n",$output);

    if($output ==""){
        $status = "FAILED";
        $errorLog = "INVALID COMMAND or ';' AT THE END OF THE LINE: ".$_POST['command'];
    }
    else {
        $status = "SUCCESS";
        $errorLog = "NONE";
    }

    $logId = $db->insertSimulation($_POST['name'], $_POST['command'], "FAILED", $errorLog);
    $file = fopen("log.csv", 'w');
    $array = $db->getSimulation($logId);
    $array = array_unique($array);
    fputcsv($file, array_keys($array), ';');
    fputcsv($file, $array, ';');

    echo json_encode(['apiDB'=>$api,'apiServer'=>$_POST['api'],'status'=>$status,'name'=>$name,'result'=>$output]);
}


