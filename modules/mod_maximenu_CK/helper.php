<?php

/**
 * @copyright	Copyright (C) 2010 Cédric KEIFLIN alias ced1870
 * http://www.ck-web-creation-alsace.com
 * http://www.joomlack.fr.nf
 * Module Maximenu_CK for Joomla! 1.6
 * @license		GNU/GPL
 * Version 5.0
 * */
// no direct access
defined('_JEXEC') or die('Restricted access');
class modmaximenu_CKHelper {

    function GetMenu(&$params) {
        jimport('joomla.application.module.helper');


        // retrieve parameters from the module
        $mooduree = $params->get('mooduration', 500);
        $mootransition = $params->get('mootransition', 'Bounce');
        $mooease = $params->get('mooease', 'easeOut');
        $usemootools = $params->get('usemootools', '1');
        $orientation = $params->get('orientation', '0');
        $testoverflow = $params->get('testoverflow', '1');
        $usecss = $params->get('usecss', '1');
        $menuID = $params->get('menuid', 'maximenuCK');
        $usefancy = $params->get('usefancy', '1');
        $fancyduree = $params->get('fancyduration', 500);
        $fancytransition = $params->get('fancytransition', 'Sine');
        $fancyease = $params->get('fancyease', 'easeOut');
        $theme = $params->get('theme', 'default');
        $fxtype = $params->get('fxtype', 'open');
        $useopacity = $params->get('useopacity', '0');
        $dureeout = $params->get('dureeout', 500);
        $startlevel = $params->get('startLevel', '0');
        $endlevel = $params->get('endLevel', '10');
        $dependantitems = $params->get('dependantitems', '0');



        // add external stylesheets
        $document = &JFactory::getDocument();
		$app =& JFactory::getApplication();
		$templateDir = JURI::base() . 'templates/' . $app->getTemplate();
        if ($orientation == 1) {
            $document->addStyleSheet($templateDir . '/css/themes/' . $theme . '/css/moo_maximenuV_CK.css');
            if ($usecss == 1)
                $document->addStyleSheet($templateDir . '/css/themes/' . $theme . '/css/maximenuV_CK.php?monid=' . $menuID);
        } else {
            $document->addStyleSheet($templateDir .'/css/themes/' . $theme . '/css/moo_maximenuH_CK.css');
            if ($usecss == 1)
                $document->addStyleSheet($templateDir .'/css/themes/' . $theme . '/css/maximenuH_CK.php?monid=' . $menuID);
        }



        // add mootools effects
        if ($usemootools == 1) {
            JHTML::_("behavior.framework");
            if ($fxtype == 'open') {
                $document->addScript(JURI::base() . 'modules/mod_maximenu_CK/assets/moo_maximenu_CK.js');
            } else {
                $document->addScript(JURI::base() . 'modules/mod_maximenu_CK/assets/moo_maximenuSlide_CK.js');
            }

            // load moomenu
            $js = "window.addEvent('domready', function() {new DropdownMaxiMenu(document.getElement('div#" . $menuID . "'),{"
                    . "mooTransition : '" . $mootransition . "',"
                    . "mooEase : '" . $mooease . "',"
                    . "useOpacity : '" . $useopacity . "',"
                    . "dureeOut : " . $dureeout . ","
                    . "menuID : '" . $menuID . "',"
                    . "testoverflow : '" . $testoverflow . "',"
                    . "orientation : '" . $orientation . "',"
                    . "mooDuree : " . $mooduree . "});"
                    . "});";

            $document->addScriptDeclaration($js);
        } else {
            $document->addStyleSheet(JURI::base() . 'modules/mod_maximenu_CK/assets/maximenu_CK.css');
            $script = '<!--
						window.addEvent(\'domready\', function() {
                        var sfEls = document.getElementById("' . $menuID . '").getElementsByTagtitle("li");
                        for (var i=0; i<sfEls.length; i++) {
	
                            sfEls[i].onmouseover=function() {
                                this.classtitle+=" sfhover";
                            }
		
                            sfEls[i].onmouseout=function() {
                                this.classtitle=this.classtitle.replace(new RegExp(" sfhover\\\\b"), "");
                            }
                        }
                        });
						//-->';
            $document->addScriptDeclaration($script);
        }

        // add fancy effect
        if ($usemootools == 1 && $orientation != 1 && $usefancy == 1) {
            $document->addScript(JURI::base() . 'modules/mod_maximenu_CK/assets/fancymenu_CK.js');

            $js = "window.addEvent('domready', function() {new SlideList(document.getElement('div#" . $menuID . " ul'),{"
                    . "fancyTransition : '" . $fancytransition . "',"
                    . "fancyEase : '" . $fancyease . "',"
                    . "fancyDuree : " . $fancyduree . "});"
                    . "});";

            $document->addScriptDeclaration($js);
        }

