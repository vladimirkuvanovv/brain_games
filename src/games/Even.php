<?php

namespace BrainGames\Games;

function getEvenNumber()
{
    return [
        'mainQuestion' => 'Answer "yes" if the number is even, otherwise answer "no".',
        'play' => function () {
            $number = rand(0, 100);
            if ($number % 2 === 0) {
                $answer = 'yes';
            } else {
                $answer = 'no';
            }

            return [
                'resultAnswer' => $answer,
                'questionInGame' => 'Question:' . $number
            ];
        },
    ];
}
