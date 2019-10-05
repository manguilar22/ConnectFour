<?php
include "BoardGame.php";
class Game {

    private $pid;
    private $strategy;

    public function __construct()
    {
        $this->pid=uniqid();
    }

    public function set_strategy($strategy){
        $this->strategy = $strategy;
    }

    public function get_pid()
    {
        return $this->pid;
    }

    public function get_strategy()
    {
        return $this->strategy;
    }

    /**
     * Checks if the REST parameter is correct.
     * param is the strategy given in the URL.
     * @param $move
     */
    // TODO: maybe change param to ...$strategy to match the REST parameter.
    public function is_valid_game($move){

        // {"response": true, "pid": "57cdc4815e1e5"}
        $successful =  array("response"=>true,"pid"=>$this->pid);
        // {"response": false, "reason":"Strategy not specified"}
        $error = array("response"=>false,"reason"=>"Strategy not specified.");
        //{"response": false, "reason": "Unknown strategy"}
        $none = array("response"=>false,"reason"=>"Unknown Strategy");

        if($move == "Smart"){
            echo json_encode($successful,JSON_PRETTY_PRINT);
        } elseif($move == "Random"){
            echo json_encode($successful,JSON_PRETTY_PRINT);
        } elseif ($move == "") {
            echo json_encode($error,JSON_PRETTY_PRINT);
        } else {
            echo json_encode($none,JSON_PRETTY_PRINT);
        }
    }

    /**
     * @param $pid
     * @param $strategy
     */
    public function create_game($pid,$strategy)
    {
        $game = new BoardGame();
        //$root = $_SERVER["DOCUMENT_ROOT"]."/domain/State/";
        // Remote Server
        $root = "../writable/";
        $content = json_encode(array(
            "pid"=>$pid,
            "strategy"=>$strategy,
            "game"=>$game->getBoard()));

        // Create JSON File
        $fp = fopen($root.$pid.".json","w");
        fwrite($fp,$content);
        fclose($fp);
    }


}

