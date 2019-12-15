<?php

namespace BrainGames\Games;

use function cli\line;
use function cli\prompt;

function getArithmeticPrograssion()
{
    line('Welcome to the Brain Game!');
    line('Find the greatest common divisor of given numbers.');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);

    $count_right_answer = 0;
    for ($i = 0; $i < 4; $i++) {
        [$number, $progression] = generateProgression();
        line("Question : " . $progression);
        $answer = (int)prompt('Your answer ');

        if ($answer === $number) {
            line('Correct!');
            $count_right_answer = ++$count_right_answer;

            if ($count_right_answer === 3) {
                line('Congratulations, ' . $name . '!');
                break;
            }
        } else {
            line($answer . " is wrong answer ;(. Correct answer was " . $number);
            line("Let's try again, " . $name . "!");
            break;
        }
    }
}

function generateProgression()
{
    $arithmetic_progression = [];
    for ($i = rand(0, 1); $i < 30; $i += 2) {
         $arithmetic_progression[] = $i;
    }

    $random_key = array_rand($arithmetic_progression);
    $number = $arithmetic_progression[$random_key];
    $arithmetic_progression[$random_key] = '..';
    $arithmetic_progression = implode(' ', $arithmetic_progression);

    return [
        $number,
        $arithmetic_progression,
    ];
}

function getProgressionClosure()
{
    return [
        'message' => 'Answer "yes" if the number is even, otherwise answer "no".',
        'play'    => function () {
            [$number, $progression] = generateProgression();
            return [
                'question' => 'Question:' . $progression,
                'play_game'     => function ($answer) use($number) {
                    return (int)$answer === (int)$number;
                },
                'rezult_answer' => $number,
            ];
        },
    ];
}
