<?php
/**
 * Elgg questions plugin everyone page
 *
 * @package Questions
 */

$page_owner = elgg_get_page_owner_entity();

elgg_push_breadcrumb($page_owner->name);

$title = elgg_echo('questions:owner', array($page_owner->name));

$content = elgg_list_entities(array(
	'type' => 'object',
	'subtype' => 'question',
	'container_guid' => $page_owner->guid,
	'full_view' => false,
	'list_type_toggle' => false
));

if (!$content) {
	$content = elgg_echo('questions:none');
}

$vars = array(
	'title' => $title,
	'content' => $content,
);

// don't show filter if out of filter context
if ($page_owner instanceof ElggGroup) {
	$vars['filter'] = false;
}

$body = elgg_view_layout('content', $vars);

echo elgg_view_page($title, $body);