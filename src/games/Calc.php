<?php

namespace BrainGames\Games;

use function BrainGames\runEngine;

const RANDOM_TOP_NUMBER_FOR_CALC_GAME = 20;

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
        $firstNumber = (int)rand(0, RANDOM_TOP_NUMBER_FOR_CALC_GAME);
        $secondNumber = (int)rand(0, RANDOM_TOP_NUMBER_FOR_CALC_GAME);
        $operations = ['+', '-', '*'];
        $randKey = array_rand($operations);
        $operation = $operations[$randKey];
        $rightAnswer = generateComputedExpression($firstNumber, $secondNumber, $operation);
    
        $roundQuestion = "Question: {$firstNumber} {$operation} {$secondNumber}";
        
        return ['roundQuestion' => $roundQuestion, 'rightAnswer' => $rightAnswer];
    };
    
    runEngine($getRightAnswerForRound, 'What is the result of the expression?');
}
