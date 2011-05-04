<?php
final class PoolTool_MatchIP extends GWF_Method
{
//	public function isLoginRequired() { return true; }
//	public function getUserGroups() { return array('league'); }
	
	public function getHTAccess(GWF_Module $module)
	{
		return 'RewriteRule ^pray\.php$ index.php?mo=PoolTool&me=MatchIP'.PHP_EOL;
	}
	
	public function execute(GWF_Module $module)
	{
		if (false !== (Common::getPost('match'))) {
			return $this->onMatch($module);
		}
		
		return $this->templateMatcher($module);
	}
	
	private function templateMatcher(Module_PoolTool $module, $matches = array())
	{
		$form = $this->getForm($module);
		$tVars = array(
			'form' => $form->templateY($module->lang('ft_matcher')),
			'matches' => $matches,
		);
		return $module->templatePHP('matcher.php', $tVars);
	}	

	private function getForm(Module_PoolTool $module)
	{
		if (!(isset($_POST['dated']))) {
			$_POST['dated'] = GWF_Time::THIS_DAY;
		}
		if (!(isset($_POST['datem']))) {
			$_POST['datem'] = GWF_Time::THIS_MONTH;
		}
		if (!(isset($_POST['datey']))) {
			$_POST['datey'] = GWF_Time::THIS_YEAR;
		}
		
		$data = array(
			'pass' => array(GWF_Form::PASSWORD, '', $module->lang('th_pass')),
			'date' => array(GWF_Form::DATE, '', $module->lang('th_day'), GWF_Date::LEN_DAY),
			'hour_a' => array(GWF_Form::SELECT, $this->getHourSelect('hour_a'), $module->lang('th_hour_a')),
			'hour_b' => array(GWF_Form::SELECT, $this->getHourSelect('hour_b'), $module->lang('th_hour_b')),
			'ips' => array(GWF_Form::MESSAGE, '', $module->lang('th_ips')),
			'match' => array(GWF_Form::SUBMIT, $module->lang('btn_match')),
		);
		return new GWF_Form($this, $data);
	}
	
	private function getHourSelect($name)
	{
		$selected = (int) Common::getPost($name, 0);
		$data = array();
		for ($i = 0; $i < 24; $i++)
		{
			$data[] = array($i, $i);
		}
		return GWF_Select::display($name, $data, $selected);
	}
	
	private function onMatch(Module_PoolTool $module)
	{
		$form = $this->getForm($module);
		if (false !== ($errors = $form->validate($module))) {
			return $errors.$this->templateMatcher($module);
		}
		
		$date = $form->getVar('date');
		$datea = $date.$form->getVar('hour_a');
		$dateb = $date.$form->getVar('hour_b');
		
		$check = $this->parseIPs($form->getVar('ips'));
		
		if (false === ($ips = GDO::table('PT_IP')->selectColumn("ptip_ip", "ptip_time BETWEEN '$datea' AND '$dateb'"))) {
			return GWF_HTML::err('ERR_DATABASE', array( __FILE__, __LINE__));
		}
		
		$matches = array();
		
		foreach ($check as $ip)
		{
			foreach ($ips as $ip2)
			{
				if ($ip2 === $ip)
				{
					$matches[] = $ip;
				}
			}
		}
		
		return $this->templateMatcher($module, $matches);
	}
	
	private function parseIPs($ips)
	{
		$ips = str_replace(',', ' ', $ips);
		if (0 === preg_match_all('/(\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3})/', $ips, $matches)) {
			return array();
		}
		
		$back = array();
		foreach ($matches[1] as $match)
		{
			$ip = GWF_IP6::getIP(GWF_IP_QUICK, $match);
			if (!in_array($ip, $back, true))
			{
				$back[] = $ip;
			}
			
		}
		return $back;
	}
	
	public function validate_pass(Module_PoolTool $m, $arg) { return $arg === $m->cfgPass() ? false : $m->lang('err_pass'); }
	public function validate_date(Module_PoolTool $m, $arg) { return GWF_Validator::validateDate($m, 'date', $arg, GWF_Date::LEN_DAY, false, true); }
	public function validate_ips(Module_PoolTool $m, $arg) { return false; }
	public function validate_hour_a(Module_PoolTool $m, $arg)
	{
		$_POST['hour_a'] = $arg = (int) $arg;
		if ($arg < 0 || $arg > 23) {
			return $m->lang('err_hour_a');
		}
		return false;
	}
	
	public function validate_hour_b(Module_PoolTool $m, $arg)
	{
		$_POST['hour_b'] = $arg = (int) $arg;
		if ($arg < 0 || $arg > 23) {
			return $m->lang('err_hour_b');
		}
		return false;
	} 
}
?>