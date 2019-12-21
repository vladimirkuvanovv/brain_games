<?php

namespace BrainGames\Games;

function getEvenNumber()
{
    return [
        'Answer "yes" if the number is even, otherwise answer "no".',
        function () {
            $number = rand(0, 100);
            $successAnswer = 'yes';
            $failedAnswer = 'no';
            return [
              'Question:' . $number,
                function ($answer) use ($number, $successAnswer, $failedAnswer) {
                    return ($number % 2 === 0 && $answer === $successAnswer) ||
                          ($number % 2 !== 0 && $answer === $failedAnswer);
                },
              true,
            ];
        },
    ];
}
