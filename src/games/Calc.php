<?php

namespace BrainGames\Games;

use function BrainGames\runEngine;

const MAIN_QUESTION_FOR_CALC = 'What is the result of the expression?';

function getCalculation()
{
    return [
        'mainQuestion' => MAIN_QUESTION_FOR_CALC,
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

function runCalculationGame()
{
    ['mainQuestion' => $mainQuestion, 'play' => $play] = getCalculation();
    runEngine($mainQuestion, $play);
}
