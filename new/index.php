<?php 

$game = $_GET["strategy"];

if($game == "Smart"){
	echo "Playing a smart game"; 
} elseif($game == "Random"){
	echo "Playing a random game"; 
} else {
	$error = array(
		"message" => "Incorrect format specified, no valid option",
		"status"=>404,
	);
	json_encode($error,JSON_PRETTY_PRINT); 
}

echo "FAIL"; 

?>
