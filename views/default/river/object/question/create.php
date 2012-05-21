<?php
$statement = $vars['item'];
$performed_by = get_entity($statement->subject_guid);
$object = get_entity($statement->object_guid);

$title =$entity->title;
$url = elgg_view('output/url', array(
	'href' => $performed_by->getURL(),
	'text' => $performed_by->name,
	'encode_text' => TRUE,
));

echo elgg_echo("questions:river:question:created:by"questions:river:question:created:by", array($url)) . "";
echo elgg_view('output/url', array(
					'name' => 'newquestioncreated',
					'href' => $object->getURL(),
					'text' => elgg_echo('question:view'),

				));
