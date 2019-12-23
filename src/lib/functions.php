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
    $againstAnswer = '';
    if (is_bool($finalAnswer) && $finalAnswer) {
        if ($answer == 'no') {
            $againstAnswer = 'yes';
        } elseif ($answer == 'yes') {
            $againstAnswer = 'no';
        }
    }

    if (is_numeric($finalAnswer) && !empty($finalAnswer)) {
        $againstAnswer = $finalAnswer;
    }

    line($answer . " is wrong answer ;(. Correct answer was " . $againstAnswer);
    line("Let's try again, " . $name . "!");
}

function getCongratulationMessage($name)
{
    line('Congratulations, ' . $name . '!');
}

function choseGame()
{
    line('What game would you like to play: 
    1 - Calculation; 
    2 - Even Number; 
    3 - Great Common Divisor;
    4 - Definition prime number; 
    5 - Definition number of arithmetic progression ?');
    $gameNumber = (int)prompt('Input only number of game');

    if (!is_numeric($gameNumber)) {
        return false;
    }
    return $gameNumber;
}
