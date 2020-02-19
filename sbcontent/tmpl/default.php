<?php
/**
 * @package     Tjlms.Plugin
 * @subpackage  Tjlms,TJtextmedia,lessonlink
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die('Restricted access');
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Factory;

include_once JPATH_ROOT . '/administrator/components/com_tjlms/js_defines.php';
$input      = Factory::getApplication()->input;
$this->mode = $input->get('mode', '', 'STRING');
$url = Uri::root(true) . '/plugins/tjtextmedia/' . $this->_name . '/' . $this->_name . '/js/Readability.min.js';
Factory::getDocument()->addScript($url);
?>

<div class="content-player">
     <iframe id="preview" src="<?php echo 'plugins/tjtextmedia/sbcontent/tmpl/content-player/preview.html?webview=true';?>" width=100% height=100%></iframe>
</div>

<script>
	var configuration = {
    "context": {
        "mode": "preview/edit/play", // to identify preview used by the user to play/edit/preview
        "authToken": "", // Auth key to make V3 api calls
        "contentId": "do_21274616297317990412101", // ContentId used to get body data from content API call
        "sid": "sdjfo8e-3ndofd3-3nhfo334", // User sessionid on portal or mobile
        "did": "sdjfo8e-3ndofd3-3nhfo334", // Unique id to identify the device or browser
        "uid": "sdjfo8e-3ndofd3-3nhfo334", // Current logged in user id
        "channel": "", // To identify the channel(Channel ID). Default value ""
        "pdata": // Producer information. Generally the App which is creating the event, default value {}
        {
            "id": "", // Producer ID. For ex: For sunbird it would be "portal" or "genie"
            "pid": "", // Optional. In case the component is distributed, then which instance of that component
            "ver": "", // version of the App
        },
        "app": [""], // Genie tags
        "partner": [""], // Partner tags
        "dims": [""], // Encrypted dimension tags passed by respective channels
        "cdata": [{ //correlation data
            "type": "", //Used to indicate action that is being correlated
            "id": "" //The correlation ID value
        }],

    },
    "config": {
        "repos": ["s3path"], // plugins repo path where all the plugins are pushed s3 or absolute folder path
        "plugins": [{ id: "org.sunbird.telemtryPlugin", "ver": "1.0", "type": "plugin" }], //Inject external custom plugins into content (for externl telemetry sync)
        "overlay": { // Configuarable propeties of overlay showing by GenieCanvas on top of the content
            "enableUserSwitcher": true, // enable/disable user-switcher, default is true for mobile & preview
            "showUser": true, // show/hide user-switcher functionality. default is true to show user information
            "showOverlay": true, // show/hide complete overlay including next/previous buttons. default value true
            "showNext": true, // show/hide next navigation button on content. default is true
            "showPrevious": true, // show/hide previous navigation button on content. default is true
            "showSubmit": false, // show/hide submit button for assessmetns in the content. default is false
            "showReload": true, // show/hide stage reload button to reset/re-render the stage. default is true
            "menu": {
                "showTeachersInstruction": true // show/hide teacher instructions in the menu
            }
        },
        "splash": { // list of configurable properties to handle splash screen shown while loading content
            "text": "Powered by Sunbird", // Text to be shown on splash screen while loading content.
            "icon": "assets/icons/icn_genie.png", // Icon to be show on above the text(full absolute path of the image in mobiew or http image link)
            "bgImage": "assets/icons/background_1.png", // backgroung image used for splash screen while loading content(absolute folder path of the image in mobie or http image link)
            "webLink": "XXXX" // weblink to be opened on click of text
        },
        "mimetypes": [ // Content mimetypes for new cotent lucnhers
            "application/vnd.ekstep.ecml-archive",
            "application/vnd.ekstep.html-archive"
        ],
        "contentLaunchers": [ // content laucher plugins for specific content mimetypes
            { // Plugin used for ECML content to launch, It is default plugin
                "mimeType": 'application/vnd.ekstep.html-archive',
                "id": 'org.sunbird.htmlrenderer',
                "ver": 1.0,
                "type": 'plugin'
            }
        ]
    },
    "metadata": {}, //content metadata json object (from API response take -> response.result.content)
    "data": undefined // content body json object (from API response take -> response.result.content.body)
}

// window.globalConfig = {};

// window.globalConfig.host= 'https://qa.ekstep.in/';
// window.globalConfig.apislug = 'api/content/v3';
	var previewElement = jQuery('#preview')[0];
  previewElement.onload = function() {
       previewElement.contentWindow.initializePreview(configuration);
  }
</script>
