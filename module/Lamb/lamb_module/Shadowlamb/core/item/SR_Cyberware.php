<?php
abstract class SR_Cyberware extends SR_Item
{
	public function getItemWeight() { return 0; }
	public function isItemStackable() { return false; }
	public function getConflicts() { return array(); }

	public function conflictsWith(SR_Player $player)
	{
		$back = '';
		foreach ($this->getConflicts() as $c)
		{
			foreach ($player->getCyberware() as $item)
			{
				if ($item->getName() === $c)
				{
					$back .= ', '.$c;
				}
			}
		}
		return $back === '' ? false : substr($back, 2);
	}
	
	public function checkEssence(SR_Player $player)
	{
		$m = $this->getItemModifiersA($player);
		$need = -$m['essence'];
		$have = $player->get('essence');
		if ($need > $have)
		{
			return sprintf('You don`t have enough essence(%s) to implant %s, which needs %s essence.', $have, $this->getItemName(), $need);
		}
		else
		{
			return false;
		}
	}
}
?>