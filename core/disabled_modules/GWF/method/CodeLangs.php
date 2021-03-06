<?php
final class GWF_CodeLangs extends GWF_Method
{
	public function execute(GWF_Module $module)
	{
		require_once GWF_GESHI_PATH;
		$geshi = new GeSHi();
		$langs = $geshi->get_supported_languages(false);
		sort($langs);
//		$this->niceArray($langs, false, '-------')
		$this->niceArray($langs, 'python', 'Python');
		$this->niceArray($langs, 'perl', 'Perl');
		$this->niceArray($langs, 'cpp', 'CPP');
		$this->niceArray($langs, 'php', 'PHP');
		
		$back = $module->lang('th_lang').':'.PHP_EOL;
		$back .= '<select id="bb_code_lang_sel">'.PHP_EOL;
		$back .= '<option value="0">'.$module->lang('th_lang').'</option>'.PHP_EOL;
		foreach ($langs as $lang)
		{
			$back .= sprintf('<option value="%s">%s</option>', $lang, $lang).PHP_EOL;
		}
		$back .= '</select>'.PHP_EOL;
		$back .= $module->lang('th_title').': <input type="text" name="bb_code_title" id="bb_code_title" size="20" value="" />'.PHP_EOL;
		$back .= '<input type="submit" name="bb_code_insert" value="'.$module->lang('btn_code').'" onclick="return bbInsertCodeNow();" />'.PHP_EOL;
		return $back;
	}
	
	private function niceArray(array &$array, $search, $replace)
	{
		if (false !== ($index = array_search($search, $array)))
		{
			unset($array[$index]);
			array_unshift($array, $replace);
		}
	}
	
}
?>