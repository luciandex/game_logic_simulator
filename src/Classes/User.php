<?php declare(strict_types=1);


namespace App\Classes;


abstract class User
{
    protected string $name;

    protected float $health;
    protected float $strength;
    protected float $defence;
    protected float $speed;
    protected float $luck;

    protected ?float $damage = null;

    protected bool $attacker = false;


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return User
     */
    public function setName(string $name): User
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return float
     */
    public function getHealth(): float
    {
        return $this->health;
    }

    /**
     * @param float $health
     * @return User
     */
    public function setHealth(float $health): User
    {
        $this->health = $health;
        return $this;
    }

    /**
     * @return float
     */
    public function getStrength(): float
    {
        return $this->strength;
    }

    /**
     * @param float $strength
     * @return User
     */
    public function setStrength(float $strength): User
    {
        $this->strength = $strength;
        return $this;
    }

    /**
     * @return float
     */
    public function getDefence(): float
    {
        return $this->defence;
    }

    /**
     * @param float $defence
     * @return User
     */
    public function setDefence(float $defence): User
    {
        $this->defence = $defence;
        return $this;
    }

    /**
     * @return float
     */
    public function getSpeed(): float
    {
        return $this->speed;
    }

    /**
     * @param float $speed
     * @return User
     */
    public function setSpeed(float $speed): User
    {
        $this->speed = $speed;
        return $this;
    }

    /**
     * @return float
     */
    public function getLuck(): float
    {
        return $this->luck;
    }

    /**
     * @param float $luck
     * @return User
     */
    public function setLuck(float $luck): User
    {
        $this->luck = $luck;
        return $this;
    }

    /**
     * @return null|float
     */
    public function getDamage(): ?float
    {
        return $this->damage;
    }

    /**
     * @param null|float $damage
     * @return User
     */
    public function setDamage(?float $damage): User
    {
        $this->damage = $damage;
        return $this;
    }

    /**
     * @return bool
     */
    public function isAttacker(): bool
    {
        return $this->attacker;
    }

    /**
     * @param bool $attacker
     */
    public function setAttacker(bool $attacker)
    {
        $this->attacker = $attacker;
        return $this;
    }

}