<?php
echo $tVars['module']->getUserGroupButtons();

echo '<div class="gwf_buttons_outer"><div class="gwf_buttons">'.
GWF_Button::generic($tLang->lang('btn_adv_search'), $tVars['href_adv']).
'</div></div>';

echo sprintf('<div>%s</div>', $tVars['form']);


$headers = array(
	array('', 'user_countryid'),
	array($tLang->lang('th_user_name'), 'user_name'),
	array($tLang->lang('th_user_level'), 'user_level'),
	array($tLang->lang('th_user_email'), 'user_email'),
	array($tLang->lang('th_user_regdate'), 'user_regdate'),
	array($tLang->lang('th_user_birthdate'), 'user_birthdate'),
	array($tLang->lang('th_user_lastactivity'), 'user_lastactivity'),
);
$headers = GWF_Table::getHeaders2($headers, $tVars['sort_url']);

echo $tVars['page_menu'];

echo GWF_Table::start();
?>
	<?php echo GWF_Table::displayHeaders($headers); ?>
<?php foreach ($tVars['users'] as $user) { $user instanceof GWF_User; ?>
<?php echo GWF_Table::rowStart(); ?>
		<td><?php echo $user->displayCountryFlag(); ?></td>
		<td><a href="<?php echo GWF_WEB_ROOT.'profile/'.$user->urlencode('user_name'); ?>"><?php echo $user->displayUsername(); ?></a></td>
		<td class="gwf_num"><?php echo $user->getVar('user_level'); ?></td>
		<td><?php echo $user->isEmailPublic() ? $user->displayEMailLink() : ''; ?></td>
		<td class="gwf_date"><?php echo $user->displayRegdate(); ?></td>
		<td class="gwf_date"><?php $user->isBirthdayShown() ? $user->displayBirthday() : ''; ?></td>
		<td class="gwf_date"><?php echo $user->isOnlineHidden() ? GWF_HTML::lang('unknown') : GWF_Time::displayAge(GWF_Time::getDate(GWF_Date::LEN_SECOND, $user->getVar('user_lastactivity'))); ?></td>
<?php echo GWF_Table::rowEnd(); ?>
<?php } ?>
<?php echo GWF_Table::end(); ?>
<?php 
echo $tVars['page_menu'];
?>