<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Character;



class CharacterTest extends TestCase
{

	public function test_Health_starting_at_1000()
	{
		$character = new Character;
		$healthCharacter = $character->getHealth();
		$levelCharacter = $character->getLevel();
		$AliveStatus = $character->getIsAlive();

		$this->assertEquals($healthCharacter, 1000);
		$this->assertEquals($levelCharacter, 1);
		$this->assertEquals($AliveStatus, true);
	}

	public function test_Character_Can_Damage_Other_Characters(){

	//given
		$attacker = new Character;
		$enemy = new Character;
	//when
		$attacker->attack($enemy, 100);
		$targetHealth = $enemy->getHealth();
	//then
		$this->assertEquals($targetHealth, 900);
	}

		
}	