<?php
include "domain/Game.php";
/*
 * Get UUID
 */
class Start
{

	private $pid;

	public function __construct()
	{
		$this->pid=uniqid();
	}

	public function get_pid()
	{
		return $this->pid;
	}

}
/*
 * Play Game Based on UUID
 */
session_start();
$_SESSION["Pid"] = uniqid();

// REST- Request
$strategy = $_GET["strategy"];

// {"response": true, "pid": "57cdc4815e1e5"}
$successful =  array("response"=>true,"pid"=>$_SESSION["Pid"]);
// {"response": false, "reason":"Strategy not specified"}
$error = array("response"=>false,"reason"=>"Strategy not specified.");
//{"response": false, "reason": "Unknown strategy"}
$none = array("response"=>false,"reason"=>"Unknown Strategy");

if($strategy == "Smart"){
	echo json_encode($successful,JSON_PRETTY_PRINT);
} elseif($strategy == "Random"){
	echo json_encode($successful,JSON_PRETTY_PRINT);
} elseif ($strategy == "") {
	echo json_encode($error,JSON_PRETTY_PRINT);
} else {
	echo json_encode($none,JSON_PRETTY_PRINT);
}

