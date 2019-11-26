<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function getEvenNumber()
{
    line('Welcome to the Brain Game!');
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);

    $answer_yes = 'yes';
    $answer_no = 'no';
    $count_right_answer = 0;

    for ($i = 0; $i < 4; $i++) {
        $number = rand(0, 100);
        line("Question : " . $number);
        $answer = prompt('Your answer ');

        if (($number % 2 === 0 && $answer === $answer_yes) || ($number % 2 !== 0 && $answer === $answer_no)) {
            line('Correct!');
            $count_right_answer = ++$count_right_answer;

            if ($count_right_answer === 3) {
                line('Congratulations, ' . $name . '!');
                break;
            }
        } else {
            if ($answer === $answer_yes) {
                $answer_against = $answer_no;
            } else {
                $answer_against = $answer_yes;
            }

            line($answer . " is wrong answer ;(. Correct answer was " . $answer_against);
            line("Let's try again, " . $name . "!");
            break;
        }
    }
}
