<?php

/*
 * Demo for Play
 */
session_start();
//$pid = $_GET["pid"];
//$move = $_GET["move"];
echo $_SESSION["Pid"];
/*
 * {"response": true,
 "ack_move": {
   "slot": 3,
   "isWin": false,   // winning move?
   "isDraw": false,  // draw?
   "row": []},       // winning row if isWin is true
 "move": {
   "slot": 4,
   "isWin": false,
   "isDraw": false,
   "row": []}}
 */

/*
if ($move >= 0 and 6 >= $move){
    $repsonse = array(
        "response" => true,
        "ack_move" => array(
            "slot" => $move,
            "isWin" => false,
            "isDraw" => false,
            "row" => [],
        ),
        "move" => array(
            "slot" => 4,
            "isWin" => false,
            "isDraw" => false,
            "row" => array(),
        ),
    );
    echo json_encode($repsonse,JSON_PRETTY_PRINT);
}
*/

echo "Works?";