<?php 
function findOrCreateWord($word) {
    $stmt = $conn->prepare("SELECT id FROM slova WHERE nazov=:nazov");
    $stmt->bindParam(":nazov", $array[2]);
    $stmt->execute();
    $result = $stmt->fetch();

    if($result == false){
        $stmt1 = $conn->prepare("INSERT INTO slova (nazov) VALUES (:nazov)");
        $stmt1->bindParam(":nazov", $array[2]);
        $stmt1->execute();
        $new_slova = true;
        $stmt2 = $conn->prepare("SELECT id FROM slova WHERE nazov=:nazov");
        $stmt2->bindParam(":nazov", $array[2]);
        $stmt2->execute();
        $result = $stmt2->fetch();
    }

    return $result;
} 

function findById($slovo_id) {
    $stmt = $conn->prepare("SELECT id FROM slova WHERE nazov=:nazov");
    $stmt->bindParam(":nazov", $array[2]);
    $stmt->execute();
    $result = $stmt->fetch();

    if($result == false){
        $stmt1 = $conn->prepare("INSERT INTO slova (nazov) VALUES (:nazov)");
        $stmt1->bindParam(":nazov", $array[2]);
        $stmt1->execute();
        $new_slova = true;
        $stmt2 = $conn->prepare("SELECT id FROM slova WHERE nazov=:nazov");
        $stmt2->bindParam(":nazov", $array[2]);
        $stmt2->execute();
        $result = $stmt2->fetch();
    }

    return $result;
} 