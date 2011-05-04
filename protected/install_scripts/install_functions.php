<?php
############
### Core ###
############
function install_get_core_tables()
{
	$classnames = array();
	foreach (scandir('inc/util') as $file)
	{
		if (preg_match('/^GWF_([a-z0-9_]+)\\.php$/i', $file, $matches))
		{
			$classname = $matches[1];
			if (false === ($content = file_get_contents("inc/util/{$file}"))) {
				continue;
			}
			if ( (strpos($content, ' extends GDO') !== false) && (strpos($content, 'abstract class') === false) )
			{
				$classnames[] = 'GWF_'.$classname;
			}
		}
	}
	return $classnames;
//	return array('GWF_Country','GWF_Group','GWF_IP2Country','GWF_LangMap','GWF_Language','GWF_Module','GWF_ModuleVar','GWF_PublicKey','GWF_Session','GWF_Settings','GWF_User','GWF_UserGroup');
}

function install_core($drop=false)
{
	$db = gdo_db();
	$tables = install_get_core_tables();
	$success = true;
	foreach ($tables as $classname)
	{
		printf("Installing %s table ... ", $classname);
		if (false === ($result = GDO::table($classname)->createTable($drop))) {
			#error
			echo "FAILED!<br/>\n";
			$success = false;
		}
		else {
			#success
			echo "OK<br/>\n";
		}
	}
	
	/** Try to set a birthdate **/
	if (false === GWF_Settings::getSetting('gwf_site_birthday', false)) {
		GWF_Settings::setSetting('gwf_site_birthday', date('Ymd'));
	}
	
	return $success;
}

###############
### Modules ###
###############
function install_all_modules($dropTables=false)
{
	if (false === ($modules = GWF_ModuleLoader::loadModulesFS())) {
		return GWF_HTML::err('ERR_GENERAL', array(__FILE__, __LINE__));
	}
	
	return install_modules($modules, $dropTables);
}

function install_modules(array $modules, $dropTables=false)
{
	$back = '';
	$modules = GWF_ModuleLoader::sortModules($modules, 'module_priority', 'ASC');
	foreach ($modules as $module)
	{
		$back .= GWF_ModuleLoader::installModule($module, $dropTables);
	}
	$back .= GWF_ModuleLoader::installHTAccess($modules);
	return $back;
}

##############
### Groups ###
##############
function install_default_groups()
{
	if (false === install_default_group(GWF_Group::ADMIN)) {
		echo GWF_HTML::err('ERR_DATABASE', array(__FILE__, __LINE__));
		return false;
	}
	if (false === install_default_group(GWF_Group::STAFF)) {
		echo GWF_HTML::err('ERR_DATABASE', array(__FILE__, __LINE__));
		return false;
	}
	return true;
}
function install_default_group($name)
{
	if (false !== GWF_Group::getByName($name)) {
		return true;
	}
	$group = new GWF_Group(array(
		'group_name' => $name,
		'group_date' => GWF_Time::getDate(GWF_Date::LEN_SECOND),
	));
	return $group->insert();
}
#############
### Users ###
#############

function install_default_users()
{
	if (false === install_default_groups()) {
		return false;
	}
	install_createAdmin('Admin', '11111111', sprintf('admin@%s', GWF_DOMAIN), $out);
}

function install_createAdmin($username, $password, $email, &$output)
{
	if (false === ($user = GWF_User::getByName($username)))
	{
		$user = new GWF_User(array(
			'user_name' => $username,
			'user_email' => $email,
			'user_password' => GWF_Password::hashPasswordS($password),
			'user_regdate' => GWF_Time::getDate(GWF_Date::LEN_SECOND),
			'user_regip' => GWF_IP6::getIP(GWF_IP_EXACT),
			'user_lastactivity' => time(),
		));
		if (false === $user->insert()) {
			return false;
		}
	}
	$userid = $user->getID();
	if (false === GWF_UserGroup::addToGroup($userid, GWF_Group::getByName(GWF_Group::ADMIN)->getID())) {
		return false;
	}
	if (false === GWF_UserGroup::addToGroup($userid, GWF_Group::getByName(GWF_Group::STAFF)->getID())) {
		return false;
	}
	
	$output .= GWF_HTML::message('Install Wizard', sprintf('Added new admin user: %s - Password: %s', $username, $password));
	
	return true;
}


############################################
### Language / Country / IPMap / LangMap ###
############################################
/**
 * Takes ages.
 * @return boolean
 */
