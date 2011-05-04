<?php
final class WeChall_HistoryText extends GWF_Method
{
	public function getHTAccess(GWF_Module $module)
	{
		return
			'RewriteRule ^history/for/([^/]+)$ index.php?mo=WeChall&me=HistoryText&username=$1'.PHP_EOL.
			'RewriteRule ^history/for/([^/]+)/by/page-(\d+)$ index.php?mo=WeChall&me=HistoryText&username=$1&page=$2'.PHP_EOL.
			'RewriteRule ^history/for/([^/]+)/by/([^/]+)/([DEASC,]+)/page-(\d+)$ index.php?mo=WeChall&me=HistoryText&username=$1&by=$2&dir=$3&page=$4'.PHP_EOL;
	}

	public function execute(GWF_Module $module)
	{
		if (false === ($user = GWF_User::getByName(Common::getGet('username')))) {
			return GWF_HTML::err('ERR_UNKNOWN_USER');
		}
		
		return $this->templateHistory($module, $user);
	}

	private function templateHistory(GWF_Module $module, GWF_User $user)
	{
		require_once 'module/WeChall/WC_HistoryUser2.php';
		$uid = $user->getID();
		$ipp = 50;
		$history = GDO::table('WC_HistoryUser2');
		$nItems = $history->countRows("userhist_uid=$uid");
		$nPages = GWF_PageMenu::getPagecount($ipp, $nItems);
		$page = Common::clamp(Common::getGet('page', 1), 1, $nPages);
		$from = GWF_PageMenu::getFrom($page, $ipp);
		$by = Common::getGet('by', '');
		$dir = Common::getGet('dir', '');
		$orderby = $history->getMultiOrderby($by, $dir);
		
		$uuname = $user->urlencode2('user_name');
		$duname = $user->displayUsername();
		GWF_Website::setPageTitle($module->lang('pt_texthis', $duname));
		GWF_Website::setMetaDescr($module->lang('md_texthis', $duname));
		GWF_Website::setMetaTags($module->lang('mt_texthis', $duname));
		
		$tVars = array(
			'user' => $user,
			'duname' => $duname,
			'sites' => WC_Site::getSites('site_id'),
			'data' => $history->select("userhist_uid=$uid", $orderby, $ipp, $from),
			'sort_url' => GWF_WEB_ROOT.'history/for/'.$uuname.'/by/%BY%/%DIR%/page-1',
			'page_menu' => GWF_PageMenu::display($page, $nPages, GWF_WEB_ROOT.'history/for/'.$uuname.'/by/'.urlencode($by).'/'.urlencode($dir).'/page-%PAGE%'),
		);
		return $module->template('text_history.php', NULL, $tVars);
	}
}
?>