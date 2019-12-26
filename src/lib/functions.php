<?php

namespace BrainGames\Lib;

use function cli\line;
use function cli\prompt;

function getGreetingMessage($message)
{
    line('Welcome to the Brain Game!');
    line($message);
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);

    return $name;
}

function getOutMessage($name, $answer, $finalAnswer)
{
    line($answer . " is wrong answer ;(. Correct answer was " . $finalAnswer);
    line("Let's try again, " . $name . "!");
}

function getCongratulationMessage($name)
{
    line('Congratulations, ' . $name . '!');
}
