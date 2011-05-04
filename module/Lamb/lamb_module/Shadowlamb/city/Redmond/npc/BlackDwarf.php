<?php
final class Redmond_BlackDwarf extends SR_TalkingNPC
{
	const TEMP_WORD = 'Redmond_BlackDwarf_sr';
	public function getName() { return 'Galdor'; }
	public function onNPCTalk(SR_Player $player, $word)
	{
		$b = chr(2);
		$quest = SR_Quest::getQuest($player, 'Redmond_Blacksmith');
		$has = $quest->isInQuest($player);
		$done = $quest->isDone($player);
		
		switch ($word)
		{
			case 'yes':
				if ($player->hasTemp(self::TEMP_WORD)) {
					$this->reply('Thank you chummer, i really need it and can`t leave.');
					$player->unsetTemp(self::TEMP_WORD);
					$quest->accept($player);
				} else {
					$this->reply('Yes chummer!');
				}
				break;
				
			case 'no':
				if ($player->hasTemp(self::TEMP_WORD)) {
					$this->reply('Ok, if you don`t have time i have to look for another chummer');
					$player->unsetTemp(self::TEMP_WORD);
				} else {
					$this->reply('No what?');
				}
				break;
				
			case 'runecrafting': case 'rune': case 'runes':
			case 'smithing': case 'smith':
				if ($has) {
					$quest->checkQuest($this, $player);
				}
				elseif ($player->hasTemp(self::TEMP_WORD)) {
					$this->reply('Can you?');
				}
				elseif ($done) {
					$this->reply('Thanks to you, i can smith and runecraft items again :)');
				}
				elseif ($has) {
					$this->reply('I still have no SmithHammer. No hammer, No business. :/');
				}
				else {
					$this->reply('Yeah, i am the best smith in town, but somebody stole my SmithHammer. The bad thing is i can`t leave to buy one, as i wait for a special delivery of runes.');
					$this->reply('Can you bring me one, so i can continue with my business?');
					$player->setTemp(self::TEMP_WORD, true);
				}
				break;
				
			case 'hello':
				if ($has) {
					$quest->checkQuest($this, $player);
				}
				else {
					$this->reply("Hello. I am Galdor and i master the art of {$b}smithing{$b} and {$b}runecrafting{$b}.");
				}
				break;
				
			default:
				$this->reply("I don`t know anything about $word.");
				break;
		}
	}
}
?>
