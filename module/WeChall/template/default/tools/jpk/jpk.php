<?php $path = GWF_WEB_ROOT.'applet/JPK_406.jar';
echo GWF_Box::box($tVars['lang']->lang('page_info', $path));
?>
<applet code="org.gizmore.jpk.JPK" archive="<?php echo $path; ?>" width="800" height="600" align="middle">
</applet>
