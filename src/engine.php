<?php

namespace BrainGames;

use function BrainGames\Games\getCalcClosure;
use function BrainGames\Games\getEvenNumberClosure;
use function BrainGames\Games\getGcdClosure;
use function BrainGames\Games\getPrimeNumberClosure;
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
        [$game_name, $play] = getCalcClosure();
    } elseif($game_number === 2) {
        [$game_name, $play] = getEvenNumberClosure();
    } elseif ($game_number === 3) {
        [$game_name, $play] = getGcdClosure();
    } elseif($game_number === 4) {
        [$game_name, $play] = getPrimeNumberClosure();
    } elseif($game_number === 5) {
        [$game_name, $play] = getEvenNumberClosure();
    }

    $name = getGreetingMessage($game_name);

    $count_right_answer = 0;
    for ($i = 0; $i < 4; $i++) {
        [$question, $play_game, $rez_answer] = $play();

        line($question);
        $answer = prompt('Your answer ');
        
        if ($play_game($answer)) {
            getCorrectMessage();

            if ($count_right_answer === 3) {
                getCongratulationMessage($name);
                break;
            }
            ++$count_right_answer;
        } else {
            getOutMessage($name, $answer, $rez_answer);
            break;
        }
    }

}