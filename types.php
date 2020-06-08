<?php
require_once 'Car.class.php';
require_once 'DatabaseSingleton.class.php';
print '<pre>';

$myVariable = DatabaseSingleton::getInstance();

die;

//int
$myVariable = 10;
var_dump($myVariable);

//float
$myVariable = 13.37;
var_dump($myVariable);

//string
$myVariable = 'asd';
var_dump($myVariable);

//array
$myVariable = [1,2,3];
var_dump($myVariable);

//bool
$myVariable = true;
var_dump($myVariable);

$myVariable = new stdClass();
$myVariable->test = 1;
var_dump($myVariable);


Car::$year = 2020;

$anotherCar = new Car();
$anotherCar->color = 'black';
$anotherCar->changeYear(2019);

$Car = new Car();
$Car->color = 'orange';
$Car->changeYear(2021);

var_dump($Car->getYear(), $anotherCar->getYear());


//$myVariable->drive();
