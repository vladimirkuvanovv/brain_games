<?php

namespace BrainGames\Games;

use function BrainGames\runEngine;

function runCalculationGame()
{
    $mainQuestion = 'What is the result of the expression?';
    $randomTopNumber = 20;
    
    $getCalculationGamePlay = function () use ($randomTopNumber) {
        $firstNumber = (int)rand(0, $randomTopNumber);
        $secondNumber = (int)rand(0, $randomTopNumber);
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
            'dataForGame' => "{$firstNumber} {$operation} {$secondNumber}"
        ];
    };
    
    runEngine($mainQuestion, $getCalculationGamePlay);
}
