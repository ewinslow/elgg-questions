<?php
/**
 * Add bookmark page
 *
 * @package questions
 */

$title = elgg_echo('questions:add');

elgg_push_breadcrumb($title);

$content = elgg_view_form('object/question/save');

$body = elgg_view_layout('content', array(
	'content' => $content,
	'title' => $title,
	'filter' => '',
	'header' => '',
));

echo elgg_view_page($title, $body);