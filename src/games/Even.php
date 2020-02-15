<?php

namespace BrainGames\Games;

use function BrainGames\runEngine;

function isEven($number)
{
    return $number % 2 === 0;
}
function runEvenGame()
{
    $getRightAnswerForRound = function () {
        $randomTopNumber = 100;
        $number = rand(0, $randomTopNumber);
        $rightAnswer = isEven($number) ? 'yes' : 'no';
        $roundQuestion = "Question: {$number}";
    
        return ['roundQuestion' => $roundQuestion, 'rightAnswer' => $rightAnswer];
    };
    
    runEngine($getRightAnswerForRound, 'Answer "yes" if the number is even, otherwise answer "no".');
}
