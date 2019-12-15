<?php

function getArr()
{
    return [
       function ()
      {
          echo 'hi';
      }
    ];
}

[$greet] = getArr();

$greet();