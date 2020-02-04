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
    $getRightAnswerForRound = function (&$roundQuestion) {
        $arithmeticProgression = generateProgression();
        $skippedKey = array_rand($arithmeticProgression);
        $rightAnswer = $arithmeticProgression[$skippedKey];
        $arithmeticProgression[$skippedKey] = '..';
        $roundQuestion .= implode(' ', $arithmeticProgression);
        
        return $rightAnswer;
    };
    
    runEngine($getRightAnswerForRound,'What number is missing in the progression?');
}
