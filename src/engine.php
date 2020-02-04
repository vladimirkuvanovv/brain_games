<?php

namespace BrainGames;

use function cli\line;
use function cli\prompt;

const ITERATIONS_COUNT = 3;

function runEngine($getRightAnswerForRound, $question)
{
    line('Welcome to the Brain Game!');
    line($question);
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);

    for ($i = 0; $i < ITERATIONS_COUNT; $i++) {
        $roundQuestion = 'Question ';
        $rightAnswer = $getRightAnswerForRound($roundQuestion);
        
        line($roundQuestion);
        $answer = prompt('Your answer');
        
        if ($answer == $rightAnswer) {
            line('Correct!');
        } else {
            line("{$answer}  is wrong answer ;(. Correct answer was {$rightAnswer}");
            line("Let's try again, {$name}!");
            return;
        }
    }
    
    line("Congratulations, {$name}!");
    return;
}
