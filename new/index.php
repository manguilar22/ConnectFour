<?php 

$game = $_GET["strategy"];

// {"response": true, "pid": "57cdc4815e1e5"}
$successful =  array("response"=>true,"pid"=>"0");
// {"response": false, "reason":"Strategy not specified"}
$error = array("response"=>false,"reason"=>"Strategy not specified.");
//{"response": false, "reason": "Unknown strategy"}
$none = array("response"=>false,"reason"=>"Unkown Strategy");

if($game == "Smart"){
	echo json_encode($successful,JSON_PRETTY_PRINT);
} elseif($game == "Random"){
	echo json_encode($successful,JSON_PRETTY_PRINT);
} elseif ($game == "") {
	echo json_encode($error,JSON_PRETTY_PRINT);
} else {
	echo json_encode($none,JSON_PRETTY_PRINT);
}

?>
