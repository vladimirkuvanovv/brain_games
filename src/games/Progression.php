<?php

namespace BrainGames\Games;

use function BrainGames\runEngine;

function generateProgression($firstNumber, $topNumber, $numberStepProgression)
{
    $arithmeticProgression = [];
    for ($i = $firstNumber; $i < $topNumber; $i += $numberStepProgression) {
         $arithmeticProgression[] = $i;
    }

    return $arithmeticProgression;
}

function runProgressionGame()
{
    $getRightAnswerForRound = function () {
        $randomTopNumber = 50;
        $randomFirstNumber = rand(0, 10);
        $randomStepProgression = rand(0, 5);
        $arithmeticProgression = generateProgression($randomFirstNumber, $randomTopNumber, $randomStepProgression);
        $skippedKey = array_rand($arithmeticProgression);
        $rightAnswer = $arithmeticProgression[$skippedKey];
        $arithmeticProgression[$skippedKey] = '..';
        $roundQuestion = "Question: " . implode(' ', $arithmeticProgression);
    
        return ['roundQuestion' => $roundQuestion, 'rightAnswer' => $rightAnswer];
    };
    
    runEngine($getRightAnswerForRound, 'What number is missing in the progression?');
}
