<?php

namespace BrainGames\Games;

use function BrainGames\runEngine;

const MAIN_QUESTION_FOR_CALC = 'What is the result of the expression?';

function getCalculation()
{
    return [
         'play' => function () {
            $firstNumber = (int)rand(0, 20);
            $secondNumber = (int)rand(0, 20);
            $operations = ['+', '-', '*'];
            $randKey = array_rand($operations);
            $operation = $operations[$randKey];

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
                'resultAnswer'   => $result,
                'questionInGame' => "{$firstNumber} {$operation} {$secondNumber}"
            ];
         }
    ];
}

function runCalculationGame()
{
    ['play' => $play] = getCalculation();
    runEngine(MAIN_QUESTION_FOR_CALC, $play);
}
