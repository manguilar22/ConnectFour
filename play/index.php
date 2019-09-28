<?php

include "../domain/Play.php";

/*
 * Demo for Play
 */
$pid = $_GET["pid"];
$move = $_GET["move"];

$play = new Play();

$valid = $play->isValid_move($move);

echo $play->move_response($move);

