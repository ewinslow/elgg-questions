<?php

elgg_make_sticky_form('answer');

$guid = get_input('guid');

$answer = new ElggAnswer($guid);

$adding = !$answer->guid;

$editing = !$adding;

if ($editing && !$answer->canEdit()) {
	register_error("You do not have permission to edit this answer!");
	forward(REFERER);
}

$container_guid = get_input('container_guid');
if (!$container_guid) {
	$container_guid = elgg_get_logged_in_user_guid();
}

if ($adding && !can_write_to_container(0, $container_guid, 'object', 'answer')) {
	register_error("You do not have permission to answer that question!");
	forward(REFERER);
}

$question = get_entity($container_guid);

$description = get_input('description');

if (empty($container_guid) || empty($description)) {
	register_error("A body is required: $container_guid, $title, $description");
	forward(REFERER);
}

$answer->description = $description;
$answer->access_id = $question->access_id;
$answer->container_guid = $container_guid;

try {
	$answer->save();
	
	if ($adding) {
		add_to_river('river/object/answer/create', 'create', elgg_get_logged_in_user_guid(), $answer->guid, $answer->access_id);
	}
} catch (Exception $e) {
	register_error("There was a problem saving your answer!");
	register_error($e->getMessage());
}

elgg_clear_sticky_form('answer');

forward(get_input('forward', $answer->getURL()));
