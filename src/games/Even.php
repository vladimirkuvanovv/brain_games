<?php

namespace BrainGames\Games;

function getEvenNumberClosure()
{
    return [
        'Answer "yes" if the number is even, otherwise answer "no".',
        function () {
            $number = rand(0, 100);
            $answer_yes = 'yes';
            $answer_no = 'no';
            return [
              'Question:' . $number,
                function ($answer) use ($number, $answer_yes, $answer_no) {
                    return ($number % 2 === 0 && $answer === $answer_yes) ||
                          ($number % 2 !== 0 && $answer === $answer_no);
                },
              true,
            ];
        },
    ];
}
