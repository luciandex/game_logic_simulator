<?php declare(strict_types=1);


namespace App\Classes;


class UserFactory
{
    private $user;

    public function buildUser(array $user)
    {
        if ($user['name'] == 'hero') {

            $this->user = new Hero();

        } elseif ($user['name'] == 'wildBeast') {

            $this->user = new WildBeast();
        }

        $this->user->setName($user['name'])
            ->setHealth(rand($user['health'][0], $user['health'][1]))
            ->setStrength(rand($user['strength'][0], $user['strength'][1]))
            ->setDefence(rand($user['defence'][0], $user['defence'][1]))
            ->setSpeed(rand($user['speed'][0], $user['speed'][1]))
            ->setLuck(rand($user['luck'][0], $user['luck'][1]));

        return $this->user;
    }
}