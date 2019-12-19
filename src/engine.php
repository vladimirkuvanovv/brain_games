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
    $game_number = choseGame();

    if ($game_number === 1) {
        [$game_name, $play] = getCalculation();
    } elseif ($game_number === 2) {
        [$game_name, $play] = getEvenNumber();
    } elseif ($game_number === 3) {
        [$game_name, $play] = getGreatCommonDivisor();
    } elseif ($game_number === 4) {
        [$game_name, $play] = getPrimeNumber();
    } elseif ($game_number === 5) {
        [$game_name, $play] = getArithmeticProgression();
    } else {
         line('Enter correct number, please!');
         return runEngine();
    }

    $name = getGreetingMessage($game_name);

    $count_right_answer = 0;
    for ($i = 0; $i < 3; $i++) {
        [$question, $play_game, $rez_answer] = $play();

        line($question);
        $answer = prompt('Your answer ');
        
        if ($play_game($answer)) {
            getCorrectMessage();

            ++$count_right_answer;
            if ($count_right_answer === 3) {
                getCongratulationMessage($name);
                break;
            }
        } else {
            getOutMessage($name, $answer, $rez_answer);
            break;
        }
    }
}
