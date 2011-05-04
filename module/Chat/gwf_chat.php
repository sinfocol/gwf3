<?php
chdir('../../');

apache_setenv('no-gzip', 1);
ini_set('zlib.output_compression', 0);
//ini_set('implicit_flush', 1);
#ob_implicit_flush();

require_once 'inc/_gwf_include.php';

# Get the modules.
$modules = GWF_Module::loadModulesDB();

# Start session
if (false === gwf_session_start(false)) {
	die('Session error. GWF not installed?');
}

# Init core templates and stuff
GWF_Language::init();
GWF_HTML::initCronjob();

# Yay, a http stream \o/
GWF_Javascript::streamHeader();

# Call Chat::AjaxStream
if (false === ($module = GWF_Module::getModule('Chat'))) {
	die('MISSING MODULE');
}
$module->onLoadLanguage();
$module->onInclude();
$module->requestMethodB('AjaxStream');
?>
