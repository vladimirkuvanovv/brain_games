<?php

namespace BrainGames;

use function BrainGames\Lib\getCongratulationMessage;
use function BrainGames\Lib\getGreetingMessage;
use function BrainGames\Lib\getOutMessage;
use function BrainGames\Games\getCalculation;
use function cli\line;
use function cli\prompt;

function runEngine($gamePlay)
{
    [$mainQuestion, $play] = $gamePlay();
    $name = getGreetingMessage($mainQuestion);

    $countRightAnswer = 0;
    for ($i = 0; $i < 3; $i++) {
        [$result, $question] = $play();
        line($question);
        $answer = (int)prompt('Your answer ');
        
        if ($answer === $result) {
            line('Correct!');

            ++$countRightAnswer;
            if ($countRightAnswer === 3) {
                getCongratulationMessage($name);
                break;
            }
        } else {
            getOutMessage($name, $answer, $result);
            break;
        }
    }
}
