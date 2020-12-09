<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Character;



class CharacterTest extends TestCase
{

	public function test_Health_starting_at_1000()
	{

		$sonGoku = new Character('melee');

		$result = $sonGoku->getHealth();

		$this->assertEquals(1000, $result);
	}

	public function test_Level_starting_at_1()
	{

		$sonGoku = new Character('melee');

		$result = $sonGoku->getLevel();

		$this->assertEquals(1, $result);
	}

	public function test_starting_Alive()
	{

		$sonGoku = new Character('melee');

		$result = $sonGoku->isAlive();

		$this->assertEquals(true, $result);
	}

	public function test_damage_is_substracted_from_health()
	{
		//given escenario

		$attacker = new Character('melee');
		$damaged = new Character('melee');

		// action

		$attacker->attacks($damaged, 400, 1, 1);

		//then
		$damagedHealth = $damaged->getHealth();

		$this->assertEquals(600, $damagedHealth);
	}
	public function test_damage_Health_0_character_Dies()
	{
		//given escenario

		$attacker = new Character('melee');
		$damaged = new Character('melee');

		// action

		$attacker->attacks($damaged, 1001, 1, 1);

		//then
		$damagedHealth = $damaged->getHealth();
		$damagedAlive = $damaged->isAlive();

		$this->assertEquals(0, $damagedHealth);
		$this->assertEquals(false, $damagedAlive);
	}
	public function test_characters_can_heal()
	{
		//given escenario

		$attacker = new Character('melee');
		$damaged = new Character('melee');

		// action

		$damaged->attacks($attacker, 500, 1, 1);
		$attacker->heal($attacker, 250);

		//then
		$attackerHealth = $attacker->getHealth();
		

		$this->assertEquals(750, $attackerHealth);
		
	}
	public function test_dead_characters_cannot_heal()
	{
		//given escenario

		$attacker = new Character('melee');
		$damaged = new Character('melee');

		// action

		$attacker->attacks($damaged, 1001, 1, 1);
		$attacker->heal($damaged, 250);

		//then
		$damagedHealth = $damaged->getHealth();
		

		$this->assertEquals(0, $damagedHealth);
		
	}
	public function test_health_cannot_rise_l000()
	{
		//given escenario

		$attacker = new Character('melee');
		$damaged = new Character('melee');

		// action

		$damaged->attacks($attacker, 250, 1, 1);
		$attacker->heal($attacker, 500);

		//then
		$damagedHealth = $damaged->getHealth();
		

		$this->assertEquals(1000, $damagedHealth);
		
	}
	public function test_character_cannot_attack_himself()
	{
		//given escenario

		$attacker = new Character('melee');
		

		// action

		$attacker->attacks($attacker, 350, 1, 1);
		

		//then
		$attackerHealth = $attacker->getHealth();
		

		$this->assertEquals(1000, $attackerHealth);
		
	}
	public function test_character_only_heals_himself()
	{
		//given escenario
		$attacker = new Character('melee');
		$damaged = new Character('melee');
		// action
		$damaged->attacks($attacker, 350, 1, 1);
		$attacker->heal($attacker, 350);
		//then
		$attackerHealth = $attacker->getHealth();
		$this->assertEquals(1000, $attackerHealth);
	}
	public function test_target_5_levels_above_damage_by_half()
	{
		//given escenario
		$attacker = new Character('melee');
		$target = new Character('melee');
		// action
		
		$attacker->attacks($target, 200, 6, 1);
		
		
		//then
		$targetHealth = $target->getHealth();
		$this->assertEquals(900, $targetHealth);
	}
	public function test_target_5_levels_below_by_half()
	{
		//given
		$attacker = new Character('melee');
		$target = new Character('melee');
		
		// when
		$attacker->attacks($target, 200, -4, 1);
		
		
		//then
		$targetHealth = $target->getHealth();
		$this->assertEquals(600, $targetHealth);
	}	
	
	public function test_melee_characters_attacks_in_2_meters_max()
	{
		//given
		$attacker = new Character('melee');//type
		$target = new Character('melee');
		
		// when
		$attacker->attacks($target, 200, 0, 2);
		
		
		//then
		$targetHealth = $target->getHealth();
		$this->assertEquals(800, $targetHealth);
	}	
	public function test_ranged_characters_attacks_in_20_meters_max()
	{
		//given
		$attacker = new Character('ranged');//type
		$target = new Character('ranged');
		
		// when
		$attacker->attacks($target, 200, 0, 15);
		
		
		//then
		$targetHealth = $target->getHealth();
		$this->assertEquals(800, $targetHealth);
	}	

		

		
		

		
		
}	