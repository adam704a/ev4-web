<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );


jimport('joomla.html.html');
jimport('joomla.form.formfield');//import the necessary class definition for formfield


/**
 * Supports an HTML select list of articles
 * @since  1.6
 */
class JFormFieldCategories extends JFormField
{
	/**
  * The form field type.
  *
  * @var  string
  * @since	1.6
  */
	protected $type = 'Categories'; //the form field type

	/**
  * Method to get content articles
  *
  * @return	array	The field option objects.
  * @since	1.6
  */
	protected function getInput()
	{
  // Initialize variables.
  $session = JFactory::getSession();
  $options = array();
  
  $attr = '';

  // Initialize some field attributes.
  $attr .= $this->element['class'] ? ' class="'.(string) $this->element['class'].'"' : '';

  // To avoid user's confusion, readonly="true" should imply disabled="true".
  if ( (string) $this->element['readonly'] == 'true' || (string) $this->element['disabled'] == 'true') {
   $attr .= ' disabled="disabled"';
  }

  $attr .= $this->element['size'] ? ' size="'.(int) $this->element['size'].'"' : '';
  $attr .= $this->multiple ? ' multiple="multiple"' : '';

  // Initialize JavaScript field attributes.
  $attr .= $this->element['onchange'] ? ' onchange="'.(string) $this->element['onchange'].'"' : '';
  

  //now get to the business of finding the articles
	
  $db = &JFactory::getDBO();
  $query = 'SELECT id,title, level FROM #__categories WHERE published=1 AND extension = '.$db->Quote($this->element['extension']).' ORDER BY lft';
  
  $db->setQuery( $query );
  $categories = $db->loadObjectList();
  
  $options=array();
  
  
	//loop through categories 
	foreach ($categories as $category) {
		if ($category->level > 1 ) {
			$category->title = str_repeat("|-", $category->level-1).$category->title;
		}
	 $options[]=$category;
	}   
   
  // Output
  
  return JHTML::_('select.genericlist',  $options, $this->name, trim($attr), 'id', 'title',  $this->value );
  
	}
}


