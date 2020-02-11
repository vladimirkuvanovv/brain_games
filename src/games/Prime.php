<?php

namespace BrainGames\Games;

use function BrainGames\runEngine;

const RANDOM_TOP_NUMBER_FOR_PRIME_GAME = 100;

function isPrime($number)
{
    if ($number < 2) {
        return false;
    }
    if ($number == 2) {
        return $number;
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
        $number = rand(0, RANDOM_TOP_NUMBER_FOR_PRIME_GAME);
        $rightAnswer = isPrime($number) ? 'yes' : 'no';
        $roundQuestion = "Question: {$number}";
    
        return ['roundQuestion' => $roundQuestion, 'rightAnswer' => $rightAnswer];
    };
    
    runEngine($getRightAnswerForRound, 'Answer "yes" if given number is prime. Otherwise answer "no".');
}
