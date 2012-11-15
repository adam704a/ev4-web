<?php
/**
 * @Based on FLEXIcontent Emmanuel Danan - www.vistamedia.fr
 * @license GNU/GPL v2
 
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

/**
 * Renders the list of the content plugins
 *
 * @package 	Joomla
 * @subpackage	FLEXIcontent
 * @since		1.5
 */
class JElementPluginlist extends JElement
{
	/**
	 * Element name
	 * @access	protected
	 * @var		string
	 */
	var	$_name = 'Pluginlist';

	function fetchElement($name, $value, &$node, $control_name)
	{

		$plugins 	= array();
//		$plugins[] 	= JHTMLSelect::option('', JText::_( 'FLEXI_ENABLE_ALL_PLUGINS' )); 

		$db =& JFactory::getDBO();
		
		$query  = 'SELECT element, name'
				. ' FROM #__plugins'
				. ' WHERE folder = ' . $db->Quote('content')
				. ' AND published = 1 '
				// . ' AND element NOT IN ('.$db->Quote('pagebreak').','.$db->Quote('pagenavigation').','.$db->Quote('vote').')'
				. ' ORDER BY ordering';
		
		$db->setQuery($query);
		$plgs = $db->loadObjectList();

		foreach ($plgs as $plg) {
			$plugins[] = JHTMLSelect::option($plg->element, $plg->name); 
		}

		$class = 'class="inputbox" multiple="true" size="5"';
		
		return JHTMLSelect::genericList($plugins, $control_name.'['.$name.'][]', $class, 'value', 'text', $value, $control_name.$name);
	}
}