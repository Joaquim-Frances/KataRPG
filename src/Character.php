<?php

namespace App;

class Character
{
    
    private int $health;
    private int $level;
    private bool $alive;
    private string $type;
    

    function __construct($type)
    {
        $this->health = 1000;
        $this->level = 1;
        $this->alive = true;
        $this->type = $type;
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

    public function attacks($target, $damage, $targetLevel, $distance){
        if($this->type == 'melee' && $distance <= 2){
            $porcentageDaño = $this->compareLevels($targetLevel);
            if($target !== $this){
                $target->health -= $damage * $porcentageDaño;
                if($target->health < 1){
                    $target->health = 0;
                    $target->alive = false;
                }
            }

        }
        if($this->type == 'ranged' && $distance <= 20){
            $porcentageDaño = $this->compareLevels($targetLevel);
            if($target !== $this){
                $target->health -= $damage * $porcentageDaño;
                if($target->health < 1){
                    $target->health = 0;
                    $target->alive = false;
                }
            }

        }
    }
    public function compareLevels($targetLevel){
        $difLevel = $this->level - $targetLevel;
        $difLevel = abs($difLevel);
        if($targetLevel > $this->level && $difLevel>=5){
            return 0.5;
        }
        if($targetLevel < $this->level && $difLevel>=5){
            return 2;
        }
        return 1;   
    }
    
    public function heal($target, $healing){
        if($target->alive !==true){
            return;
        }
        if($target == $this){
            $target->health += $healing;
            if($target->health > 1000){
                $target->health = 1000;
            }
        }
    }
} 
        
    


    

        

        
        
    