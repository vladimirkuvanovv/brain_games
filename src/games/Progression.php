<?php

namespace BrainGames\Games;

function generateProgression()
{
    $arithmeticProgression = [];
    for ($i = rand(0, 1); $i < 30; $i += 2) {
         $arithmeticProgression[] = $i;
    }

    $randomKey = array_rand($arithmeticProgression);
    $number = $arithmeticProgression[$randomKey];
    $arithmeticProgression[$randomKey] = '..';
    $arithmeticProgression = implode(' ', $arithmeticProgression);

    return [
        $number,
        $arithmeticProgression,
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
