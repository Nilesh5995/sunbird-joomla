<?php
/**
 * @package Tjlms
 * @copyright Copyright (C) 2009 -2010 Techjoomla, Tekdi Web Solutions . All rights reserved.
 * @license GNU GPLv2 <http://www.gnu.org/licenses/old-licenses/gpl-2.0.html>
 * @link     http://www.com
 */
defined('_JEXEC') or die('Restricted access');
$preview_class = "hide";
$source = '';
$html_src = 'about:blank';
$user_id = JFactory::getUser()->id;

$subformat = $source_plugin = $source_option = '';

if (!empty($lesson->sub_format))
{
	$subformat = $lesson->sub_format;
	$subformat_source_options = explode('.', $subformat);
	$source_plugin = $subformat_source_options[0];
	$source_option = $subformat_source_options[1];
}

if (!empty($source_option) && $source_plugin == 'contenteditor')
{
	$subformat_source_options = explode('.', $subformat);
	$source_option = $subformat_source_options[1];


		$source = $lesson->source;
		$preview_class = "";
		$html_src	=	JURI::root() . "index.php?option=com_tjlms&view=lesson&tmpl=component&lesson_id=" . $lesson_id . "&mode=preview&attempt=1&fs=1&close=0";
}
else
{
	?>

<?php } ?>
<label>contentId</label>
<input type="hidden" name="urlId" id="urlId" value="<?php echo JURI::root().'/plugins/tjtextmedia/contenteditor/content-editor/index.html?contentId=' ?>">
<input type="text" name="contentId" id="contentId">

<div class="control-group tjlms_html_lesson_preview tjlms_html_belonging_after_upload <?php echo $preview_class;?>">
	<!- -->
	<iframe width="100%" height="400px" src="<?php echo $html_src ;?>"></iframe>
	<div class="tjlms_text_center">
		<a class="btn btn-success tjlms_html_belonging_after_upload"
			onclick="OpenContentEditor()"><?php echo JText::_("COM_TJLMS_EDIT_HTML_CONTENT")?></a>
	</div>
</div>
	
<div class="tjlms_html_belonging_before_upload" align="left">
	<a class="btn btn-primary article tjmodal"
	onclick="OpenContentEditor()"><?php echo JText::_("Content Editor");?></a>
</div>

<script>
function OpenContentEditor() {
	alert(document.getElementById("urlId").value + document.getElementById("contentId").value)
  location.replace( document.getElementById("urlId").value + document.getElementById("contentId").value)
}
</script>