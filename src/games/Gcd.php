<?php

namespace BrainGames\Games;

use function BrainGames\runEngine;

const RANDOM_TOP_NUMBER_FOR_GCD_GAME = 100;

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
    $getRightAnswerForRound = function () {
        $firstNumber = (int)rand(0, RANDOM_TOP_NUMBER_FOR_GCD_GAME);
        $secondNumber = (int)rand(0, RANDOM_TOP_NUMBER_FOR_GCD_GAME);
        $rightAnswer = getGCD($firstNumber, $secondNumber);
        $roundQuestion = "Question: {$firstNumber} and {$secondNumber}";
    
        return ['roundQuestion' => $roundQuestion, 'rightAnswer' => $rightAnswer];
    };
    
    runEngine($getRightAnswerForRound, 'Find the greatest common divisor of given numbers.');
}
