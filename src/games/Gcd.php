<?php

namespace BrainGames\Games;

use function BrainGames\runEngine;

const MAIN_QUESTION_FOR_GCD = 'Find the greatest common divisor of given numbers.';

function getGCD($firstNumber, $secondNumber)
{
    if ($secondNumber > 0) {
        return getGCD($secondNumber, $firstNumber % $secondNumber);
    } else {
        return (int)abs($firstNumber);
    }
}

function getGreatCommonDivisor()
{
    return [
        'mainQuestion' => MAIN_QUESTION_FOR_GCD,
        'play' => function () {
            $firstNumber = rand(0, 20);
            $secondNumber = rand(0, 20);
            $resultNumber = getGCD($firstNumber, $secondNumber);
            return [
                'resultAnswer' => $resultNumber,
                'questionInGame' => "Question : " . $firstNumber . ' and ' . $secondNumber,
            ];
        },
    ];
}

function runGcdGame()
{
    ['mainQuestion' => $mainQuestion, 'play' => $play] = getGreatCommonDivisor();
    runEngine($mainQuestion, $play);
}