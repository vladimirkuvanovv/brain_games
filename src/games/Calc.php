<?php

namespace BrainGames\Games;

function getCalculation()
{
    return [
         'What is the result of the expression?',
        function () {
            $firstNumber = rand(0, 20);
            $secondNumber = rand(0, 20);
            $arrayOperations = ['+', '-', '*'];
            $randKey = array_rand($arrayOperations);
            $operation = $arrayOperations[$randKey];

            if ($operation === '+') {
                $result = $firstNumber + $secondNumber;
            } elseif ($operation === '-') {
                $result = $firstNumber - $secondNumber;
            } elseif ($operation === '*') {
                $result = $firstNumber * $secondNumber;
            } else {
                $result = null;
            }

            return [
                "Question : " . "{$firstNumber} {$operation} {$secondNumber}",
                function ($answer) use ($result) {
                    return (int)$answer === (int)$result;
                },
                $result,
            ];
        },
    ];
}
