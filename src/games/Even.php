<?php

namespace BrainGames\Games;

use function BrainGames\runEngine;

const RANDOM_TOP_NUMBER_FOR_EVEN_GAME = 100;

function isEven($number)
{
    return $number % 2 === 0;
}
function runEvenGame()
{
    $getRightAnswerForRound = function () {
        $number = rand(0, RANDOM_TOP_NUMBER_FOR_EVEN_GAME);
        $rightAnswer = isEven($number) ? 'yes' : 'no';
        $roundQuestion = "Question: {$number}";
    
        return ['roundQuestion' => $roundQuestion, 'rightAnswer' => $rightAnswer];
    };
    
    runEngine($getRightAnswerForRound, 'Answer "yes" if the number is even, otherwise answer "no".');
}
