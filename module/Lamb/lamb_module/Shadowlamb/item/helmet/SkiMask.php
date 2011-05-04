<?php
final class Item_SkiMask extends SR_Helmet
{
	public function getItemLevel() { return 5; }
	public function getItemPrice() { return 250; }
	public function getItemWeight() { return 150; }
	public function getItemDescription() { return 'A ski mask... for cold days :)'; }
	public function getItemModifiersA(SR_Player $player)
	{
		return array(
			'defense' => 0.3,
			'marm' => 1.2,
			'farm' => 0.4,
		);
	}
	
}
?>