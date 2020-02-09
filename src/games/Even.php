<?php

namespace BrainGames\Games;

use function BrainGames\runEngine;

function isEven($number)
{
    return $number % 2 === 0;
}
function runEvenGame()
{
    $randomTopNumber = 100;
    
    $getRightAnswerForRound = function (&$roundQuestion) use ($randomTopNumber) {
        $number = rand(0, $randomTopNumber);
        $rightAnswer = isEven($number) ? 'yes' : 'no';
        $roundQuestion .= $number;
        
        return $rightAnswer;
    };
    
    runEngine($getRightAnswerForRound, 'Answer "yes" if the number is even, otherwise answer "no".');
}
