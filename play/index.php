<?php

include "../domain/Play.php";

/*
 * Demo for Play
 */
$pid = $_GET["pid"];
$move = $_GET["move"];

$play = new Play();

$play->isValid_move($move);

$data = $play->get_game($pid);

switch ($data["strategy"]){
    case "Random":
        echo $play -> move_response($move,rand(0,7));
        break;
    case "Smart":
        echo $play -> move_response($move,0);
        break;
}

//echo $play->move_response($move,0);

