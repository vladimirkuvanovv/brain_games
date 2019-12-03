<?php

namespace BrainGames\Games;

use function cli\line;
use function cli\prompt;

function getCalc()
{
    line('Welcome to the Brain Game!');
    line('What is the result of the expression?');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);

    $count_right_answer = 0;

    for ($i = 0; $i < 4; $i++) {
        $first_number = rand(0, 20);
        $second_number = rand(0, 20);
        $array_operations = ['+', '-', '*'];
        $rand_key = array_rand($array_operations);
        $operation = $array_operations[$rand_key];
        line("Question : " . "{$first_number} {$operation} {$second_number}");
        $answer = (int)prompt('Your answer ');
        if ($operation === '+') {
            $result = $first_number + $second_number;
        } elseif ($operation === '-') {
            $result = $first_number - $second_number;
        } else {
            $result = $first_number * $second_number;
        }


        if ($answer === $result) {
            line('Correct!');
            $count_right_answer = ++$count_right_answer;

            if ($count_right_answer === 3) {
                line('Congratulations, ' . $name . '!');
                break;
            }
        } else {
            line($answer . " is wrong answer ;(. Correct answer was " . $result);
            line("Let's try again, " . $name . "!");
            break;
        }
    }
}
