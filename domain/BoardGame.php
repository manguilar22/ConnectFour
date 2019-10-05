<?php


class BoardGame
{

    private $board;
    private $row;
    private $column;
    private $placeholder;

    public function __construct()
    {
        $this->row = 7;
        $this->column = 6;
        $this->placeholder = array();
        $this->board = $this->populate_board();
    }

    /**
     * @return int
     */
    public function getRow()
    {
        return $this->row-1;
    }

    /**
     * @return int
     */
    public function getColumn()
    {
        return $this->column-1;
    }

    /**
     * @return array
     */
    public function getPlaceholder()
    {
        return $this->placeholder;
    }

    public function addPlaceholder($var){
        $this->placeholder = array_push($this->placeholder,$var);
        return $this->placeholder;
    }

    public function getBoard(){
        return $this->board;
    }

    public function setBoard($data){
        $this->board = $data;
    }

    public function checkPlace($move)
    {
        $board = $this->board;
        $col = $this->getColumn();
        $placeholder = $this->addPlaceholder($move);
        $results = array_unique($placeholder);
        if(($board[$col][$move] == 1 or $board[$col][$move] == 2) and in_array($move,$results)) {
            $col--;
        }
        return $col;
    }

    public function placeToken($move){
        $column = $this->checkPlace($move);
        /*
         * [] [] [] []
         * [] [] [] []
         * [] [] [] []
         * [] [] [] []
         */
        $this->board[$move][$column] = 1;
    }

    public function placeTokenOpponent($move)
    {
        $column = $this->checkPlace($move);
        $this->board[$move][$column]= 2;
    }



    public function randomAI($move){
        for ($i=0;$i<$this->getRow();$i++){
            for ($j=0;$j<$this->getColumn();$j++){

            }
        }
    }


    public function populate_board()
    {
        $table = [[]];
        for ($i=0;$i<$this->getRow();$i++){
            for($j=0;$j<$this->getColumn();$j++){
                $table[$i][$j] = 0;
            }
        }
        $this->board = $table;
        return $this->board;
    }

}