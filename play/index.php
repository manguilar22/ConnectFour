<?php

include "../domain/Play.php";

/*
 * Demo for Play
 */
$pid = $_GET["pid"];
$move = $_GET["move"];

$play = new Play();

// Change to support exceptional cases
$play->isValid_move($move);

$data = $play->get_game($pid);

switch ($data["strategy"]){
    case "Random":
        echo $play -> move_response($move,rand(0,6));
        for ($i=0;$i<$play->boardGame()->getRow();$i++){
            for ($j=0;$j<$play->boardGame()->getColumn();$j++){
                echo $play->getBoard()[$i][$j];
            }
        }
        break;
    case "Smart":
        echo $play -> move_response($move,rand(0,6));
        break;
}


//echo $play->move_response($move,0);

