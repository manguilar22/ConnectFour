<?php

class Play
{
    private $pid;
    private $move;
    private $row;


    public function isValid_move($move){
        $this->move = $move;
        if ($move > 0 and $move < 6){
            return true; // Valid
        } else {
            return false; // Invalid
        }
    }

    /**
     * @param $move
     * @return false|string
     */
    /*
     * {"response":true,
     * "ack_move": {"slot":6,"isWin":false,"isDraw":false,"row":[]},
     * "move":{"slot":5,"isWin":false,"isDraw":false,"row":[]}}
     */
    public function move_response($move){
        $response = array(
            "response"=>true,
            "ack_move"=>array(
                "slot"=>$move,
                "isWin"=>false,
                "isDraw"=>false,
                "row"=>array(),
            ),
            "move"=>array(
                "slot"=>$move,
                "isWin"=>false,
                "isDraw"=>false,
                "row"=>array(),
            ),
        );
        return json_encode($response,JSON_PRETTY_PRINT);
    }


}