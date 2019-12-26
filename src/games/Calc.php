<?php

namespace BrainGames\Games;

function getCalculation()
{
    return [
        'mainQuestion' => 'What is the result of the expression?',
         'play' => function ()
        {
            $firstNumber = (int)rand(0, 20);
            $secondNumber = (int)rand(0, 20);
            $arrayOperations = ['+', '-', '*'];
            $randKey = array_rand($arrayOperations);
            $operation = $arrayOperations[$randKey];
//switch case
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
                $result,
                "Question : " . "{$firstNumber} {$operation} {$secondNumber}"
            ];
        }
    ];
}
