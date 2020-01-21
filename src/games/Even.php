<?php

namespace BrainGames\Games;

use function BrainGames\runEngine;

const MAIN_QUESTION_FOR_EVEN = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven($number)
{
    if ($number % 2 === 0) {
        return true;
    } else {
        return false;
    }
}

function getEvenNumber()
{
    return [
        'play' => function () {

            $number = rand(0, 100);
            if (isEven($number)) {
                $answer = 'yes';
            } else {
                $answer = 'no';
            }
            
            return [
                'resultAnswer'   => $answer,
                'dataForGame' => $number
            ];
        },
    ];
}

function runEvenGame()
{
    ['play' => $play] = getEvenNumber();
    runEngine(MAIN_QUESTION_FOR_EVEN, $play);
}
