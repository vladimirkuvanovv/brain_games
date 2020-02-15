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
    $getRightAnswerForRound = function () {
        $randomTopNumber = 20;
        $firstNumber = (int)rand(0, $randomTopNumber);
        $secondNumber = (int)rand(0, $randomTopNumber);
        $operations = ['+', '-', '*'];
        $randKey = array_rand($operations);
        $operation = $operations[$randKey];
        $rightAnswer = generateComputedExpression($firstNumber, $secondNumber, $operation);
    
        $roundQuestion = "Question: {$firstNumber} {$operation} {$secondNumber}";
        
        return ['roundQuestion' => $roundQuestion, 'rightAnswer' => $rightAnswer];
    };
    
    runEngine($getRightAnswerForRound, 'What is the result of the expression?');
}
