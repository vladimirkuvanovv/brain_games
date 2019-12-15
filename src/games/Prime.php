<?php

namespace BrainGames\Games;

use function cli\line;
use function cli\prompt;

/*function getPrimeNumber()
{
    line('Welcome to the Brain Game!');
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);

    $answer_yes = 'yes';
    $answer_no = 'no';
    $count_right_answer = 0;
    for ($i = 0; $i < 4; $i++) {
        $number = rand(0, 40);
        $rez_number = isPrime($number);
        line("Question : " . $number);
        $answer = prompt('Your answer ');

        if (($rez_number && $answer == $answer_yes) || (!$rez_number && $answer == $answer_no)) {
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
}*/

function isPrime($number)
{
    if ($number == 2) {
        return $number;
    }
    if ($number % 2 == 0) {
        return false;
    }
    $i = 3;
    $max_count = (int)sqrt($number);
    while ($i <= $max_count) {
        if ($number % $i == 0) {
            return false;
        }

        $i += 2;
    }

    return true;
}

function getPrimeNumberClosure()
{
    return [
        'message' => 'Answer "yes" if given number is prime. Otherwise answer "no".',
        'play'    => function () {
            $number = rand(0, 50);
            $answer_yes = 'yes';
            $answer_no = 'no';
            $is_prime_number = isPrime($number);
            return [
                'question' => 'Question:' . $number,
                'play_game'     => function ($answer) use($is_prime_number, $answer_yes, $answer_no) {
                    return ($is_prime_number && $answer === $answer_yes) ||
                        (!$is_prime_number && $answer === $answer_no);
                },
                'rezult_answer' => true,
            ];
        },
    ];
}