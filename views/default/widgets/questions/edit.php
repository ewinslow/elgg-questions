<?php
/**
 *	QUESTIONS PLUGIN
 *	@package questions
 *	@author Javier Luces jluces@df-digital.com
 *	@license GNU General Public License (GPL) version 2
 *	@copyright (c) DF-Digital 2009
 *	@link http://www.df-digital.com
 **/
?>
	<p>
		<?php echo elgg_echo("questions:widgets:numberofquestions"); ?>
		<select name="params[num_display]">
		    <option value="1" <?php if($vars['entity']->num_display == 1) echo "SELECTED"; ?>>1</option>
		    <option value="2" <?php if($vars['entity']->num_display == 2) echo "SELECTED"; ?>>2</option>
		    <option value="3" <?php if($vars['entity']->num_display == 3) echo "SELECTED"; ?>>3</option>
		    <option value="4" <?php if($vars['entity']->num_display == 4) echo "SELECTED"; ?>>4</option>
		    <option value="5" <?php if($vars['entity']->num_display == 5) echo "SELECTED"; ?>>5</option>
		    <option value="6" <?php if($vars['entity']->num_display == 6) echo "SELECTED"; ?>>6</option>
		</select>
	</p>