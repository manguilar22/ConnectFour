<?php

include "../domain/Info.php";

/*   {"width":7,"height":6,"strategies":["Smart","Random"]} 	*/

$settings =  new Info(7,6,array("Smart","Random"));

echo $settings->to_String();
   
