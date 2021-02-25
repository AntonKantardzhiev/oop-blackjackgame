<?php
declare(strict_types=1);

class Player
{
    public const MAX_CARDS= 21;
    private array $cards = [];
    private bool $lost = false;

    public function __construct(Deck $deck){
        array_push($this->cards,$deck->drawCard(),$deck->drawCard());

    }
    public function hit(Deck $deck){
array_push($this->cards,$deck->drawCard());
if($this->getScore() > self::MAX_CARDS){
    $this->lost= true;
}
    }
    public function surrender(){
return $this->lost=true;
    }
    public function getScore(){
$totalValue=0;
foreach ($this->cards as $card){
    $totalValue+= $card->getValue();
}
return $totalValue;
    }
    public function hasLost(){
return $this->lost;
    }


}