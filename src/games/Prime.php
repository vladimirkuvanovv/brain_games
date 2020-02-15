<?php

namespace BrainGames\Games;

use function BrainGames\runEngine;

function isPrime($number)
{
    if ($number < 2) {
        return false;
    }
    if ($number == 2) {
        return true;
    }
    if ($number % 2 == 0) {
        return false;
    }
    $i = 3;
    $maxCount = (int)sqrt($number);
    while ($i <= $maxCount) {
        if ($number % $i == 0) {
            return false;
        }

        $i += 2;
    }

    return true;
}

function runPrimeGame()
{
    $getRightAnswerForRound = function () {
        $randomTopNumber = 100;
        $number = rand(0, $randomTopNumber);
        $rightAnswer = isPrime($number) ? 'yes' : 'no';
        $roundQuestion = "Question: {$number}";
    
        return ['roundQuestion' => $roundQuestion, 'rightAnswer' => $rightAnswer];
    };
    
    runEngine($getRightAnswerForRound, 'Answer "yes" if given number is prime. Otherwise answer "no".');
}
