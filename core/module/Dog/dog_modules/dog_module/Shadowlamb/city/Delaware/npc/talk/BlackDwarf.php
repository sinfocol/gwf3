<?php
final class Delaware_BlackDwarf extends SR_TalkingNPC
{
	public function getName() { return 'Brujios'; }
	
	public function getNPCQuests(SR_Player $player) { return array('Delaware_BS1', 'Delaware_BS2', 'Delaware_BS3'); }
	
	public function onNPCTalk(SR_Player $player, $word, array $args)
	{
		if ($this->onNPCQuestTalk($player, $word, $args))
		{
			return true;
		}
		
		switch ($word)
		{
			case 'rune': case 'runes':
				return $this->rply('runes');
// 				return $this->reply("Yes yes, I also sell some nice runes here.");
				
			case 'runecraft': case 'runecrafting': case 'craft': case 'crafting':
				return $this->rply('craft');
// 				return $this->reply("Yes yes, you can make your equipment better with \X02runes\X02.");
				
			case 'hello':
				return $this->rply('hello');
// 				return $this->reply("Hello hello ... Come in and buy a sword or \X02runecraft\X02 your equipment.");
				
			default:
				return $this->rply('default', array($word));
// 				return $this->reply("I don't know anything about $word.");
		}
	}
}
?>
