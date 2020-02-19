<?php
/**
 * @package     Tjlms.Plugin
 * @subpackage  Tjlms,TJTEXTMEDIA,lessonlink
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Language\Text;

defined('_JEXEC') or die('Restricted access');

$source        = (isset($lesson->source)) ? $lesson->source : '';
$preview_class = "tjlms_display_none";
$source_plugin = $source_option = '';
$subformat     = '';

if (!empty($lesson->sub_format))
{
	$subformat = $lesson->sub_format;
	$subformat_source_options = explode('.', $subformat);
	$source_plugin = $subformat_source_options[0];
	$source_option = $subformat_source_options[1];
}

?>
<link rel="stylesheet" type="text/css"
	href="<?php echo Uri::root(true) . '/plugins/tjtextmedia/' . $this->_name . '/' . $this->_name . '/style/tjlmslessonlink.css';?>"></link>
<div class="control-group"></div>

<div class="control-group">
	<div class="control-label">
		<label id="jform_link-lbl" for="jform_link" class="hasTooltip"
			title="<?php echo Text::_('PLG_TJTEXTMEDIA_LA_SBCONTENT_ID_TITLE');?>">
			<?php echo Text::_('PLG_TJTEXTMEDIA_LAL_SBCONTENT_ID');?>
		</label>
	</div>
	<div class="controls">
		<input id="tjlmslessonlink_url" cols="50" class="input-block-level"
			rows="2" name="lesson_format[sbcontent][content]" value="<?php echo $source; ?>" />
		<input type="hidden" id="subformatoption" name="lesson_format[sbcontent][subformatoption]" value="content"/>
	</div>
</div>

<script>
function validatetextmediasbcontent(formid,format,subformat,media_id){
	var res = {check: 1, message: ""};
	return res;
}
</script>
