<?php
/**
 * @copyright	Copyright (C) 2010 Cédric KEIFLIN alias ced1870
 * http://www.ck-web-creation-alsace.com
 * http://www.joomlack.fr.nf
 * Module Maximenu_CK for Joomla! 1.6
 * @license		GNU/GPL
 * @version : 5.0
**/

// no direct access
defined('_JEXEC') or die('Restricted access');



?>
<!-- debut maximenu_CK, par cedric keiflin sur http://www.joomlack.fr -->
<?php if ($params->get('orientation', '0') == 1) {?>
<div class="maximenuCKV" id="<?php echo $params->get('menuid','maximenuCK'); ?>">
<?php } else { ?>
<div class="maximenuCKH" id="<?php echo $params->get('menuid','maximenuCK'); ?>">
<?php } ?>
    <div class="maxiRoundedleft"></div>
    <div class="maxiRoundedcenter">
	<ul class="menu<?php echo $params->get('moduleclass_sfx'); ?> maximenuCK">
		<?php 
			$user = & JFactory::getUser();
			$zindex = 12000;

			foreach ($items as $i => &$item)		{ 
                            
					if ($item->content) {
						echo '<li class="maximenuCK'.$item->classe.' level'.$item->level.'">'.$item->content;
					}
					elseif (isset($item->colonne)) {
						echo '</ul><div class="clr"></div></div><div class="maximenuCK2"><ul class="maximenuCK2">';
					}
					elseif ($item->title != "") {
                                                if ($params->get('imageonly', '0') == '1' || $item->img) $item->title ='';
						echo '<li class="maximenuCK'.$item->classe.' level'.$item->level.'" style="z-index : '.$zindex.';">';
								switch ($item->type) :
									default:
										echo '<a class="maximenuCK '.$item->anchor_css.'" href="'.$item->link.'" title="'.$item->anchor_title.'"'.$item->rel.'><span class="titreCK">'.$item->image.$item->title.'</span></a>';
										break;
									case 'separator':
										echo '<span class="separator '.$item->anchor_css.'"><span class="titreCK">'.$item->image.$item->title.'</span></span>';
										break;
									case 'url':
									case 'component':
										switch ($item->browserNav) :
											default:
											case 0:
												echo '<a class="maximenuCK '.$item->anchor_css.'" href="'.$item->link.'" title="'.$item->anchor_title.'"'.$item->rel.'><span class="titreCK">'.$item->image.$item->title.'</span></a>';
												break;
											case 1:
												// _blank
												echo '<a class="maximenuCK '.$item->anchor_css.'" href="'.$item->link.'" target="_blank" title="'.$item->anchor_title.'"'.$item->rel.'><span class="titreCK">'.$item->image.$item->title.'</span></a>';
												break;
											case 2:
												// window.open
												//$attribs = 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,'.$this->_params->get('window_open');
												echo '<a class="maximenuCK '.$item->anchor_css.'" href="'.$item->link.'&tmpl=component" onclick="window.open(this.href,\'targetWindow\',\'$attribs\');return false;" title="'.$item->anchor_title.'"'.$item->rel.'><span class="titreCK">'.$item->image.$item->title.'</span></a>';
												break;
										endswitch;
										break;
								endswitch;
					}
					
					if ($item->deeper)
					{	
						echo "\n\t<div class=\"floatCK".$item->divclasse."\"><div class=\"maxidrop-top\"></div><div class=\"maxidrop-main\"><div class=\"maximenuCK2 first\">\n\t<ul class=\"maximenuCK2\">";
					}
					// The next item is shallower.
					elseif ($item->shallower)
					{
						echo "\n\t</li>";
						
						echo str_repeat("\n\t</ul>\n\t<div class=\"clr\"></div></div><div class=\"clr\"></div></div><div class=\"maxidrop-bottom\"></div></div>\n\t</li>", $item->level_diff);
					}
					// the item is the last.
					elseif ($item->is_end)
					{		
						echo str_repeat("</li>\n\t</ul>\n\t<div class=\"clr\"></div></div><div class=\"clr\"></div></div><div class=\"maxidrop-bottom\"></div></div>", $item->level_diff);
						echo "</li>";
					}
					// The next item is on the same level.
					else {
						if (!isset($item->colonne)) echo "\n\t\t</li>\n";
					}
				
				$zindex--;
			}
		?>
	</ul>
    </div>
    <div class="maxiRoundedright"></div>
    <div style="clear:both;"></div>
</div>
<div style="clear:both;"></div>
<!-- fin maximenuCK -->
