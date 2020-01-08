<?php

namespace BrainGames;

use function BrainGames\Lib\getCongratulationMessage;
use function BrainGames\Lib\getOutMessage;
use function cli\line;
use function cli\prompt;

function runEngine($mainQuestion, $play)
{
    line('Welcome to the Brain Game!');
    line($mainQuestion);
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);

    $countRightAnswer = 0;
    for ($i = 0; $i < 3; $i++) {
        ['resultAnswer' => $resultAnswer, 'questionInGame' => $questionInGame] = $play();
        line($questionInGame);
        $answer = prompt('Your answer ');
        
        if ($answer == $resultAnswer) {
            line('Correct!');

            ++$countRightAnswer;
            if ($countRightAnswer === 3) {
                getCongratulationMessage($name);
                break;
            }
        } else {
            getOutMessage($name, $answer, $resultAnswer);
            break;
        }
    }
}