        // add javascript from the theme
        $document->addScript(JURI::base() . 'modules/mod_maximenu_CK/themes/' . $theme . '/js/maximenu_addon_CK.js');

        // get active item ID
        $menu = &JSite::getMenu();
        $active = $menu->getActive();

        // list all modules
        $modulesList = modmaximenu_CKHelper::CreateModulesList();

        // initialize variables
        $level = 0;
        $items = array();
        $i = 0;

        // page title management
        $pagetitle = $document->getTitle();
        $title = explode("||",$active->title);
        $title = str_replace ($active->title, $title[0], $pagetitle);
        $title = explode("[",$title);
        $title = str_replace ($active->title, $title[0], $pagetitle);
        $document->setTitle($title); // returns the page title without description


        //get the menu items
        $app		= JFactory::getApplication();
	$menu		= $app->getMenu();
        $items 		= $menu->getItems('menutype',$params->get('menutype'));


        $lastitem = 0;


        // first loop to delete subitems not under active element
        foreach ($items as $i => &$item) {
            $item->level--; // compatibilite pour j1.6
            
            

            // looking for start and end level
            if (($item->level < $startlevel && $startlevel) || ($item->level > $endlevel)) {
                unset($items[$i]);
                continue;
            }

            // check if item is child of active element
            if ($dependantitems && $startlevel && (
                    ( ($item->level == $active->level + 1) && ($item->parent_id != $active->id) )
                    || ( isset($items[$lastitem]) && ($item->parent_id != $items[$lastitem]->id) && ($item->parent_id != $items[$lastitem]->parent_id) && ($item->parent_id != $active->id) )
                    || (!isset($items[$lastitem]) && ($item->parent_id != $active->id) )
                    )) {
                unset($items[$i]);
                continue;
            }

            $lastitem = $i;
        }


