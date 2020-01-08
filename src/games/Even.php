<?php

namespace BrainGames\Games;

use function BrainGames\runEngine;

const MAIN_QUESTION_FOR_EVEN = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven($number)
{

    if ($number % 2 === 0) {
        $answer = 'yes';
    } else {
        $answer = 'no';
    }

    return $answer;
}

function getEvenNumber()
{
    return [
        'mainQuestion' => MAIN_QUESTION_FOR_EVEN,
        'play' => function () {

            $number = rand(0, 100);
            $answer = isEven($number);
            return [
                'resultAnswer' => $answer,
                'questionInGame' => 'Question:' . $number
            ];
        },
    ];
}

function runEvenGame()
{
    ['mainQuestion' => $mainQuestion, 'play' => $play] = getEvenNumber();
    runEngine($mainQuestion, $play);
}
