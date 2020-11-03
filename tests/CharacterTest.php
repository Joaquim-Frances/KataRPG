<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Character;



class CharacterTest extends TestCase
{

	public function test_Health_starting_at_1000()
	{

		$sonGoku = new Character();

		$result = $sonGoku->getHealth();

		$this->assertEquals(1000, $result);
	}

	public function test_Level_starting_at_1()
	{

		$sonGoku = new Character();

		$result = $sonGoku->getLevel();

		$this->assertEquals(1, $result);
	}

	public function test_starting_Alive()
	{

		$sonGoku = new Character();

		$result = $sonGoku->isAlive();

		$this->assertEquals(true, $result);
	}

	public function test_damage_is_substracted_from_health()
	{
		//given escenario

		$attacker = new Character();
		$damaged = new Character();

		// action

		$attacker->attacks($damaged, 400);

		//then
		$damagedHealth = $damaged->getHealth();

		$this->assertEquals(600, $damagedHealth);
	}
	public function test_damage_Health_0_character_Dies()
	{
		//given escenario

		$attacker = new Character();
		$damaged = new Character();

		// action

		$attacker->attacks($damaged, 1001);

		//then
		$damagedHealth = $damaged->getHealth();
		$damagedAlive = $damaged->isAlive();

		$this->assertEquals(0, $damagedHealth);
		$this->assertEquals(false, $damagedAlive);
	}
	public function test_characters_can_heal()
	{
		//given escenario

		$attacker = new Character();
		$damaged = new Character();

		// action

		$damaged->attacks($attacker, 500);
		$attacker->heal($attacker, 250);

		//then
		$attackerHealth = $attacker->getHealth();
		

		$this->assertEquals(750, $attackerHealth);
		
	}
	public function test_dead_characters_cannot_heal()
	{
		//given escenario

		$attacker = new Character();
		$damaged = new Character();

		// action

		$attacker->attacks($damaged, 1001);
		$attacker->heal($damaged, 250);

		//then
		$damagedHealth = $damaged->getHealth();
		

		$this->assertEquals(0, $damagedHealth);
		
	}
	public function test_health_cannot_rise_l000()
	{
		//given escenario

		$attacker = new Character();
		$damaged = new Character();

		// action

		$damaged->attacks($attacker, 250);
		$attacker->heal($attacker, 500);

		//then
		$damagedHealth = $damaged->getHealth();
		

		$this->assertEquals(1000, $damagedHealth);
		
	}
	public function test_character_cannot_attack_himself()
	{
		//given escenario

		$attacker = new Character();
		

		// action

		$attacker->attacks($attacker, 350);
		

		//then
		$attackerHealth = $attacker->getHealth();
		

		$this->assertEquals(1000, $attackerHealth);
		
	}
	public function test_character_only_heals_himself()
	{
		//given escenario

		$attacker = new Character();
		$damaged = new Character();
		

		// action

		$damaged->attacks($attacker, 350);
		$attacker->heal($attacker, 350);
		

		//then
		$attackerHealth = $attacker->getHealth();
		
		

		$this->assertEquals(1000, $attackerHealth);
		
		
	}
}	