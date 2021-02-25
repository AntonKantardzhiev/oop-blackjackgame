<?php
declare(strict_types=1);
require_once("Player.php");

class Dealer extends Player
{
    public const MIN_CARDS = 15;
public function hit(Deck $deck)
{
    do {
        parent::hit($deck);
    } while ($this->getScore() <= self::MIN_CARDS);
}
}