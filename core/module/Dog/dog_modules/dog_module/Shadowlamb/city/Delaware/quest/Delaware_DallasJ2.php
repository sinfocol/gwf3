<?php
final class Quest_Delaware_DallasJ2 extends SR_Quest
{
// 	public function getQuestName() { return 'Goblins'; }
// 	public function getQuestDescription() { return sprintf('Kill %d / %d Delaware goblins and return to Mr.Johnson in the Delaware_Dallas.', $this->getAmount(), $this->getNeededAmount()); }
	public function getQuestDescription() { return $this->lang('descr', array($this->getAmount(), $this->getNeededAmount())); }
	public function getRewardXP() { return 3; }
	public function getRewardNuyen() { return 1500; }
	public function getNeededAmount() { return 10; }
	
	public function checkQuest(SR_NPC $npc, SR_Player $player)
	{
		$have = $this->getAmount();
		$need = $this->getNeededAmount();
		if ($have >= $need)
		{
			$npc->reply($this->lang('thx'));
// 			$npc->reply('Well done chummer. Take your reward.');
			return $this->onSolve($player);
		}
		else
		{
			return $npc->reply($this->lang('more', array($need-$have)));
// 			return $npc->reply(sprintf('Please kill %d more Goblins.', $need-$have));
		}
	}
	
	public function onNPCQuestTalkB(SR_TalkingNPC $npc, SR_Player $player, $word, array $args=NULL)
	{
		$need = $this->getNeededAmount();
		switch ($word)
		{
			case 'shadowrun':
				$npc->reply($this->lang('sr1'));
// 				$npc->reply("Hey chummer... Currently I have no client, but you could kill some Goblins. They are disturbing my business.");
				$npc->reply($this->lang('sr2', array($this->getNeededAmount(), $this->displayRewardNuyen())));
// 				$npc->reply(sprintf("Kill %d of them and I will pay you %s.", $this->getNeededAmount(), $this->displayRewardNuyen()));
				break;
			case 'confirm':
				$npc->reply($this->lang('confirm'));
// 				$npc->reply("Take this job or be unemployed. You have a choice, at least.");
				break;
			case 'yes':
				$npc->reply($this->lang('yes'));
// 				$npc->reply('Yeah!');
				break;
			case 'no':
				$npc->reply($this->lang('no'));
// 				$npc->reply('Ok.');
				break;
		}
		return true;
	}

	public function onKill(SR_Player $player)
	{
		$this->increase('sr4qu_amount', 1);
		$player->message($this->lang('kill', array($this->getAmount(), $this->getNeededAmount())));
// 		$player->message(sprintf('Now you killed %d of %d goblins for Mr.Johnson.', $this->getAmount(), $this->getNeededAmount()));
	}
}
?>
