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

function getOutMessage($name, $answer, $rez_answer)
{
    if (is_bool($rez_answer) && $rez_answer) {
        if ($answer == 'no') {
            $rez_answer = 'yes';
        } elseif ($answer == 'yes') {
            $rez_answer = 'no';
        }
    }

    if (is_numeric($rez_answer) && !empty($rez_answer)) {
        $answer_against = $rez_answer;
    }
    line($answer . " is wrong answer ;(. Correct answer was " . $rez_answer);
    line("Let's try again, " . $name . "!");
}

function getCorrectMessage()
{
    line('Correct!');
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
    $game_number = (int)prompt('Input only number of game');

    if (!is_numeric($game_number)) {
        return false;
    }
    return $game_number;
}