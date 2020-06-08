<?php

function changeScalar($test)
{
    $test += 5;
}

function changeObject($test)
{
    $test->a += 5;
}

function doNotChangeObjectLikeThis($test)
{
    $test = new stdClass();
    $test->a = 15;
}



//zmienna typu prostego
$test = 10;

print 'Test przed wykonaniem funkcji: <b>' . $test . '</b><br />';

changeScalar($test);

print 'Test po wykonaniu funkcji: <b>' . $test . '</b><br /><br />';



//zmienna typu obiektowego
$test = new stdClass();
$test->a = 10;

print 'Test obiektowy przed wykonaniem funkcji: <b>' . $test->a . '</b><br />';

changeObject($test);

print 'Test obiektowy po wykonaniu funkcji: <b>' . $test->a . '</b><br /><br />';



//zmienna typu obiektowego - to nie tak działa :)
$test = new stdClass();
$test->a = 10;

print '(błędny) Test obiektowy przed wykonaniem funkcji: <b>' . $test->a . '</b><br />';

doNotChangeObjectLikeThis($test);

print '(błędny) Test obiektowy po wykonaniu funkcji: <b>' . $test->a . '</b><br />';

