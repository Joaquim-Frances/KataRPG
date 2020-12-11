<?php

namespace App;

class Character
{
   private int $health = 1000;
   private int $level = 1;
   private bool $isAlive = true;

   public function getHealth() : int
    { 
       return $this->health;
    }
    public function setHealth($newHealth) : void
    {
        $this->health = $newHealth;
    }
    
    public function getLevel() : int
    { 
       return $this->level;
    }
    
    public function getIsAlive() : bool
    { 
       return $this->isAlive;
    }

    public function attack($target, $damage) : void
    {
        $targetHealth = $target->health - $damage;
        $target->setHealth($targetHealth);
    }



} 