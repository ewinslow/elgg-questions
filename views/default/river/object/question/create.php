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
<?php

	$statement = $vars['statement'];
	$performed_by = $statement->getSubject();
	$object = $statement->getObject();

	$url = "<a href=\"{$performed_by->getURL()}\">{$performed_by->name}</a>";
	$string = sprintf(elgg_echo("questions:river:question:created"),$url) . " ";
	$string .= "<a href=\"" . $object->getURL() . "\">" . elgg_echo("questions:river:question:create") . "</a>";

?>

<?php echo $string; ?>