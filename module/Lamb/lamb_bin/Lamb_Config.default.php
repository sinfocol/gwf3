<?php
global $LAMB_CONFIG;
$LAMB_CFG = array
(
	# Version
	'version' => '3.01.2011.04.17.06.25 - GWF '.GWF_CORE_VERSION,

	# IRC
	'hostname' => 'lamb.gizmore.org',
	'realname' => 'Lamb: IRC BOT',
	'username' => 'Lamb',

	# Modules
	'modules' => 'Shadowlamb;Link;News;Quote;Scum;Slapwarz;Notes;IRCLink;Warfare2',

	# Various
	'trigger' => '.',
	'owner' => 'gizmore',
	'blocking_io' => false,
	'ping_timeout' => 420,
	'connect_timeout' => 15,
	'sleep_millis' => 50,
	'timer_interval' => 30.0,
	'send_command_issuer_nickname_on_reply' => true, # thx space

	###############
	### Servers ###
	###############
	'servers' => array
	(
		array(
			'host' => 'localhost:6667',
			'nickname' => 'Lamb3',
			'password' => '',
			'channels' => '#lamb',
			'admins' => 'root',
		),
	),
);
?>