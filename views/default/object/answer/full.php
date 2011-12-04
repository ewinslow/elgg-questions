<?php
$answer = $vars['entity'];

$image = elgg_view_entity_icon(get_entity($answer->owner_guid), 'small');

$body = elgg_view_menu('entity', array(
	'entity' => $vars['entity'],
	'handler' => 'answers',
	'sort_by' => 'priority',
	'class' => 'elgg-menu-hz',
));

$body .= elgg_view('output/longtext', array('value' => $answer->description));

//feels hacky...
$river_item = new ElggRiverItem();
$river_item->object_guid = $answer->guid;
$body .= elgg_view('river/elements/footer', array('item' => $river_item));

echo elgg_view_image_block($image, $body);