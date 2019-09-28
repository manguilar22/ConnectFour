<?php

class Info
{
    private $width;
    private $height;
    private $strategies;

    function __construct($width,$height,$strategies)
    {
        $this->width=$width;
        $this->height=$height;
        $this->strategies=$strategies;
    }

    function to_String()
    {
        // TODO: Implement __toString() method.

        return  json_encode(array(
            "width" => $this->width,
            "height" => $this->height,
            "strategies" => $this->strategies,
        ),JSON_PRETTY_PRINT);
    }

}