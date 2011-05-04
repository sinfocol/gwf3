<?php
final class Item_WoodNunchaku extends SR_NinjaWeapon
{
	public function getAttackTime() { return 30; }
	public function getItemLevel() { return 4; }
	public function getItemWeight() { return 650; }
	public function getItemPrice() { return 400; }
	public function getItemDescription() { return 'A wooden nunchaku. Ninjas like this kind of weapon.'; }
	public function getItemModifiersA(SR_Player $player)
	{
		return array(
			'attack' => 5.8,
			'min_dmg' => 2.5,
			'max_dmg' => 7.2,
		);
	}
}
?>