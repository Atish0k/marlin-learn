<?php
class Person {
    public $name = 'Иван из класса';
    public $age;

    public function sayHello(){
        echo 'Привет, я класс Person';
    }
}
$myPerson = new Person();
$myPerson->name = "Иван сам";

echo $myPerson->name;