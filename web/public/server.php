<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $command = $_POST['command'];
    $output = "";
    exec('octave-cli --eval '.'"pkg load control;'.$_POST['command'].'"' , $output);
    $output = implode("\n",$output);

    echo json_encode(['status'=>'success','name'=>$name,'result'=>$output]);
}


//header("location:index.php");