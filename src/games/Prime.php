<?php

namespace BrainGames\Games;

function isPrime($number)
{
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
        'Answer "yes" if given number is prime. Otherwise answer "no".',
        function () {
            $number = rand(0, 50);
            $successAnswer = 'yes';
            $failedAnswer = 'no';
            $isPrimeNumber = isPrime($number);
            return [
                'Question:' . $number,
                function ($answer) use ($isPrimeNumber, $successAnswer, $failedAnswer) {
                    return ($isPrimeNumber && $answer === $successAnswer) ||
                        (!$isPrimeNumber && $answer === $failedAnswer);
                },
                true,
            ];
        },
    ];
}
