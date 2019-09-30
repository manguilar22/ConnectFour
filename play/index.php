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

/*
 if ($play["strategy"] == "Random"){
    GAME IS RANDOM
    $play -> move_response($move,RANDOM_NUM);
 } else {
    GAME IS SMART
    $play -> move_response($move,ALGORITHM);
 }
 */
echo $play->move_response($move,0);

