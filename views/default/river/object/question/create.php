<?php
/**
 *	QUESTIONS PLUGIN
 *	@package questions
 *	@author Javier Luces jluces@df-digital.com
 *	@license GNU General Public License (GPL) version 2
 *	@copyright (c) DF-Digital 2009
 *	@link http://www.df-digital.com
 */

$statement = $vars['item'];
$performed_by = get_entity($statement->subject_guid);
$object = get_entity($statement->object_guid);

$url = elgg_view('output/url', array(
	'href' => $performed_by->getURL(),
	'text' => $performed_by->name,
	'encode_text' => TRUE,
));

echo elgg_echo("questions:river:question:created", array($url)) . " ";
echo elgg_view('output/url', array(
	'href' => $object->getURL(),
	'text' => elgg_echo("questions:river:question:create"),
));
