<?php
declare(strict_types=1);
require_once ('Blackjack.php');
require_once ('Card.php');
require_once ('Deck.php');
require_once ('Player.php');
class Blackjack
{
    private Player $player;
    private Dealer $dealer;
    private Deck $deck;
    public function __construct(){
        $deck = new Deck();
        $deck->shuffle();
        $this->deck =$deck;

        $this->player = new Player($this->deck);
        $this->dealer = new Dealer($this->deck);
    }

    public function getPlayer(): string
    {
        return $this->player;
    }

    public function getDealer(): string
    {
        return $this->dealer;
    }
    public function getDeck(): array
    {
        return $this->deck;
    }


}