<?php

function questions_init() {
	objects_init('questions', 'question', 'ElggQuestion');

	$plugin_dir = dirname(__FILE__);

	elgg_register_entity_url_handler('object', 'answer', 'answers_url');

	$actions_base = "$plugin_dir/actions/object/answer";
	elgg_register_action('object/answer/add', "$actions_base/save.php");
	elgg_register_action('object/answer/edit', "$actions_base/save.php");
}

function answers_url($answer) {
	return get_entity($answer->container_guid)->getURL() . "#answer-$answer->guid";
}

elgg_register_event_handler('init', 'system', 'questions_init');
