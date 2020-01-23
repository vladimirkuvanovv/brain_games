<?php

namespace BrainGames\Games;

use function BrainGames\runEngine;

function runEvenGame()
{
    $mainQuestion = 'Answer "yes" if the number is even, otherwise answer "no".';
    $randomTopNumber = 100;
    
    $isEven = function ($number) {
        return $number % 2 === 0;
    };
    
    $getEvenNumberGamePlay = function () use ($isEven, $randomTopNumber) {
        $number = rand(0, $randomTopNumber);
        $answer = $isEven($number) ? 'yes' : 'no';
    
        return [
            'resultAnswer' => $answer,
            'dataForGame'  => $number
        ];
    };
    
    runEngine($mainQuestion, $getEvenNumberGamePlay);
}
