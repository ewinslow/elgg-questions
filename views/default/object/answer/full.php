<?php
$answer = $vars['entity'];

$image = elgg_view_entity_icon(get_entity($answer->owner_guid), 'small');

$body = elgg_view('output/longtext', array('value' => $answer->description));

echo elgg_view_image_block($image, $body);