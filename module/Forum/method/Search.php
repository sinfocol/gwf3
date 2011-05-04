<?php
/**
 * Forum Search
 * @since 2.0
 * @version 3.0
 * @todo Advanced Search
 * @author gizmore
 */
final class Forum_Search extends GWF_Method
{
	##############
	### Module ###
	##############
	public function getHTAccess(GWF_Module $module)
	{
		return $this->getHTAccessMethod($module);
	}

	public function execute(GWF_Module $module)
	{
		$this->pagemenu = '';
		$this->sortURL = '';
		if (false !== Common::getPost('qsearch')) {
			return $this->onQuickSearch($module, Common::getPost('term'));
		}
		if (false !== ($term = Common::getGet('term'))) {
			return $this->onQuickSearch($module, $term);
		}
		return $this->templateSearch($module);
	}

	#############
	### Forms ###
	#############
//	public function getFormAdv(Module_Forum $module)
//	{
//		return GWF_FormGDO::getSearchForm($module, $this, GDO::table('GWF_ForumPost'), GWF_User::getStaticOrGuest(), true);
//	}
	
	public function getFormQuick(Module_Forum $module)
	{
		return GWF_QuickSearch::getQuickSearchForm($module, $this);
	}
	
	public function templateSearch(Module_Forum $module, $result=array(), $term='')
	{
		$tVars = array(
			'form_quick' => $this->getFormQuick($module)->templateX($module->lang('ft_search_quick'), false),
//			'form_adv' => $this->getFormAdv($module)->templateY($module->lang('ft_search_adv')),
			'pagemenu' => $this->pagemenu,
			'sort_url' => $this->sortURL,
			'result' => $result,
			'term' => $term,
		);
		return $module->templatePHP('search.php', $tVars);
	}
	
	##############
	### Search ###
	##############
	public function onQuickSearch(Module_Forum $module, $term)
	{
		$posts = GDO::table('GWF_ForumPost');
		$fields = $posts->getSearchableFields(GWF_User::getStaticOrGuest());
		$_GET['term'] = $term = trim($term);
//		$term = Common::getRequest('term', '');
		$conditions = GWF_QuickSearch::getQuickSearchConditions($posts, $fields, $term);
		$permQuery = GWF_ForumPost::getPermQuery();
		$conditions .= ' AND ('.$permQuery.')';
		$by = Common::getGet('by', 'post_date');
		$dir = Common::getGet('dir', 'DESC');
		$orderby = $posts->getMultiOrderby($by, $dir);
		$ipp = $module->getThreadsPerPage();
		$nItems = $posts->countRows($conditions);
		$nPages = GWF_PageMenu::getPagecount($ipp, $nItems);
		$page = Common::clamp(Common::getGet('page', 1), 1, $nPages);
		$href = $this->getMethodHref(sprintf('&term=%s&by=%s&dir=%s&page=%%PAGE%%', urlencode($term), urlencode($by), urlencode($dir)));
		$this->pagemenu = GWF_PageMenu::display($page, $nPages, $href);
		$result = GWF_QuickSearch::search($posts, $fields, $term, $orderby, $ipp, GWF_PageMenu::getFrom($page, $ipp), $permQuery);
		$this->sortURL = $this->getMethodHref(sprintf('&term=%s&by=%%BY%%&dir=%%DIR%%&page=1', urlencode($term)));
		return $this->templateSearch($module, $result, $term);
	}
}

?>
