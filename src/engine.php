<?php

namespace BrainGames;

use function BrainGames\Games\getCalculation;
use function BrainGames\Games\getEvenNumber;
use function BrainGames\Games\getGreatCommonDivisor;
use function BrainGames\Games\getPrimeNumber;
use function BrainGames\Games\getArithmeticProgression;
use function BrainGames\Lib\choseGame;
use function BrainGames\Lib\getCongratulationMessage;
use function BrainGames\Lib\getGreetingMessage;
use function BrainGames\Lib\getOutMessage;
use function cli\line;
use function cli\prompt;

function runEngine($gameName, $question, $correctAnswer)
{
    $name = getGreetingMessage($gameName);

    $countRightAnswer = 0;
    for ($i = 0; $i < 3; $i++) {
        line($question);
        $answer = prompt('Your answer ');
        
        if ($answer === $correctAnswer) {
            line('Correct!');

            ++$countRightAnswer;
            if ($countRightAnswer === 3) {
                getCongratulationMessage($name);
                break;
            }
        } else {
            getOutMessage($name, $answer, $correctAnswer);
            break;
        }
    }
}
