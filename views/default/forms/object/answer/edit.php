<?php

$answer = $vars['entity'];

$description = array(
	'name' => 'description',
	'id' => 'answer_description',
	'value' => $answer->description,
);

echo elgg_view('input/longtext', $description);
echo elgg_view('input/hidden', array('name' => 'container_guid', 'value' => $answer->container_guid));
echo elgg_view('input/hidden', array('name' => 'guid', 'value' => $answer->guid));
echo elgg_view('input/submit', array('value' => elgg_echo('submit')));
