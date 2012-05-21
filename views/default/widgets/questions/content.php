<?php
/**
 *	Questions widget content
 **/

$widget = $vars['entity'];

// Get any wire notes to display
// Get the current page's owner
$page_owner = elgg_get_page_owner_entity();
if ($page_owner === false || is_null($page_owner)) {
	$page_owner = elgg_get_logged_in_user_entity();
	elgg_set_page_owner_guid($page_owner->getGUID());
}

echo elgg_list_entities(array(
	'type' => 'object',
	'subtype' => 'question',
	'container_guid' => $page_owner->guid,
	'limit' => $widget->limit,
));
