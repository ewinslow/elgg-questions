<?php
/**
 * River entry for new answers
 */

$statement = $vars['item'];
$performed_by = get_entity($statement->subject_guid);
$object = get_entity($statement->object_guid);

$url = elgg_view('output/url', array(
	'href' => $performed_by->getURL(),
	'text' => $performed_by->name,
	'encode_text' => TRUE,
));

echo elgg_echo("questions:river:answer:created", array($url)) . " ";
echo elgg_view('output/url', array(
	'href' => $answer->getURL(),
	'text' => elgg_echo("questions:river:answer:create"),
));
