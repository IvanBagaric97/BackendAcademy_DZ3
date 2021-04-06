<?php

declare (strict_types = 1);
require_once "Automaton.php";

class DefaultAutomaton extends Automaton {

    private $input;
    private $regex;
    private  $params = [];

    public function __toString(): string
    {
        return var_dump($this -> input) . var_dump($this -> regex) . var_dump($this -> $params);
    }

    public function __construct($input,array $regex = []) {
        $this -> input = $input;
        $this -> regex = $regex;
    }

    public function match($input): bool{
        $result = $this -> input;
        foreach ($this -> regex as $key => $value){
            $result = preg_replace("/<" . $key . ">/", $value, $result);
        }
        $a = preg_match("/" . $result . "/", $input);
        return $a === 0 ? false : true;
    }

    public function generate(array $array = []): string{
        $result = $this -> input;
        foreach ($this -> regex as $key => $value){
            if(!isset($array[$key])){
                $array[$key] = "-Missing param " . $key . "-";
            }else{
                preg_match("/" . $value . "/", $array[$key], $matches);

                if(isset($matches[0]))  $array[$key] = $matches[0];
                else $array[$key] ="-Value " . $key . "not valid-";
            }
            $result = str_replace("<" . $key . ">", $array[$key], $result);
        }
        return $result;
    }
}