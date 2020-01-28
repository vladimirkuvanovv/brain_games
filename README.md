[![Maintainability](https://api.codeclimate.com/v1/badges/cceadc809df38876c267/maintainability)](https://codeclimate.com/github/vladimirkuvanovv/php-project-lvl1/maintainability)


[![Build Status](https://travis-ci.org/vladimirkuvanovv/php-project-lvl1.svg?branch=master)](https://travis-ci.org/vladimirkuvanovv/php-project-lvl1)

1) brain-even https://asciinema.org/a/288822

2) brain-calc https://asciinema.org/a/288820

3) brain-gcd https://asciinema.org/a/288824

4) brain-progression https://asciinema.org/a/289049

5) brain-prime https://asciinema.org/a/289048

There are 5 games in this package:
1) brain-even (you should determine whether a number is even or not);
2) brain-calc (you should calculate an expression);
3) brain-gcd (you should determine the greatest common divisor);
4) brain-prime (you should determine whether a number is prime or not);
5) brain-progression (you should determine a missing number in an arithmetic progression)

You should enter 3 right answers for successful result. If you enter a wrong answer, a game will finish. 
You can try again after that.

For install:
composer global require brgames/games:dev-master

After that execute one of the following command in console:

brain-even
brain-calc
brain-progression
brain-gcd
brain-prime

For uninstall:
composer global remove brgames/games