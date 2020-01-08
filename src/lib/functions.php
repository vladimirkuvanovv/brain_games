<?php

namespace BrainGames\Lib;

use function cli\line;

function getOutMessage($name, $answer, $finalAnswer)
{
    line($answer . " is wrong answer ;(. Correct answer was " . $finalAnswer);
    line("Let's try again, " . $name . "!");
}

function getCongratulationMessage($name)
{
    line('Congratulations, ' . $name . '!');
}
