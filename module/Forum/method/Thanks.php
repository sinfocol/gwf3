<?php

final class Forum_Thanks extends GWF_Method
{
	public function isLoginRequired() { return true; }
	
	public function getHTAccess(GWF_Module $module)
	{
		return 'RewriteRule ^forum/thanks/for/post/([0-9]+)/[^/]+$ index.php?mo=Forum&me=Thanks&pid=$1'.PHP_EOL;
	}
	
	public function execute(GWF_Module $module)
	{
		return $this->onThanks($module);
	}
	
	private function onThanks(Module_Forum $module)
	{
		if (false === ($post = $module->getCurrentPost())) {
			return $module->error('err_post');
		}
		
		if (false === $module->cfgThanksEnabled()) {
			return $module->error('err_thanks_off');
		}
		
		if (false === ($user = GWF_Session::getUser())) {
			return GWF_HTML::err('ERR_GENERAL', __FILE__, __LINE__);
		}
		
		if ($post->hasThanked($user)) {
			return $module->error('err_thank_twice');
		}
		
		if ($post->getUserID() === $user->getID()) {
			return $module->error('err_thank_self');
		}

		if (false === $post->onThanks($module, $user)) {
			return GWF_HTML::err('ERR_DATABASE', __FILE__, __LINE__);
		}
		
		if ($module->isAjax()) {
			return '1:'.$post->getThanksCount();
#			  'msg_thanked_ajax');
		} else {
			return $module->message('msg_thanked', $post->getShowHREF());
		}
	}
}

?>