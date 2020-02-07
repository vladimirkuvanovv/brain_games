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
    $randomTopNumber = 20;
    
    $getRightAnswerForRound = function (&$roundQuestion) use ($randomTopNumber) {
        $firstNumber = (int)rand(0, $randomTopNumber);
        $secondNumber = (int)rand(0, $randomTopNumber);
        $rightAnswer = getGCD($firstNumber, $secondNumber);
    
        $roundQuestion .= "{$firstNumber} and {$secondNumber}";
        
        return $rightAnswer;
    };
    
    runEngine($getRightAnswerForRound, 'Find the greatest common divisor of given numbers.');
}
