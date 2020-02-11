<?php

namespace BrainGames\Games;

use function BrainGames\runEngine;

const RANDOM_TOP_NUMBER_FOR_PROGRESSION_GAME = 50;

function generateProgression($randomFirstNumber, $randomTopNumber, $randomStepProgression)
{
    $arithmeticProgression = [];
    for ($i = $randomFirstNumber; $i < $randomTopNumber; $i += $randomStepProgression) {
         $arithmeticProgression[] = $i;
    }

    return $arithmeticProgression;
}

function runProgressionGame()
{
    $getRightAnswerForRound = function () {
        $randomFirstNumber = rand(0, 10);
        $randomStepProgression = rand(0, 5);
        $arithmeticProgression = generateProgression($randomFirstNumber, RANDOM_TOP_NUMBER_FOR_PROGRESSION_GAME, $randomStepProgression);
        $skippedKey = array_rand($arithmeticProgression);
        $rightAnswer = $arithmeticProgression[$skippedKey];
        $arithmeticProgression[$skippedKey] = '..';
        $roundQuestion = "Question: " . implode(' ', $arithmeticProgression);
    
        return ['roundQuestion' => $roundQuestion, 'rightAnswer' => $rightAnswer];
    };
    
    runEngine($getRightAnswerForRound, 'What number is missing in the progression?');
}
