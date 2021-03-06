<?php
require_once 'teleportii.php';
class Spell_teleportiii extends Spell_teleportii
{
	public function getSpellLevel() { return 4; }
	
	const MANA_MIN = 20;
	const MANA_PER_M = 14;
	
	public function isOffensive() { return false; }
	public function getHelp() { return 'Teleport your party to a known place in a known city.'; }
	public function getCastTime($level) { return 60; }
	public function getRequirements() { return array('teleportii'=>2); }
	public function getManaCost(SR_Player $player, $level)
	{
		$p = $player->getParty();
		return self::MANA_MIN + self::MANA_PER_M * $p->getMemberCount();
	}
	public function cast(SR_Player $player, SR_Player $target, $level, $hits, SR_Player $potion_player) {}
	
	public function onCast(SR_Player $player, array $args, $wanted_level=true)
	{
		if ($this->isBrewMode())
		{
			return $this->onBrew($player, 70, 4, 10);
		}
		
		$p = $player->getParty();
		
		if (!$p->isIdle())
		{
			$player->msg('1033');
// 			$player->message('This spell only works when your party is idle.');
			return false;
		}
		
		if (count($args) === 0)
		{
			$player->msg('1072');
// 			$player->message('Please specify a target to teleport to.');
			return false;
		}

		$bot = Shadowrap::instance($player);
		
		if (false === ($tlc = Shadowcmd_goto::getTLCByArgMulticity($player, $args[0])))
		{
			$player->msg('1069');
// 			$player->message('The location does not exist or is ambigous.');
			return false;
		}
		
		$city = Common::substrUntil($tlc, '_');
		if (false === ($cityclass = Shadowrun4::getCity($city)))
		{
			$player->msg('1073');
// 			$bot->reply('This city is unknown.');
			return false;
		}
		
		if ($cityclass->isDungeon())
		{
			$player->msg('1079');
// 			$bot->reply('You can not teleport into dungeons.');
			return false;
		}
		
		if (false === ($target = $cityclass->getLocation($tlc)))
		{
			$player->msg('1070', array($p->getCity()));
// 			$bot->reply(sprintf('The location %s does not exist in %s.', $tlc, $city));
			return false;
		}
		
		$tlc = $target->getName();
		if (!$player->hasKnowledge('places', $tlc))
		{
			$player->msg('1023');
// 			$bot->reply(sprintf('You don`t know where the %s is.', $tlc));
			return false;
		}
		
		if ($p->getLocation() === $tlc)
		{
			$player->msg('1071', array($tlc));
// 			$bot->reply(sprintf('You are already at the %s.', $tlc));
			return false;
		}
		
		# Imprisoned
		if (false !== ($loc = $p->getLocationClass('inside')))
		{
			if (!$loc->isExitAllowed($player))
			{
				$player->msg('1074');
// 				$bot->reply('You cannot cast teleport inside this lcoation.');
				return false;
			}
		}
		
		# Minlevels (thx sabretooth)
		if (false === $this->checkCityTargetLimits($player, $target))
		{
			return false;
		}
		
		$level = $this->getLevel($this->getCaster());
		
		$mc = $p->getMemberCount();
		$need_level = $mc / 2;
		if ($level < $need_level)
		{
			$player->msg('1076', array($this->getName(), $need_level, $mc));
			return false;
// 			$bot->reply(sprintf('You need at least %s level %s to teleport %s party members.', $this->getName(), $need_level, $mc));
// 			return false;
		}
		
		$need = $this->getManaCost($player, $need_level);
		$have = $player->getMP();
		if ($need > $have)
		{
			$player->msg('1055', array($need, $this->getName(), $need_level, $have));
// 			$player->message(sprintf('You need %s MP to cast %s, but you only have %s.', $need, $this->getName(), $have));
			return false;
		}

		if (true === $this->isCastMode())
		{
			$player->healMP(-$need);
		}
		$p->ntice('5133', array($player->getName(), $need, $this->getName(), $tlc));
// 		$p->notice(sprintf('%s used %s MP to cast %s and your party is now outside of %s.', $player->getName(), $need, $this->getName(), $tlc));
		$p->pushAction('outside', $tlc);
		return true;
	}
	
}
?>