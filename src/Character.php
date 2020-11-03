<?php

namespace App;

class Character
{
    
    private int $health;
    private int $level;
    private bool $alive;

    function __construct()
    {
        $this->health = 1000;
        $this->level = 1;
        $this->alive = true;
    }

    public function getHealth(): int
    {
        return $this->health;
    }

    public function setHealth(int $health): void
    {
        $this->health = $health;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function isAlive(): bool
    {
        return $this->alive;
    }
    public function attacks($target, $damage){
        if($target !== $this){
            $target->health -= $damage;
            if($target->health < 1){
                $target->health = 0;
                $target->alive = false;
            }
        }
    }


    
    public function heal($target, $healing){
        if($target->alive !==true){
            return;
        }
        $target->health += $healing;
        
        if($target->health > 1000){
            $target->health = 1000;
        }
    }

        
        
} 
    