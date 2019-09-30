<?php

class Play
{
    private $pid;
    private $board;
    private $move;
    private $strategy;
    private $content;
    private $row;

    /**
     * @param $move
     * @return bool true | false
     */
    public function isValid_move($move){
        $this->move = $move;
        if ($move > 0 and $move < 6){
            return true; // Valid
        } else {
            return false; // Invalid
        }
    }

    /**
     * @param $fileName, is the pid of the game
     * @return mixed, data
     */
    public function get_game($fileName)
    {
        $root = $_SERVER["DOCUMENT_ROOT"]."/domain/State/".$fileName.".json";
        $document = file_get_contents($root) or exit(json_encode(array("response"=>false,"pid"=>"Invalid PID")));
        $data = json_decode($document,true);
        $this->strategy = $data["strategy"];
        return $data;
    }

    /**
     * @param $move = players move
     * @param $opponent = opponent's move
     * @return false|string
     */
    /*
     * {"response":true,
     * "ack_move": {"slot":6,"isWin":false,"isDraw":false,"row":[]},
     * "move":{"slot":5,"isWin":false,"isDraw":false,"row":[]}}
     */
    public function move_response($move,$opponent){
        $response = array(
            "response"=>true,
            "ack_move"=>array(
                "slot"=>$move,
                "isWin"=>false,
                "isDraw"=>false,
                "row"=>array(),
            ),
            "move"=>array(
                "slot"=>$opponent,
                "isWin"=>false,
                "isDraw"=>false,
                "row"=>array(),
            ),
        );
        return json_encode($response,JSON_PRETTY_PRINT);
    }


}