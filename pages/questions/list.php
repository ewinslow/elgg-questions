<?php

$container_guid = get_input('container_guid', NULL);

$params = array();

$params['filter_context'] = $container_guid ? 'mine' : 'all';

$options = array(
	'type' => 'object',
	'subtype' => 'question',
	'full_view' => FALSE,
);

$loggedin_userid = elgg_get_logged_in_user_guid();
if ($container_guid) {
	$options['container_guid'] = $container_guid;
	$container = get_entity($container_guid);
	if (!$container) {

	}
	$params['title'] = elgg_echo('questions:title:user_questions', array($container->name));

	elgg_push_breadcrumb($container->name);

	if ($container_guid == $loggedin_userid) {
		$params['filter_context'] = 'mine';
	} else {
		// do not show button or select a tab when viewing someone else's posts
		$params['filter_context'] = 'none';
		$params['buttons'] = '';
	}

	if (elgg_instanceof($container, 'group')) {
		$params['filter'] = '';
		if ($container->isMember(elgg_get_logged_in_user_entity())) {
			$buttons = elgg_view('output/url', array(
				'href' => "pg/questions/add/$container->guid",
				'text' => elgg_echo("blog:add"),
				'class' => 'elgg-button elgg-button-action',
			));
			$params['buttons'] = $buttons;
		}
	}
} else {
	$params['filter_context'] = 'all';
	$params['title'] = elgg_echo('questions:title:all_questions');
}

$list = elgg_list_entities_from_metadata($options);
if (!$list) {
	$params['content'] = elgg_echo('questions:none');
} else {
	$params['content'] = $list;
}

$params['sidebar'] .= elgg_view('questions/sidebar', array('page' => $page_type));

$body = elgg_view_layout('content', $params);

echo elgg_view_page($params['title'], $body);

