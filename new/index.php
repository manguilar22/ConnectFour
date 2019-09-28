<?php

include "../domain/Game.php";

$game = new Game();

// REST- Request
$strategy = $_GET["strategy"];

$game->is_valid_game($strategy);
$game->set_strategy($strategy);


