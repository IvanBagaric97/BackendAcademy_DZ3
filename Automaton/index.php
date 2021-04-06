<?php

declare (strict_types = 1);

require_once "src/Automaton.php";
require_once "src/DefaultAutomaton.php";

function prnt(string $s = "") : void {
    echo $s . "<br>\n";
}
Automaton::register("ime", new DefaultAutomaton("karlo"));

Automaton::register("brojevi", new DefaultAutomaton("12345"));

Automaton::register("mijesano", new DefaultAutomaton("\[12345\]"));

Automaton::register("SofaAutomation",
    new DefaultAutomaton("Sofa<broj><brojeviislova>Score", ["broj" => "\\d+", "brojeviislova" => "\\w+"]));

Automaton::register("SofaAutomationSpace",
    new DefaultAutomaton("Sofa<space>Score", ["space" => "\\s+"]));

Automaton::register("SofaAutomationNonSpace",
    new DefaultAutomaton("Sofa<nonspace>Score", ["nonspace" => "\\S+"]));

Automaton::register("email",
    new DefaultAutomaton("<email>", ["email" => "^\S+@\S+"]));


$test = ["a", "karlo", "1", "[12345]", "SofaScore", "Sofa10Score", "Sofa2020EducationScore", "Sofa   Score",
    "Sofa       ", "Sofa12ćžđ2Score", "Sofa@#!Score", "ivan@gmail.com", "@gmail.com", "www.sofascore.com", ];

foreach($test as $t){
    $matched = null;
    foreach(Automaton::get() as $name => $automation){
        if(!$automation -> match($t)){
            continue;
        }
        $matched = $name;
        break;
    }
    if(null === $matched){
        prnt("None automation matched $t");
    }else{
        prnt("Automaton " . $matched . " matched $t");
    }
}

prnt(); prnt();

prnt(Automaton::get("ime") -> generate());

prnt(Automaton::get("SofaAutomation") -> generate(["broj" => "aaa"]));

prnt(Automaton::get("SofaAutomation") -> generate(["broj" => "100"]));

prnt(Automaton::get("SofaAutomation") -> generate(["broj" => "100", "brojeviislova" => "Radi"]));