        $niveau_premier = 0; // niveau du premier élément du menu double
        $lastitem = 0;
        foreach ($items as $i => &$item) {
            if (!$niveau_premier) {
                $niveau_premier = $items[$i]->level; // important for split menu
            }
            

            $item->deeper = false;
            $item->shallower = false;
            $item->level_diff = 0;

            if (isset($items[$lastitem])) {
                $items[$lastitem]->deeper = ($item->level > $items[$lastitem]->level);
                $items[$lastitem]->shallower = ($item->level < $items[$lastitem]->level);
                $items[$lastitem]->level_diff = ($items[$lastitem]->level - $item->level);
            }

            // add classes for first an last items
            if ($items[$lastitem]->deeper || isset($items[$lastitem]->colonne)) $item->classe .= ' first';
            if ($items[$lastitem]->shallower || $item->title == '[col]') $items[$lastitem]->classe .= ' last';

            // add the parent class
            if ($items[$lastitem]->deeper) {
		$items[$lastitem]->classe .= ' parent';
            }


            $lastitem = $i;//echo $lastitem;

            $item->is_end = !isset($items[$i + 1]);
            if ($item->is_end) { 
                if ($startlevel) {
                    $item->level_diff = $item->level - $niveau_premier; //for split menu
                } else {
                    $item->level_diff = $item->level;
                }
            }


            switch ($item->type) {
                case 'separator':
                    // No further action needed.
                    continue;

                case 'url':
                    if ((strpos($item->link, 'index.php?') === 0) && (strpos($item->link, 'Itemid=') === false)) {
                        // If this is an internal Joomla link, ensure the Itemid is set.
                        $item->link = $item->link . '&amp;Itemid=' . $item->id;
                    }
                    break;
                case 'alias':
                    // If this is an alias use the item id stored in the parameters to make the link.
                    //$alias = $menu->getItem($menu_params->def('menu_item', 0));
                    $item->link = 'index.php?Itemid=' . $item->params->get('aliasoptions');
                    ;
                    break;
                default:
                    $router = JSite::getRouter();
                    if ($router->getMode() == JROUTER_MODE_SEF) {
                        $item->link = 'index.php?Itemid=' . $item->id;
                    } else {
                        $item->link .= '&Itemid=' . $item->id;
                    }
                    break;
            }

            if ($item->home == 1) {
                // Correct the URL for the home page.
                $item->link = JURI::base();
            } elseif (strcasecmp(substr($item->link, 0, 4), 'http') && (strpos($item->link, 'index.php?') !== false)) {
                // This is an internal Joomla web site link.
                $item->link = JRoute::_($item->link, true, $item->params->get('secure'));
            } else {
                // Correct the & in the link.
                $item->link = str_replace('&', '&amp;', $item->link);
            }

            // add some classes
            $item->classe .= " item" . $item->id;
            if (isset($active) && $active->id == $item->id) {
                $item->classe .= " current";
            }

            $path = isset($active) ? $active->tree : array();
            if (in_array($item->id, $path)) {
		$item->classe .= " active";
            }

            // make columns
            if (preg_match('/\[col\]/', $item->title)) {
                //$item->title = preg_replace('/\[col\]/', '', $item->title);
                $colparent = false;
                foreach ($items as $testcol) {
                    if ($testcol->id == $item->parent_id) {
                        $colparent = true;
                        break;
                    }
                }
                if ($colparent)
                    $item->colonne = true;
                $item->title = '';
            }

            $item->divclasse = "";
            if (preg_match('/\[cols([0-9])\]/', $item->title, $resultat)) {
                $item->title = preg_replace('/\[cols[0-9]\]/', '', $item->title);
                $divclasse = " cols" . $resultat[1];
                $item->divclasse = strval($divclasse);
            }


           // search for parameters
            $paramsCK = "";
            $masque = "/\[(.*?)\]/";


            $paramsCKs = array();
            if (preg_match_all($masque, $item->title, $resultat)) {
                $paramsCKs = $resultat[1];//var_dump($paramsCKs);
            }

            // variables definition
            $titreCK = $item->title;
            $item->content = "";
            $item->rel = "";

            foreach ($paramsCKs as $paramsCK) {



            $titreCK = preg_replace('/\[(.*)\]/', '', $item->title);


            // load module
            if (preg_match('/modname/', $paramsCK)) {
                $item->content = '<div class="maximenuCK_mod">' . modmaximenu_CKHelper::GenModuleByName($paramsCK, $params) . '<div class="clr"></div></div>';
            } elseif (preg_match('/modid/', $paramsCK)) {
                $item->content = '<div class="maximenuCK_mod">' . modmaximenu_CKHelper::GenModuleById($paramsCK, $params, $modulesList) . '<div class="clr"></div></div>';
            } else {
                //$item->content = "";
            }


            // add rel attribute
            if (preg_match('/rel=/', $paramsCK)) {
                $item->rel = ' rel="'.preg_replace('/rel=/', '', $paramsCK).'"';

            }

            } // fin de la boucle foreach


            // manage title
            $titreCK = explode("||", $titreCK);
            if (isset($titreCK[1])) {
                $titreCK = $titreCK[0] . '<span class="descCK">' . $titreCK[1] . '</span>';
            } else {
                $titreCK = $titreCK[0];
            }

            // manage images
            $item->image = '';
            $item->img = false;
            $menu_image = $item->params->get('menu_image', -1);
            if (($menu_image <> '-1') && $menu_image) {
                if ($params->get('menu_images_align') == 1) {
                    $item->image = '<img src="' . JURI::base(true) . '/' . $menu_image . '" alt="' . $item->title . '" align="right" />';
                } else {
                    $item->image = '<img src="' . JURI::base(true) . '/' . $menu_image . '" alt="' . $item->title . '" align="left" />';
                }
            }
            // if only image, then no title
            if (preg_match('/\[img\]/', $item->title)) {
                $item->image = '<img src="' . JURI::base(true) . '/' . $menu_image . '" border="0" alt="' . $item->title . '"/>';
                $titreCK = 'img';
                $item->img = true;
            }

            $item->anchor_css = htmlspecialchars($item->params->get('menu-anchor_css', ''));
            $item->anchor_title = htmlspecialchars($item->params->get('menu-anchor_title', ''));
            $item->title = $titreCK;
        }



        return $items;
    }

    function GenModuleByName($paramsCK, &$params) {
        $forcetitle = $params->get('forcetitle', '0');
        if ($forcetitle == 1) {
            $attribs['style'] = 'xhtml';
        } else {
            $attribs['style'] = 'none';
        }
        // get the title of the module to load
        $modtitle = preg_replace('/modname=/', '', $paramsCK);
        // load the module
        if (JModuleHelper::isEnabled($modtitle)) {
            $module = JModuleHelper::getModule($modtitle);
            //$attribs['style'] = 'none';
            return JModuleHelper::renderModule($module, $attribs);
        }
    }

    function GenModuleById($paramsCK, &$params, &$modulesList) {
        $forcetitle = $params->get('forcetitle', '0');
        if ($forcetitle == 1) {
            $attribs['style'] = 'xhtml';
        } else {
            $attribs['style'] = 'none';
        }
        // get the title of the module to load
        $paramsCK = preg_replace('/modid=/', '', $paramsCK);
        $modtitle = $modulesList[$paramsCK]->title;
        $modtitle = $modulesList[$paramsCK]->module;
        $modtitle = preg_replace('/mod_/', '', $modtitle);

        // load the module
        if (JModuleHelper::isEnabled($modtitle)) {
            $module = JModuleHelper::getModule('mod_'.$modtitle, $modtitle);
            return JModuleHelper::renderModule($module, $attribs);
        }
    }

    function CreateModulesList() {
        $db = & JFactory::getDBO();
        $query = "
			SELECT *
			FROM #__modules
			WHERE published=1
			ORDER BY id
			;";
        $db->setQuery($query);
        $modulesList = $db->loadObjectList('id');
        return $modulesList;
    }

}

?>