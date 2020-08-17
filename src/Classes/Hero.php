<?php declare(strict_types=1);


namespace App\Classes;


class Hero extends User
{
    protected $rapidStrike = 0; // ($this->strength) * 2;
    protected $magicShield = false; // ($this->damage) / 2;

    /**
     * @return mixed
     */
    public function getRapidStrike()
    {
        return $this->rapidStrike;
    }

    /**
     * @return Hero
     */
    public function setRapidStrike()
    {
        $this->rapidStrike = ($this->strength) * 2;
        return $this;
    }

    /**
     * @return bool
     */
    public function getMagicShield(): bool
    {
        return $this->magicShield;
    }

    /**
     * @return Hero
     */
    public function setMagicShield()
    {
        $this->magicShield = true;
        return $this;
    }

}