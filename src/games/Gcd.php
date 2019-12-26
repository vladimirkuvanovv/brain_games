<?php

namespace BrainGames\Games;

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
        'mainQuestion' => 'Find the greatest common divisor of given numbers.',
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
