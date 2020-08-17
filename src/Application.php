<?php declare(strict_types=1);


namespace App;


use App\Classes\FightStrategy;
use App\Classes\UserFactory;


class Application
{
    use \App\Traits\GenerateRandomsTrait;

    private static $instance = null;

    private $config = [];

    private $userStateAttacker;

    public function run()
    {
        echo "<h2>Application is running <h2></h2><br><br>" . PHP_EOL;

// "user input" with intervals provided
        $heroUser = ["name" => "hero", "health" => [70, 100], "strength" => [70, 80], "defence" => [45, 55], "speed" => [40, 50], "luck" => [10, 30]];
        $wildBeastUser = ["name" => "wildBeast", "health" => [60, 90], "strength" => [60, 90], "defence" => [40, 60], "speed" => [40, 60], "luck" => [25, 40]];

// "user input" with fixed values
//        $heroUser = ["name" => "hero", "health" => [70, 70], "strength" => [70, 70], "defence" => [45, 45], "speed" => [40, 40], "luck" => [10, 10]];
//        $wildBeastUser = ["name" => "wildBeast", "health" => [60, 60], "strength" => [60, 60], "defence" => [40, 40], "speed" => [40, 40], "luck" => [25, 25]];

// fixed chance for all rounds
//        $rapidStrike = $this->generateRandoms(10);
//        $magicShield = $this->generateRandoms(20);

// start round numbering

        for ($i = 1; $i <= 20; $i++) {

            $hero = (new UserFactory())->buildUser($heroUser);
            $wildBeast = (new UserFactory())->buildUser($wildBeastUser);

//dynamic chance for every iteration
            $rapidStrike = $this->generateRandoms(10);
            $magicShield = $this->generateRandoms(20);

// set random skills based on GenerateRandomsTrait
            $strike = $rapidStrike[$i];
            if ($strike == 1) {
                $hero->setRapidStrike();
            }

            $magic = $magicShield[$i];
            if ($magic == 1) {
                $hero->setMagicShield();
            }


// verify if the round is 1 or who was the attacker in the last round (if many)
// fight variable is an array of abjects resulted from FightStrategy

            if ($i == 1) {
                $fight = (new FightStrategy())->fightStrategy($i, $hero, $wildBeast);
            } elseif ($this->userStateAttacker == "Hero") {
                $fight = (new FightStrategy())->fightStrategy($i, $wildBeast, $hero);
            } else {
                $fight = (new FightStrategy())->fightStrategy($i, $hero, $wildBeast);
            }

// fight variable is read

            foreach ($fight as $user) {

                if ($user->isAttacker() === true) {

// set userStateAttacker to true -----> a not so elegant mode to replace an Observer DP

                    $this->userStateAttacker = ucfirst($user->getName());

                    echo "<strong>" . $this->userStateAttacker . "</strong> has attacked........ <br>";

                    if (method_exists($user, "getRapidStrike")) {
                        if ($user->getRapidStrike() > 0) {
                            echo "Skill RapidStrike was used by Hero. <br>";
                        }
                    }
                }

                if (method_exists($user, "getMagicShield")) {
                    if ($user->getMagicShield() === true && $user->isAttacker() === false) {
                        echo "Skill MagicShield was used by Hero.<br>";
                    }
                }

                if (($user->getDamage()) > 0) {
                    echo "The damage produced to " . ucfirst($user->getName()) . " is " . $user->getDamage() . ".<br>";
                    echo ucfirst($user->getName()) . " health is now " . $user->getHealth() . ".<br>";
                }

                if ($fight[1]->getHealth() <= 0 && $user->isAttacker() == false) {
                    echo ucfirst($fight[0]->getName()) . " has WIN the fight. <br>GAME OVER!<br><hr>";
                    unset($fight);
                    exit;
                }

                unset($user);
            }

            if ($i == 20) {
                echo "<h3>Game was finished without a winner.</h3>";
            }
        }
    }

// a Singleton approach
    public static function getInstance($config = [])
    {
        if (self::$instance === null) {
            self::$instance = new self($config);
        }
        return self::$instance;
    }

    private function __construct($config)
    {
        $this->config = $config;
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

}