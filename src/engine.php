<?php

namespace BrainGames;

use function BrainGames\Lib\getCongratulationMessage;
use function BrainGames\Lib\getGreetingMessage;
use function BrainGames\Lib\getOutMessage;
use function cli\line;

function runEngine($mainQuestion, $play)
{
    $name = getGreetingMessage($mainQuestion);

    $countRightAnswer = 0;
    for ($i = 0; $i < 3; $i++) {
        ['resultAnswer' => $resultAnswer, 'questionInGame' => $questionInGame, 'userAnswer' => $userAnswer] = $play();
        line($questionInGame);
        $answer = $userAnswer();
        
        if ($answer === $resultAnswer) {
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
