<?php
final class Hideout_Bathroom extends SR_Location
{
	public function getFoundPercentage() { return 100; }
	public function getFoundText() { return 'You locate the bathroom.'; }
	public function getEnterText(SR_Player $player) { return 'You enter the bathroom and suprise a punk taking a crap.'; }
	public function onEnter(SR_Player $player)
	{
		parent::onEnter($player);
		$party = $player->getParty();
		SR_NPC::createEnemyParty('Redmond_Cyberpunk')->fight($party, true);
	}
}
?>