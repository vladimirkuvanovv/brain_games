<?php

namespace BrainGames\Games;

use function BrainGames\runEngine;

function getGCD($firstNumber, $secondNumber)
{
    if ($secondNumber > 0) {
        return getGCD($secondNumber, $firstNumber % $secondNumber);
    } else {
        return (int)abs($firstNumber);
    }
}

function runGcdGame()
{
    $mainQuestion = 'Find the greatest common divisor of given numbers.';
    $randomTopNumber = 20;
    
    $getGcdGamePlay = function () use ($randomTopNumber) {
        $firstNumber = (int)rand(0, $randomTopNumber);
        $secondNumber = (int)rand(0, $randomTopNumber);
        $resultNumber = getGCD($firstNumber, $secondNumber);
    
        return [
            'resultAnswer'   => $resultNumber,
            'dataForGame' => "{$firstNumber} and {$secondNumber}",
        ];
    };
    runEngine($mainQuestion, $getGcdGamePlay);
}
