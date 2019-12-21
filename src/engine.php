<?php

namespace BrainGames;

use function BrainGames\Games\getCalculation;
use function BrainGames\Games\getEvenNumber;
use function BrainGames\Games\getGreatCommonDivisor;
use function BrainGames\Games\getPrimeNumber;
use function BrainGames\Games\getArithmeticProgression;
use function BrainGames\Lib\choseGame;
use function BrainGames\Lib\getCongratulationMessage;
use function BrainGames\Lib\getCorrectMessage;
use function BrainGames\Lib\getGreetingMessage;
use function BrainGames\Lib\getOutMessage;
use function cli\line;
use function cli\prompt;

function runEngine()
{
    $gameNumber = choseGame();

    if ($gameNumber === 1) {
        [$gameName, $play] = getCalculation();
    } elseif ($gameNumber === 2) {
        [$gameName, $play] = getEvenNumber();
    } elseif ($gameNumber === 3) {
        [$gameName, $play] = getGreatCommonDivisor();
    } elseif ($gameNumber === 4) {
        [$gameName, $play] = getPrimeNumber();
    } elseif ($gameNumber === 5) {
        [$gameName, $play] = getArithmeticProgression();
    } else {
         line('Enter correct number, please!');
         return runEngine();
    }

    $name = getGreetingMessage($gameName);

    $countRightAnswer = 0;
    for ($i = 0; $i < 3; $i++) {
        [$question, $playGame, $finalAnswer] = $play();

        line($question);
        $answer = prompt('Your answer ');
        
        if ($playGame($answer)) {
            getCorrectMessage();

            ++$countRightAnswer;
            if ($countRightAnswer === 3) {
                getCongratulationMessage($name);
                break;
            }
        } else {
            getOutMessage($name, $answer, $finalAnswer);
            break;
        }
    }
}
