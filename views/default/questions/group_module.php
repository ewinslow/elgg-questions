<?php
/**
 * List most recent questions on group profile page
 *
 * @package Questions
 */

$group = elgg_get_page_owner_entity();

if ($group->questions_enable == "no") {
	return true;
}

$all_link = elgg_view('output/url', array(
	'href' => "questions/group/$group->guid",
	'text' => elgg_echo('link:view:all'),
));

$header = "<span class=\"groups-widget-viewall\">$all_link</span>";
$header .= '<h3>' . elgg_echo('questions:group') . '</h3>';

elgg_push_context('widgets');
$options = array(
	'type' => 'object',
	'subtype' => 'question',
	'container_guid' => elgg_get_page_owner_guid(),
	'limit' => 6,
	'full_view' => false,
	'pagination' => false,
);
$content = elgg_list_entities($options);
elgg_pop_context();

if (!$content) {
	$content = '<p>' . elgg_echo('questions:none') . '</p>';
}

if ($group->canWriteToContainer()) {
	$new_link = elgg_view('output/url', array(
		'href' => "questions/add/$group->guid",
		'text' => elgg_echo('questions:add'),
	));
	$content .= "<span class='elgg-widget-more'>$new_link</span>";
}

echo elgg_view_module('info', '', $content, array('header' => $header));