function install_createLanguage($__langs=true, $__cunts=true, $__ipmap=false)
{
	$success = true;
	require_once 'protected/install_data/install_language.php';
	set_time_limit(0); # This function takes ages!

	$cache = array();
	$cache2 = array();

	# Language
	$i = 1;
	$linguas = install_get_languages();
	echo 'Installing '.count($linguas).' Languages';
	flush();
	
	$lang_t = new GWF_Language();
	$supported = explode(';', GWF_SUPPORTED_LANGS);
	
	foreach ($linguas as $lang)
	{
		echo '.';
		flush();

		array_map('trim', $lang);
		
		list($name, $native, $short, $iso) = $lang;

		if (false !== ($langrow = $lang_t->selectFirst('lang_id', "lang_short='$short'"))) { #GWF_Language::getByShort($short))) {
			$cache[$short] = $langrow['lang_id']; #->getID();
			continue;
		}
		
		if ($__langs)
		{
			if (false === $lang_t->insertAssoc(array(
				'lang_id' => $i,
				'lang_name' => $name,
				'lang_nativename' => $native,
				'lang_short' => $short,
				'lang_iso' => $iso,
				'lang_options' => in_array($iso, $supported, true) ? GWF_Language::SUPPORTED : 0,
			))) {
				echo GWF_HTML::err('ERR_DATABASE', array(__FILE__, __LINE__));
				$success = false;
				continue;
			}
		}
		$i++;
		
		$cache[$short] = $i; #langrow['lang_id'];
	}
	
	echo PHP_EOL;

	# Country and Langmap
	$countries = install_get_countries();
	$country_t = new GWF_Country();
	echo 'Installing '.count($countries).' Countries';
	flush();
	
	foreach ($countries as $cid => $c)
	{
		echo '.';
		flush();
		
		if (count($c) !== 5) {
			echo GWF_HTML::error('Country error', sprintf('%s has error.', $c[0]));
		}
		
		array_map('trim', $c);
		list($name, $langs, $region, $tld, $pop) = $c;
		$tld = strtolower($tld);

		if ($__cunts)
		{
			if (false === $country_t->insertAssoc(array(
				'country_id' => $cid,
				'country_name' => $name,
				'country_tld' => $tld,
				'country_pop' => $pop,
			))) {
				echo GWF_HTML::err('ERR_DATABASE', array(__FILE__, __LINE__));
				$success = false;
				continue;
			}
		}

		$cache2[$tld] = $cid;

		$langmap_t = new GWF_LangMap();
		if ($__cunts)
		{
			$langs = explode(':', $langs);
			foreach ($langs as $langshort)
			{
				if (!isset($cache[$langshort])) {
					echo GWF_HTML::error('', 'Unknown iso-3: '.$langshort.' in country '.$name);
					$success = false;
	#				echo GWF_HTML::err('ERR_DATABASE', array( __FILE__, __LINE__));
					continue;
				}
				$langid = $cache[$langshort];
				if (false === ($langmap_t->insertAssoc(array(
					'langmap_cid' => $cid,
					'langmap_lid' => $langid,
				)))) {
					echo GWF_HTML::err('ERR_DATABASE', array( array(__FILE__, __LINE__)));
					$success = false;
					continue;
				}
			}
		}
	}
	echo PHP_EOL;
	
	if (!$__ipmap) {
		return $success;
	}

	echo 'Installing ip2country'.PHP_EOL;
	
	# IP2Country
	$max = 89323;
	$now = 0;
	$filename = "protected/install_data/ip-to-country.csv";

	if (false === ($fp = fopen($filename, "r"))) {
		echo GWF_HTML::err0('ERR_FILE_NOT_FOUND', array($filename));
		return false;
	}
	
	$ip2c = new GWF_IP2Country();

	while (false !== ($line = fgetcsv($fp, 2048)))
	{
		if (count($line) !== 5) {
			echo GWF_HTML::error('', $filename.' is corrupt!');
			$success = false;
			break;
		}

		list($ipstart, $ipend, $tld, $ccode2, $cname) = $line;
		$tld = strtolower($tld);
			
		if (!(isset($cache2[$tld]))) {
			echo GWF_HTML::error('', 'Unknown TLD: '.$tld);
			echo GWF_HTML::err('ERR_DATABASE', array(__FILE__, __LINE__));
			$success = false;
			continue;
		}
		
		if (false === $ip2c->insertAssoc(array(
			'ip2c_start' => $ipstart,
			'ip2c_end' => $ipend,
			'ip2c_cid' => $cache2[$tld],
		)))
		{
			echo GWF_HTML::err('ERR_DATABASE', array(__FILE__, __LINE__));
			$success = false;
			continue;
		}
		
		$now++;
		if (!($now % 2500)) {
			$msg = sprintf('%d of %d...', $now, $max);
			echo GWF_HTML::message('Progress', $msg);
			flush();
		}
	}
	return $success;
}

?>