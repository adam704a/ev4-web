<?php
/**
 * @version					$Id: index.php 20196 2011-01-09 02:40:25Z ian $
 * @package					Joomla.Site
 * @subpackage				tpl_beez2
 * @copyright				Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license					GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

$path = $this->baseurl.'/templates/'.$this->template;

JHTML::_('behavior.framework', true);

// get params

$logo				= $this->params->get('logo');
$app				= JFactory::getApplication();
$templateparams		= $app->getTemplate(true)->params;

if (isset($_GET['view'])) {$opt_content = $_GET['view'];} else {$opt_content="no_content";}
if (isset($_GET['layout'])) {$Edit = $_GET['layout'];} else {$Edit="no_edit";}
if (isset($_GET['option'])) {$option = $_GET['option'];}

$menus      = &JSite::getMenu();
$menu      = $menus->getActive();
$pageclass   = "";

if (is_object( $menu )) : 
$params1 =  $menu->params;
$pageclass = $params1->get( 'pageclass_sfx' );
endif; 
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
<jdoc:include type="head" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $path ?>/css/position.css" type="text/css" media="screen,projection" />
<link rel="stylesheet" href="<?php echo $path ?>/css/layout.css" type="text/css" media="screen,projection" />
<link rel="stylesheet" href="<?php echo $path ?>/css/print.css" type="text/css" media="Print" />
<link rel="stylesheet" href="<?php echo $path ?>/css/personal.css" type="text/css" />

<!--[if lt IE 7]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/images/upgrade.jpg" border="0" &nbsp;alt="" /></a>
    </div>
<![endif]-->
<script type="text/javascript" src="<?php echo $path ?>/javascript/html5.js"></script>
<script type="text/javascript" src="<?php echo $path ?>/javascript/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo $path ?>/javascript/jquery.easing.1.3.js"></script>
<script type="text/javascript">
var $j = jQuery.noConflict();
$j(window).load(function(){

});
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-26804860-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</head>
<?php
$menu = & JSite::getMenu();
if ($menu->getActive() == $menu->getDefault()) {
		$numb_page="first ";
	} 
else {
		$numb_page="all ";
	}
?>
<body class="<?php echo ''.$numb_page.''.$pageclass ?>">
<div id="all">
    <div class="main">
    <div id="header">
      <div class="logoheader">
        <h1 id="logo">
          <?php if ($logo): ?>
          <a href="<?php echo $this->baseurl?>" title="<?php echo htmlspecialchars($templateparams->get('sitetitle'));?>"><img src="<?php echo $this->baseurl ?>/<?php echo htmlspecialchars($logo); ?>"  alt="<?php echo htmlspecialchars($templateparams->get('sitetitle'));?>" /></a>
          <?php endif;?>
          <?php if (!$logo ): ?>
			<span><?php echo htmlspecialchars($templateparams->get('sitetitle'));?></span>
		 <?php endif; ?>
        </h1>
      </div>
      <jdoc:include type="modules" name="user-1" style="xhtml" />
      <!-- end logoheader -->
      <div class="navigation">
        <jdoc:include type="modules" name="user-4" />
      </div>
    </div>
    <?php if(($opt_content != 'article') && $Edit != 'edit' && $option!='com_search') : ?>
    <jdoc:include type="modules" name="top" style="xhtml"/>
    <?php endif; ?>
    <?php if($this->countModules('user-2') && ($opt_content != 'article')  && $Edit != 'edit' && $option!='com_search'): ?>
    <div class="main">
        <div class="wrapper">
          <jdoc:include type="modules" name="user-2" style="xhtml" />
        </div>
    </div>
    <?php endif; ?>
    <!-- end header -->
    <div id="content">
      <div class="wrapper">
        <?php if($this->countModules('right') && $Edit != 'edit') : ?>
        <div id="sidebar-2" class="right">
          <jdoc:include type="modules" name="right" style="xhtml" />
        </div>
        <?php endif; ?>
        <?php if($this->countModules('left') && $Edit != 'edit') : ?>
        <div id="sidebar" class="left">
          <jdoc:include type="modules" name="left" style="xhtml" />
        </div>
        <?php endif; ?>
        <?php if ($this->getBuffer('message')) : ?>
        <div class="error">
          <jdoc:include type="message" />
        </div>
        <?php endif; ?>
        <?php if(($opt_content != 'article')  && $Edit != 'edit' && $option!='com_search') : ?>
         <jdoc:include type="modules" name="user-3"  style="xhtml" />
        <?php endif; ?>
        <jdoc:include type="component" />
      </div>
  </div>
  </div>
  <div class="footer">
    <div id="footer">
      <jdoc:include type="modules" name="user-5" style="xhtml" />
      <span><?php echo JText::_('EV4 &copy; 2011 &bull;');?> <a href="index.php?option=com_content&amp;view=article&amp;catid=84&amp;id=130&amp;Itemid=464">Privacy Policy</a></span>
      <!--{%FOOTER_LINK} -->
    </div>
    <!-- end footer -->
  </div>
</div>
</body>
</html>
