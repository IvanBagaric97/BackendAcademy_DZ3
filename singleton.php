<?php

// General singleton class.
class Singleton {

    // Hold the class instance.
    private static ?Singleton $instance = null;

    public $mix;

    // The constructor is private
    // to prevent initiation with outer code.
    private function __construct()
    {
        // The expensive process (e.g.,db connection) goes here.
    }

    // The object is created from within the class itself
    // only if the class has no instance.
    public static function getInstance(): ?Singleton
    {
        if (self::$instance == null)
        {
            self::$instance = new Singleton();
        }

        return self::$instance;
    }
}

// All the variables point to the same object.
$object1 = Singleton::getInstance();
$object2 = Singleton::getInstance();
$object3 = Singleton::getInstance();

$object1 -> mix = "Prvi";
$object2 -> mix = "Drugi";
$object3 -> mix = "Treci";

echo $object1 -> mix . "<br>";
echo $object2 -> mix . "<br>";
echo $object3 -> mix . "<br>";
