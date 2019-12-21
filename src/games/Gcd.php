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
        'Find the greatest common divisor of given numbers.',
        function () {
            $firstNumber = rand(0, 20);
            $secondNumber = rand(0, 20);
            $resultNumber = getGCD($firstNumber, $secondNumber);
            return [
                "Question : " . $firstNumber . ' and ' . $secondNumber,
                function ($answer) use ($resultNumber) {
                    return (int)$answer === (int)$resultNumber;
                },
                $resultNumber,
            ];
        },
    ];
}
