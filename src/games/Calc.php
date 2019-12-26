<?php

namespace BrainGames\Games;

function getCalculation()
{
    return [
        'mainQuestion' => 'What is the result of the expression?',
         'play' => function () {
            $firstNumber = (int)rand(0, 20);
            $secondNumber = (int)rand(0, 20);
            $arrayOperations = ['+', '-', '*'];
            $randKey = array_rand($arrayOperations);
            $operation = $arrayOperations[$randKey];

            switch ($operation) {
                case '+':
                    $result = $firstNumber + $secondNumber;
                    break;
                case '-':
                    $result = $firstNumber - $secondNumber;
                    break;
                case '*':
                    $result = $firstNumber * $secondNumber;
                    break;
                default:
                    $result = null;
                    break;
            }

            return [
                'resultAnswer' => $result,
                'questionInGame' => "Question : " . "{$firstNumber} {$operation} {$secondNumber}"
            ];
         }
    ];
}
