<?php
final class Shadowcmd_idle extends Shadowcmd
{
	public static function isCombatCommand() { return true; }
	
	public static function execute(SR_Player $player, array $args)
	{
		return true;
	}
}
?>
