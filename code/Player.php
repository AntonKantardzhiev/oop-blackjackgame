<?php
declare(strict_types=1);

class Player
{
    private array $cards = [];
    private bool $lost = false;

    public function __construct(Deck $deck){
        array_push($this->cards,$deck->drawCard(),$deck->drawCard());

    }
    public function hit(){
array_push($this->cards,$deck->drawCard());
if($this->getScore()>21){
    $this->lost= true;
}
    }
    public function surrender(){

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