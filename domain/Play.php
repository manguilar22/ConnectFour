<?php
include "BoardGame.php";
class Play
{
    private $strategy;
    private $board;
    private $move;
    private $pid;

    public function __construct()
    {
        $this->board = new BoardGame();

    }

    public function setPid($data)
    {
        $this->pid = $data["pid"];
    }

    public function getPid()
    {
        return $this->pid;
    }


    public function setBoard($data){
        $this->board->setBoard($data["game"]);
    }

    public function getBoard()
    {
        return $this->board->getBoard();
    }

    public function getGame(){
        return $this->board;
    }

    /**
     * @param $move
     * @param $pid
     * @return bool true | false
     */
    public function isValid_move($move,$pid)
    {
        $this->move = $move;
        if ($move > 0 and $move < 6){
            return true; // Valid
        } else if ($pid != $this->pid) {
            return json_encode(array(
                "response" => false,
                "reason" => "Unknown Pid"
            ));
        }
        return true;
    }

    /**
     * @param $fileName, is the pid of the game
     * @return mixed, data
     */
    public function get_game($fileName)
    {
        //$root = $_SERVER["DOCUMENT_ROOT"]."/domain/State/".$fileName.".json";
        // Remote Server
        $root = "../writable/".$fileName.".json";
        $document = file_get_contents($root); //or exit(json_encode(array("response"=>false,"pid"=>"PID not valid")));
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
        $this->board->placeToken($move);
        $this->board->placeTokenOpponent($opponent);
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