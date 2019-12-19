<?php

namespace BrainGames\Games;

function generateProgression()
{
    $arithmetic_progression = [];
    for ($i = rand(0, 1); $i < 30; $i += 2) {
         $arithmetic_progression[] = $i;
    }

    $random_key = array_rand($arithmetic_progression);
    $number = $arithmetic_progression[$random_key];
    $arithmetic_progression[$random_key] = '..';
    $arithmetic_progression = implode(' ', $arithmetic_progression);

    return [
        $number,
        $arithmetic_progression,
    ];
}

function getArithmeticProgression()
{
    return [
        'Answer "yes" if the number is even, otherwise answer "no".',
        function () {
            [$number, $progression] = generateProgression();
            return [
                'Question:' . $progression,
                function ($answer) use ($number) {
                    return (int)$answer === (int)$number;
                },
                $number,
            ];
        },
    ];
}
