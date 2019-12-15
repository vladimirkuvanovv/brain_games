<?php

namespace BrainGames\Games;

function getGCD($first_number, $second_number)
{
    if ($second_number > 0) {
        return getGCD($second_number, $first_number % $second_number);
    } else {
        return (int)abs($first_number);
    }
}

function getGcdClosure()
{
    return [
        'Find the greatest common divisor of given numbers.',
        function () {
            $first_number = rand(0, 20);
            $second_number = rand(0, 20);
            $rez_number = getGCD($first_number, $second_number);
            return [
                "Question : " . $first_number . ' and ' . $second_number,
                function ($answer) use ($rez_number) {
                    return (int)$answer === (int)$rez_number;
                },
                $rez_number,
            ];
        },
    ];
}
