<?php declare(strict_types=1);


namespace App\Classes;


class FightStrategy
{
    public function fightStrategy($round, User $user1, User $user2)
    {

        var_dump("The ROUND number is " . $round);

        switch ($round) {

            case 1:
                if ($user1->getSpeed() > $user2->getSpeed()) {

                    user1Fight:
                    $this->establishDamage($user1, $user2);
                    return [$user1, $user2];
                    break;
                } elseif ($user1->getLuck() > $user2->getLuck()) {

                    goto user1Fight;

                } else {
                    user2Fight:
                    $this->establishDamage($user2, $user1);
                    return [$user2, $user1];
                    break;
                }

            case ($round != 1):

                goto user1Fight;

                break;
        }
    }


    public function establishDamage(User $user1, User $user2)
    {
        if (method_exists($user1, "getRapidStrike")) {
            if ($user1->getRapidStrike() > 0) {
                $user1->setStrength($user1->getRapidStrike());
            }
        }


        $user2->setDamage(($user1->getStrength() - $user2->getDefence()));


        if (method_exists($user2, "getMagicShield")) {
            if ($user2->getMagicShield()) {
                $user2->setDamage(($user2->getDamage() / 2));
            }
        }

        $user2->setHealth(($user2->getHealth() - $user2->getDamage()));
        $user1->setAttacker(true);
    }

}