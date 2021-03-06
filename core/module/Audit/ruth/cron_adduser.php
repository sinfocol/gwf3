<?php
function setup_chall($entry, $fullpath, $username)
{
	if ($entry === 'install_user.php')
	{
		$home = '/home/user/'.$username;
		require_once $fullpath;
	}
}

function getUID($username)
{
	$susername = escapeshellarg($username);
	$uid = exec("id '{$susername}'");
	$pusername = preg_quote($username);
	if (1 !== preg_match("/(\\d+)\\({$pusername}\\)/", $uid, $matches))
	{
		return false;
	}
	return (int)$matches[1];
}

$query = "SELECT * FROM war_audit_add_user";
$uidfile = GWF_CORE_PATH.'module/Audit/ruth/lastwcid';
if (false === ($result = $db->queryRead($query)))
{
	die('DB ERROR 1');
}
while (false !== ($row = $db->fetchAssoc($result)))
{
	$username = $row['username'];
	
	if (!preg_match('/^[a-z][a-z0-9_]{0,31}$/iD', $username))
	{
		GWF_Cronjob::error('Username invalid: '.$username);
		continue;
	}
	
	$create = false;
	$crypt_pass = escapeshellarg($row['password']);
	
	if (false === ($uid = getUID($username)))
	{
		$nextuid = trim(file_get_contents($uidfile));
		$nextuid++;
		$uid = $nextuid;
		file_put_contents($uidfile, $uid);
		$create = true;
	}
	
	if ($uid > 3000)
	{
		if ($create)
		{
			system(GWF_PATH.'core/module/Audit/ruth/adduser.sh'." {$uid} {$username} {$crypt_pass}");
		}
		else
		{
			system("/usr/sbin/usermod -p {$crypt_pass} {$username}");
		}
		
		GWF_File::filewalker(GWF_CORE_PATH.'module/Audit/challs', 'setup_chall', true, true, $username);
		
		if ($create)
		{
			$dirname = "/home/user/{$username}/level";
			chmod($dirname, 0705);
			chown($dirname, $username);
			chgrp($dirname, $username);
	
			$dirname = "/home/user/{$username}";
			chmod($dirname, 0700);
			chown($dirname, $username);
			chgrp($dirname, $username);
		}
	}
}

$db->free($result);

$db->truncateTable('war_audit_add_user');
?>