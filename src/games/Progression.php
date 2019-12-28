<?php

namespace BrainGames\Games;

use function cli\prompt;

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
        'mainQuestion' => 'Answer "yes" if the number is even, otherwise answer "no".',
        'play' => function () {
            [$number, $progression] = generateProgression();
            return [
                'resultAnswer' => (int)$number,
                'questionInGame' => 'Question:' . $progression,
                'userAnswer'     => function () {
                    return (int)prompt('Your answer ');
                }
            ];
        },
    ];
}
