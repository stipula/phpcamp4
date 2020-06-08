<?php

class Car
{
    public static $year;

    public $model;
    public $wheelsCount;
    public $doorsCount;
    public $color;
    public $body;
    public $trunkSize;
    public $power;
    public $fuelType;

    public function change()
    {
        $this->trunkSize = 30;
    }

    public function drive()
    {
        print 'broom broom <br />';
    }

    public function stop()
    {
        print 'stopping <br />';
    }

    public function honk()
    {
        print 'honk honk <br />';
    }

    public function getYear()
    {
        return self::$year;
    }

    public function changeYear($year)
    {
        self::$year = $year;
    }
}