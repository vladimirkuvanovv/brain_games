<?php

namespace BrainGames\Games;

use function BrainGames\runEngine;

const MAIN_QUESTION_FOR_PRIME = 'Answer "yes" if given number is prime. Otherwise answer "no".';
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

function getPrimeNumber()
{
    return [
        'mainQuestion' => MAIN_QUESTION_FOR_PRIME,
        'play' => function () {
            $number = rand(0, 50);
            $isPrimeNumber = isPrime($number);

            if ($isPrimeNumber) {
                $answer = 'yes';
            } else {
                $answer = 'no';
            }
            return [
                'resultAnswer' => $answer,
                'questionInGame' => 'Question:' . $number,
            ];
        },
    ];
}

function runPrimeGame()
{
    ['mainQuestion' => $mainQuestion, 'play' => $play] = getPrimeNumber();
    runEngine($mainQuestion, $play);
}
