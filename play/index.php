<?php

include "../domain/Play.php";
/*
 * Demo for Play
 */
$pid = $_GET["pid"];
$move = $_GET["move"];

$play = new Play();

// Change to support exceptional cases
$validity = $play->isValid_move($move,$pid);

// Load Game File

$data = $play->get_game($pid);
$play->setPid($data);
$play->setBoard($data);

if(is_null($pid)){
    echo json_encode(array(
        "response"=>false,
        "reason"=>"PID not specified"
    ));
} elseif (is_null($move)){
    echo json_encode(array(
        "response"=>false,
        "reason"=>"Move not specified"
    ));
}elseif ($move > 6 or 0 > $move){
    echo json_encode(array(
       "response"=>false,
        "reason"=>"Invalid slot, ".$move
    ));
}elseif ($play->getPid()!=$pid){
    echo json_encode(array(
        "response"=>false,
        "reason"=>"Invalid PID"
    ));
}elseif ($validity == true ){
    switch ($data["strategy"]){
        case "Random":
            echo $play -> move_response($move,rand(0,6));
            break;
        case "Smart":
            echo $play -> move_response($move,rand(0,6));
            break;
    }
} else {
    echo $validity;
}

//echo $play->move_response($move,0);

