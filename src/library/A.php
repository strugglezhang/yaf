<?php
class A{
    public static function ins(){
        return new static();
    }

    public function abc(){
        echo 111;
    }
}
