<?php
/**
 * @version		$Id$
 * @package		Joomla.Installation
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

jimport('joomla.html.html');
jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.file');
jimport('joomla.language.helper');
jimport('joomla.form.formfield');
JLoader::register('JFormFieldList', JPATH_LIBRARIES.'/joomla/form/fields/list.php');

/**
 * Sample data Form Field class.
 *
 * @package		Joomla.Installation
 * @subpackage	Form
 * @since		1.6
 */
class JFormFieldAccess extends JFormFieldList
{
	/**
	 * The form field type.
	 *
	 * @var		string
	 * @since	1.6
	 */
	protected $type = 'Access';

	/**
	 * Method to get the field options.
	 *
	 * @return	array	The field option objects.
	 * @since	1.6
	 */
	protected function getOptions()
	{
		// Initialize variables.
		$lang = JFactory::getLanguage();
		$options = array();
		$db =& JFactory::getDBO();

		$query = 'SELECT id, title'
		. ' FROM #__usergroups'
		. ' ORDER BY id'
		;
		$db->setQuery( $query );
		$groups = $db->loadObjectList();
		foreach($groups as $group) {
			$options[] = JHtml::_('select.option', $group->id, JText::_($group->title) );
		}
					
		// Merge any additional options in the XML definition.
		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}
?>