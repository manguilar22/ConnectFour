<?php
header("Content-type:application/json"); 

/*   {"width":7,"height":6,"strategies":["Smart","Random"]} 	*/
$settings = array(
	"width" => 7,
	"height" => 6, 
	"stategies" => array(
		"Smart",
		"Random",
	),
);

echo json_encode($settings, JSON_PRETTY_PRINT);

?>
   
