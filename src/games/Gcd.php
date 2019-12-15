<?php

namespace BrainGames\Games;

use function cli\line;
use function cli\prompt;

/*function getGreatCommonDivisor()
{
    line('Welcome to the Brain Game!');
    line('Find the greatest common divisor of given numbers.');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);

    $count_right_answer = 0;
    for ($i = 0; $i < 4; $i++) {
        $first_number = rand(0, 20);
        $second_number = rand(0, 20);
        $rez_number = getGCD($first_number, $second_number);
        line("Question : " . $first_number . ' and ' . $second_number);
        $answer = (int)prompt('Your answer ');

        if ($answer === $rez_number) {
            line('Correct!');
            $count_right_answer = ++$count_right_answer;

            if ($count_right_answer === 3) {
                line('Congratulations, ' . $name . '!');
                break;
            }
        } else {
            line($answer . " is wrong answer ;(. Correct answer was " . $rez_number);
            line("Let's try again, " . $name . "!");
            break;
        }
    }
}*/

function getGCD($first_number, $second_number)
{
    if ($second_number > 0) {
        return getGCD($second_number, $first_number % $second_number);
    } else {
        return (int)abs($first_number);
    }
}

function getGcdClosure()
{
    return [
        'message' => 'Find the greatest common divisor of given numbers.',
        'play'    => function () {
            $first_number = rand(0, 20);
            $second_number = rand(0, 20);
            $rez_number = getGCD($first_number, $second_number);
            return [
                'question' => "Question : " . $first_number . ' and ' . $second_number,
                'play_game'     => function ($answer) use($rez_number) {
                    return $answer === $rez_number;
                },
                'rezult_answer' => $rez_number,
            ];
        },
    ];
}
