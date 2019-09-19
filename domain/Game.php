<?php

class Game {

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

