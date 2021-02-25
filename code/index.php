<?php
declare(strict_types=1);

session_start();

require_once("Card.php");
require_once("Deck.php");
require_once("Suit.php");
require_once("Player.php");
require_once("Dealer.php");
require_once("Blackjack.php");


if (isset($_SESSION['blackjack'])) {
    $game = $_SESSION['blackjack'];
} else {
    $game = new Blackjack();



//displayScore();



}
    if($_POST["playerAction"] == "hit"){

        $game->getPlayer()->hit($game->getDeck());
        echo "Dealer total: " . $game->getDealer()->getScore() .PHP_EOL;
        echo "<br>";
        echo "Player total: " . $game->getPlayer()->getScore() .PHP_EOL;
        if ($game->getPlayer()->hasLost() == true){
            echo "<h2>" ."Dealer Win". "<h2>";

        }
        elseif(($game->getPlayer()->getScore() > 21)&&($game->getDealer()->hasLost() == true)){
                echo "<h2>"."Dealer win!". "</h2>";
        }
        if(( $game->getDealer()->hasLost() == true)||($game->getPlayer()->hasLost() == true)){
            $game = new Blackjack();
        }

    }


if(isset($_POST["playerAction"])) {
    if ($_POST["playerAction"] == "stand") {
        $game->getDealer()->hit($game->getDeck());
        echo "Dealer's total: " . $game->getDealer()->getScore() . PHP_EOL;
        echo "<br>";
        echo "Player total: " . $game->getPlayer()->getScore() . PHP_EOL;
        if (($game->getDealer()->hasLost() == false)&&($game->getPlayer()->getScore() > $game->getDealer()->getScore())) {
            echo "<h2>" . "Player win!" . "<h2>";
        } else {
            echo "<h2>" . "Dealer win!" . "<h2>";
        }
        }

}

/*function displayScore()
{
    echo "Dealer total score is " . $_SESSION["blackjack"]->getDealer()->getScore() . " . ". PHP_EOL;
    echo "<br>";
    echo "Your total score is " . $_SESSION["blackjack"]->getPlayer()->getScore() . " . " . PHP_EOL;

}*/

?>
    <!doctype html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Black Jack</title>
    </head>
    <body>
    <h1>Black Jack Game</h1>
    <form action="index.php" method="POST">
        <button type="submit" class="btn" name="playerAction" value="hit">Hit</button>
        <button type="submit" class="btn" name="playerAction" value="stand">Stand</button>
        <button type="submit" class="btn" name="playerAction" value="surrender">Surrender</button>
        <button type="submit" name="playerAction" value="restart">Restart</button>
    </form>
    </body>
    </html>


