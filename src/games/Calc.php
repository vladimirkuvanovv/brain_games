<?php

namespace BrainGames\Games;

use function BrainGames\runEngine;

function generateComputedExpression($firstNumber, $secondNumber, $operation)
{
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
    
    return $result;
}

function runCalculationGame()
{
    $randomTopNumber = 20;
    
    $getRightAnswerForRound = function (&$roundQuestion) use ($randomTopNumber) {
        $firstNumber = (int)rand(0, $randomTopNumber);
        $secondNumber = (int)rand(0, $randomTopNumber);
        $operations = ['+', '-', '*'];
        $randKey = array_rand($operations);
        $operation = $operations[$randKey];
        $rightAnswer = generateComputedExpression($firstNumber, $secondNumber, $operation);
    
        $roundQuestion .= "{$firstNumber} {$operation} {$secondNumber}";
        
        return $rightAnswer;
    };
    
    runEngine($getRightAnswerForRound, 'What is the result of the expression?');
}
