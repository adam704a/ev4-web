<?php
/**
 * @copyright	Copyright (C) 2010 Cédric KEIFLIN alias ced1870
 * http://www.ck-web-creation-alsace.com
 * http://www.joomlack.fr.nf
 * Module Maximenu_CK for Joomla! 1.6
 * @license		GNU/GPL
**/

// no direct access
defined('_JEXEC') or die('Restricted access');
require_once (dirname(__FILE__).DS.'helper.php');
$items = modmaximenu_CKHelper::GetMenu($params);
require(JModuleHelper::getLayoutPath('mod_maximenu_CK'))
?>