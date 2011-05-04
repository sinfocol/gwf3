<?php
final class Item_EE_Ring extends SR_Ring
{
	public function getItemLevel() { return 20; }
	public function getItemPrice() { return 4000; }
	public function getItemDropChance() { return 30.00; }
	public function getItemDescription() { return 'A ring made by the indian natives.'; }

	public function getItemModifiersA(SR_Player $player)
	{
		$back = array();
		switch($player->getRace())
		{
			default: $back['attack'] = 0.5;
			default: $back['wisdom'] = 0.5;
			default: $back['intelligence'] = 0.5;
		}
		return $back;
	}

	public function getItemModifiersB()
	{
		$mods = parent::getItemModifiersB();
		foreach ($mods as $k => $v)
		{
			$mods[$k] = floor($mods[$k]*2);
		}
		return $mods;
	}
}
?>