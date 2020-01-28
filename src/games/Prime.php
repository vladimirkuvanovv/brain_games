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
    $mainQuestion = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $randomTopNumber = 50;
    
    $getPrimeGamePlay = function () use ($randomTopNumber) {
        $number = rand(0, $randomTopNumber);
        $answer = isPrime($number) ? 'yes' : 'no';
        
        return [
            'resultAnswer' => $answer,
            'dataForGame'  => $number
        ];
    };
    
    runEngine($mainQuestion, $getPrimeGamePlay);
}
