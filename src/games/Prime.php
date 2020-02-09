<?php

namespace BrainGames\Games;

use function BrainGames\runEngine;

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
    $randomTopNumber = 50;
    
    $getRightAnswerForRound = function (&$roundQuestion) use ($randomTopNumber) {
        $number = rand(0, $randomTopNumber);
        $rightAnswer = isPrime($number) ? 'yes' : 'no';
        $roundQuestion .= $number;
        
        return $rightAnswer;
    };
    
    runEngine($getRightAnswerForRound, 'Answer "yes" if given number is prime. Otherwise answer "no".');
}
