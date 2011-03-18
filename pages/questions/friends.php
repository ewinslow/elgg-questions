<?php
/**
 * Elgg questions plugin friends page
 *
 * @package ElggQuestions
 */

$owner = elgg_get_page_owner_entity();

elgg_push_breadcrumb($owner->name, "questions/owner/$owner->username");
elgg_push_breadcrumb(elgg_echo('friends'));

$title = elgg_echo('questions:friends');

$content = list_user_friends_objects($owner->guid, 'question', 10, false);

if (!$content) {
	$content = elgg_echo('questions:none');
}

$params = array(
	'title' => $title,
	'content' => $content,
);

$body = elgg_view_layout('content', $params);

echo elgg_view_page($title, $body);