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
    $max_count = (int)sqrt($number);
    while ($i <= $max_count) {
        if ($number % $i == 0) {
            return false;
        }

        $i += 2;
    }

    return true;
}

function getPrimeNumberClosure()
{
    return [
        'Answer "yes" if given number is prime. Otherwise answer "no".',
        function () {
            $number = rand(0, 50);
            $answer_yes = 'yes';
            $answer_no = 'no';
            $is_prime_number = isPrime($number);
            return [
                'Question:' . $number,
                function ($answer) use ($is_prime_number, $answer_yes, $answer_no) {
                    return ($is_prime_number && $answer === $answer_yes) ||
                        (!$is_prime_number && $answer === $answer_no);
                },
                true,
            ];
        },
    ];
}
