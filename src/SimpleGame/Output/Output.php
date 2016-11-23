<?php

namespace SimpleGame\Output;

class Output 
{
    /**
     * @param $data
     */
    public static function write($data)
    {
        echo $data;
    }

    /**
     * @param string $line
     */
    public static function writeln($line)
    {
        echo sprintf("--> %s \n", $line);
    }

    /**
     * @return string
     */
    public static function readLine()
    {

        return readline();
    }
}