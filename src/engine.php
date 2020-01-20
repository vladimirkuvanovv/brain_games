<?php

namespace BrainGames;

use function cli\line;
use function cli\prompt;

const COUNT_ITERATIONS = 3;

function runEngine($mainQuestion, $play)
{
    line('Welcome to the Brain Game!');
    line($mainQuestion);
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);

    for ($i = 0; $i < COUNT_ITERATIONS; $i++) {
        ['resultAnswer' => $resultAnswer, 'questionInGame' => $questionInGame] = $play();
        line('Question ' . $questionInGame);
        $answer = prompt('Your answer');
        
        if ($answer == $resultAnswer) {
            line('Correct!');
        } else {
            line($answer . " is wrong answer ;(. Correct answer was " . $resultAnswer);
            line("Let's try again, " . $name . "!");
            break;
        }
    }
    
    line('Congratulations, ' . $name . '!');
    return;
}
