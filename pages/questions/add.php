<?php
gatekeeper();

$container_guid = get_input('container_guid', elgg_get_logged_in_user_guid());

$container = get_entity($container_guid);

elgg_push_breadcrumb(elgg_echo('questions:add'));

$body_vars = array(
	'container_guid' => $container->guid,
);

$params = array();

$params['filter_override'] = '';
$params['buttons'] = '';

$params['title'] = elgg_echo('questions:add');

$params['content'] = elgg_view_form('object/question/add', array('name' => 'question'), $body_vars);

$params['sidebar'] = elgg_view('questions/sidebar', array('page' => 'add'));

$body = elgg_view_layout('content', $params);

echo elgg_view_page($params['title'], $body);