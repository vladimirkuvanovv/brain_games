<?php

namespace BrainGames\Games;

function getCalcClosure()
{
    return [
         'What is the result of the expression?',
        function () {
            $first_number = rand(0, 20);
            $second_number = rand(0, 20);
            $array_operations = ['+', '-', '*'];
            $rand_key = array_rand($array_operations);
            $operation = $array_operations[$rand_key];

            if ($operation === '+') {
                $result = $first_number + $second_number;
            } elseif ($operation === '-') {
                $result = $first_number - $second_number;
            } elseif ($operation === '*') {
                $result = $first_number * $second_number;
            } else {
                $result = null;
            }

            return [
                "Question : " . "{$first_number} {$operation} {$second_number}",
                function ($answer) use ($result) {
                    return (int)$answer === (int)$result;
                },
                $result,
            ];
        },
    ];
}
