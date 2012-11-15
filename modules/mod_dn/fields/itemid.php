<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );


jimport('joomla.html.html');
jimport('joomla.form.formfield');//import the necessary class definition for formfield


class JFormFieldItemId extends JFormField
{

	protected $type = 'ItemId';
	
   var $options = array();
   var $menutype = '';
	// $parent is the parent of the children we want to see
	// $level is increased when we go deeper into the tree,
	//        used to display a nice indented tree
	
	function display_children($parent, $level ) {
		// retrieve all children of $parent
		$db =& JFactory::getDBO();

		$query = 'SELECT #__menu.id, #__menu.title as title, #__menu.parent_id, #__menu.menutype, #__menu_types.title as menutitle
	            FROM #__menu, #__menu_types 
				WHERE parent_id='.$parent.' AND 
					  #__menu.menutype = #__menu_types.menutype AND 
					  #__menu.published=1 ORDER BY menutitle, ordering, parent_id';
		
		$result = $db->setQuery( $query );
		$rows = $db->loadObjectList();

		// display each child
		foreach ($rows as $row) {
			if ($row->menutype != $this->menutype) {
				$this->options[] = JHTML::_('select.optgroup', $row->menutitle ,'id','title');
				$this->menutype = $row->menutype;
			}
			
			$row->title = str_repeat('-',$level).$row->title;
			$this->options[] = JHTML::_('select.option', $row->id, $row->title, 'id', 'title');
			// echo "DEBUG: $parent, $row->id, $row->title<br>";
			// call this function again to display this
			// child's children
			$this->display_children($row->id, $level+1);
	   }
	}    

		protected function getInput()
	{
  // Initialize variables.
  $session = JFactory::getSession();
  // $options = array();

	  $this->display_children(1, 0);

  $attr = '';

  // Initialize some field attributes.
  $attr .= $this->element['class'] ? ' class="'.(string) $this->element['class'].'"' : '';

  // To avoid user's confusion, readonly="true" should imply disabled="true".
  if ( (string) $this->element['readonly'] == 'true' || (string) $this->element['disabled'] == 'true') {
   $attr .= ' disabled="disabled"';
  }

  $attr .= $this->element['size'] ? ' size="'.(int) $this->element['size'].'"' : '5';
  $attr .= $this->multiple ? ' multiple="multiple"' : '';

  // Initialize JavaScript field attributes.
  $attr .= $this->element['onchange'] ? ' onchange="'.(string) $this->element['onchange'].'"' : '';

	// echo "DEBUG:".print_r($this->options)."<br>";
	return JHTML::_('select.genericlist',  $this->options, $this->name, trim($attr), 'id', 'title', $this->value );
	
	// return JHTML::_('select.genericlist',  $this->options, ''.$control_name.'['.$name.'][]',  ' multiple="multiple" size="' . $size . '" class="inputbox"', 'value', 'text', $value, $control_name.$name);
   }
   

}
?>