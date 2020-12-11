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
        $target->health = $targetHealth;
        
        if ($target->health <= 0){
            $target->isAlive = false;
            $target->health = 0;
        }
    }



} 