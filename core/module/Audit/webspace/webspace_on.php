<?php
$username = $argv[1];

$content = <<< EOF
<VirtualHost *:80>
	ServerName %USERNAME%.users.warchall.net
	ServerAlias *.%USERNAME%.users.warchall.net
	DocumentRoot /home/user/%USERNAME%/www
	AssignUserId %USERNAME% %USERNAME%
	<Directory "/home/user/%USERNAME%/www">
		Options FollowSymLinks Indexes
		AllowOverride All
		Order allow,deny
		Allow from all
	</Directory>
</VirtualHost>
EOF;

$dir = "/home/user/$username/www";

if (is_link($dir))
{
	die('Symlink attack anyone?');
}

if (is_file($dir))
{
	die('It´s a trap...err a file!');
}

if (!is_dir($dir))
{
	if (!mkdir($dir))
	{
		die('mkdir failed!');
	}
}


if (!chmod($dir, 0700))
{
	die('chmod failed!');
}
if (!chgrp($dir, $username))
{
	die('chgrp failed!');
}
if (!chown($dir, $username))
{
	die('chown failed!');
}

$content = str_replace('%USERNAME%', $username, $content);

if (!file_put_contents("/etc/apache2/vhosts.d/users/$username.conf", $content))
{
	die('cannot write .conf file!');
}

echo "Reloading apache2 config...\n";
system("/etc/init.d/apache2 reload");
echo "Webserver should be available at $username.users.warchall.net!\n";
echo "It can take a moment for the changes to take effect :)\n";