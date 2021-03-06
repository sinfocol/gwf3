<?php
final class Seattle_Temple extends SR_School
{
	public function getNPCS(SR_Player $player) { return array('talk' => 'Seattle_Shamane'); }
	public function getFoundPercentage() { return 60.00; }
	
// 	public function getFoundText(SR_Player $player) { return 'You see a big white building that looks like a temple. You wonder if its allowed to go in there.'; }
// 	public function getEnterText(SR_Player $player) { return 'You enter the Temple. You see a shamane in a gray robe approaching.'; }
// 	public function getHelpText(SR_Player $player) { $c = Shadowrun4::SR_SHORTCUT; return "You can use {$c}learn or {$c}courses here to see the skill(s) to learn. You can also {$c}talk to the shamane."; }
	
	public function getFoundText(SR_Player $player) { return $this->lang($player, 'found'); }
	public function getEnterText(SR_Player $player) { return $this->lang($player, 'enter'); }
	public function getHelpText(SR_Player $player) { return $this->lang($player, 'help'); }
	
	public function getFields(SR_Player $player)
	{
		$p = $player->getTemp(Seattle_Shamane::TEMP_PISSED, 0) * 250;
		return array(
			array('magic', 1500+$p),
			array('casting', 2500+$p),
			array('berzerk', 4500+$p),
			array('icedorn', 3000+$p),
			array('heal', 3500+$p),
			array('flu', 1000+$p),
			array('poison_dart', 3000+$p),
			array('fireball', 5500+$p),
			array('blow', 2500+$p),
		);
	}
	
	public function onEnter(SR_Player $player)
	{
// 		$c = Shadowrun4::SR_SHORTCUT;
// 		$b = chr(2);
		parent::onEnter($player);
		$this->partyMessage($player, 'hi');
		return true;
		
// 		$p = $player->getParty();
// 		$p->notice("The shamane says: \"Hi, do you want to {$b}{$c}learn{$b} the arcane powers of {$b}magic{$b}?\"");
	}
}
?>