<?php

use App\Controller\PersonController;
include '../app/vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $db = new PersonController();
    $api = $db ->getApi($_POST['api']);
    $name = $_POST['name'];
    $command = $_POST['command'];

    if ($api == null || empty($api) || !isset($api)) {
        echo json_encode(['status'=>"FAILED",'name'=>$name,'result'=>"UNAUTHORIZED ACCESS \nRegister to get API KEY"]);
        return;
    }

    if ($_POST['heightOrScript'] === 'height'){
        $output = "";
        exec('octave-cli --eval "pkg load control;m1 = 2500; m2 = 320;k1 = 80000; k2 = 500000;b1 = 350; b2 = 15020;A=[0 1 0 0;-(b1*b2)/(m1*m2) 0 ((b1/m1)*((b1/m1)+(b1/m2)+(b2/m2)))-(k1/m1) -(b1/m1);b2/m2 0 -((b1/m1)+(b1/m2)+(b2/m2)) 1;k2/m2 0 -((k1/m1)+(k1/m2)+(k2/m2)) 0];B=[0 0;1/m1 (b1*b2)/(m1*m2);0 -(b2/m2);(1/m1)+(1/m2) -(k2/m2)];C=[0 0 1 0]; D=[0 0];Aa = [[A,[0 0 0 0]\'];[C, 0]];Ba = [B;[0 0]];Ca = [C,0]; Da = D;K = [0 2.3e6 5e8 0 8e6];sys = ss(Aa-Ba(:,1)*K,Ba,Ca,Da);t = 0:0.01:5;r ='.$command.';initX1=0; initX1d=0;initX2=0; initX2d=0;[y,t,x]=lsim(sys*[0;1],r*ones(size(t)),t,[initX1;initX1d;initX2;initX2d;0])"' , $output);
        $output = implode("\n",$output);
    }else{
        $output = "";
        exec('octave-cli --eval '.'"pkg load control;'.$_POST['command'].'"' , $output);
        $output = implode("\n",$output);
    }


    if($output ==""){
        $status = "FAILED";
        $errorLog = "INVALID COMMAND or ';' AT THE END OF THE LINE: ".$_POST['command'];
    }
    else {
        $status = "SUCCESS";
        $errorLog = "NONE";
    }

    $logId = $db->insertSimulation($_POST['name'], $_POST['command'], $status, $errorLog);
    $file = fopen("log.csv", 'w');
    $array = $db->getSimulation($logId);
    $array = array_unique($array);
    fputcsv($file, array_keys($array), ';');
    fputcsv($file, $array, ';');

    echo json_encode(['status'=>$status,'name'=>$name,'result'=>$output]);
}


