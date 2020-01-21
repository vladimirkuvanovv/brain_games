<?php

namespace BrainGames\Games;

use function BrainGames\runEngine;

const MAIN_QUESTION_FOR_PROGRESSION = 'Answer "yes" if the number is even, otherwise answer "no".';

function generateProgression()
{
    $arithmeticProgression = [];
    $randomTopNumber = 30;
    for ($i = rand(0, 1); $i < $randomTopNumber; $i += 2) {
         $arithmeticProgression[] = $i;
    }

    return $arithmeticProgression;
}

function getArithmeticProgression()
{
    return [
        'play' => function () {
            $arithmeticProgression = generateProgression();
            $randomKey = array_rand($arithmeticProgression);
            $number = $arithmeticProgression[$randomKey];
            $arithmeticProgression[$randomKey] = '..';
            $arithmeticProgression = implode(' ', $arithmeticProgression);
            return [
                'resultAnswer' => $number,
                'dataForGame'  => $arithmeticProgression
            ];
        },
    ];
}

function runProgressionGame()
{
    ['play' => $play] = getArithmeticProgression();
    runEngine(MAIN_QUESTION_FOR_PROGRESSION, $play);
}
