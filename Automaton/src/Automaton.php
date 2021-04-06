<?php

declare(strict_types=1);

abstract class Automaton{

    /**
     * Asocijativno polje automata u formatu $ime => $automat
     * @var array $map
     */
    private static $map = [];

    /**
     * Metoda provjerava podudara li se ulazni niz znakova s automatom.
     * @return true ako se niz podudara , false inace
     */
    public abstract function match($input) : bool;

    /**
     * DODAJ DOC
     * @param array $array
     * @return string
     */
    public abstract function generate(array $array = []) : string;

    /**
     * Metoda za registraciju automata. Imenu u $map se pridruuje automat.
     * @param string $name
     * @param Automaton $automaton
     */
    public static function register(string $name, Automaton $automaton){
        Automaton::$map[$name] = $automaton;
    }

    /**
     * Metoda vraca automat ili mapu automata.
     * Ako je predano ime, vraca automat ili null.
     * Ako je metoda pozvana bez parametara, vraca cijelu mapu automata.
     * @param string $name
     * @return null | Automaton | Automaton []
     */
    public static function get($name = null): array|Automaton|null {
        if($name === null){
            return self::$map;
        }else{
            if(isset(self::$map[$name])){
                return self::$map[$name];
            }else{
                return null;
            }
        }
    }
}