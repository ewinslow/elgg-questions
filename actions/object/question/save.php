<?php

elgg_make_sticky_form('question');

$guid = get_input('guid');

$question = new ElggQuestion($guid);

$adding = !$question->guid;

$editing = !$adding;

if ($editing && !$question->canEdit()) {
	register_error("You do not have permission to edit this question!");
	forward(REFERER);
}

$container_guid = get_input('container_guid');
if (!$container_guid) {
	$container_guid = elgg_get_logged_in_user_guid();
}

if ($adding && !can_write_to_container(0, $container_guid, 'object', 'question')) {
	register_error("You do not have permission to add questions here!");
	forward(REFERER);
}

$title = get_input('title', '', false);
$description = get_input('description');
$tags = string_to_tag_array(get_input('tags', ''));
$access_id = get_input('access_id', ACCESS_DEFAULT);

if (empty($container_guid) || empty($title) || empty($description)) {
	register_error("A title and description are required: $container_guid, $title, $description");
	forward(REFERER);
}

$question->title = $title;
$question->description = $description;
$question->tags = $tags;
$question->access_id = $access_id;
$question->container_guid = $container_guid;

try {
	$question->save();
	
	if ($adding) {
		add_to_river('river/object/question/create', 'create', elgg_get_logged_in_user_guid(), $question->guid, $question->access_id);
	}
} catch (Exception $e) {
	register_error("There was a problem saving your question!");
	register_error($e->getMessage());
	forward(REFERER);
}

elgg_clear_sticky_form('question');

$container = $question->getContainerEntity();
if ($container instanceof ElggUser) {
	$url = "/questions/owner/$container->username";
} else {
	$url = "/questions/group/$container->guid/all";
}

forward(get_input('forward', $adding ? $url : $question->getURL()));
