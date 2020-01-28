<?php

namespace BrainGames\Games;

use function BrainGames\runEngine;

function generateProgression()
{
    $arithmeticProgression = [];
    $randomTopNumber = 50;
    $randomFirstNumber = rand(0, 10);
    $randomStepProgression = rand(0, 5);
    for ($i = $randomFirstNumber; $i < $randomTopNumber; $i += $randomStepProgression) {
         $arithmeticProgression[] = $i;
    }

    return $arithmeticProgression;
}

function runProgressionGame()
{
    $getProgressionGamePlay = function () {
        $arithmeticProgression = generateProgression();
        $randomKey = array_rand($arithmeticProgression);
        $number = $arithmeticProgression[$randomKey];
        $arithmeticProgression[$randomKey] = '..';
        $arithmeticProgression = implode(' ', $arithmeticProgression);
        return [
            'resultAnswer' => $number,
            'dataForGame'  => $arithmeticProgression
        ];
    };
    $mainQuestion = 'What number is missing in the progression?';
    runEngine($mainQuestion, $getProgressionGamePlay);
}
