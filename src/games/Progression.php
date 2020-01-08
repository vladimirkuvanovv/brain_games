<?php

namespace BrainGames\Games;

use function BrainGames\runEngine;

const MAIN_QUESTION_FOR_PROGRESSION = 'Answer "yes" if the number is even, otherwise answer "no".';

function generateProgression()
{
    $arithmeticProgression = [];
    $random_top_number = 30;
    for ($i = rand(0, 1); $i < $random_top_number; $i += 2) {
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
        'mainQuestion' => MAIN_QUESTION_FOR_PROGRESSION,
        'play' => function () {
            [$number, $progression] = generateProgression();
            return [
                'resultAnswer' => $number,
                'questionInGame' => 'Question:' . $progression
            ];
        },
    ];
}

function runProgressionGame()
{
    ['mainQuestion' => $mainQuestion, 'play' => $play] = getArithmeticProgression();
    runEngine($mainQuestion, $play);
}
