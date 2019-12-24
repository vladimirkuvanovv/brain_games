<?php

namespace BrainGames\Games;

use function BrainGames\runEngine;

function getCalculation()
{
    $gameName = 'What is the result of the expression?';

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

    $question = "Question : " . "{$firstNumber} {$operation} {$secondNumber}";

    runEngine($gameName, $question, $result);
}
