<?php

function questions_init() {
	elgg_register_library("elgg:questions", dirname(__FILE__) . "/lib/questions.php");
	
	add_subtype("object", 'question', 'ElggQuestion');
	update_subtype("object", 'question', 'ElggQuestion');
	
	elgg_extend_view("css/elgg", "questions/css");
	elgg_extend_view("js/elgg", "questions/js");
	
	elgg_register_menu_item("site", array(
		"name" => 'questions',
		"text" => elgg_echo('questions'),
		"href" => "/questions/all",
	));
	
	elgg_register_entity_type("object", 'questions');
	elgg_register_widget_type('questions', elgg_echo("widget:questions:title"), elgg_echo("widget:questions:description"));
	
	$actions_base = dirname(__FILE__) . '/actions/object/question';
	elgg_register_action("object/question/save", "$actions_base/save.php");
	elgg_register_action("object/question/delete", "$actions_base/delete.php");
	
	elgg_register_entity_url_handler('object', 'questions', 'questions_url_handler');
	
	$plugin_dir = dirname(__FILE__);

	elgg_register_entity_url_handler('object', 'answer', 'answers_url');

	elgg_register_page_handler('questions', 'questions_page_handler');
	
	$actions_base = "$plugin_dir/actions/object/answer";
	elgg_register_action('object/answer/add', "$actions_base/save.php");
	elgg_register_action('object/answer/edit', "$actions_base/save.php");
	
	elgg_register_plugin_hook_handler("register", "menu:owner_block", 'questions_owner_block_menu_handler');
	elgg_register_plugin_hook_handler("register", "menu:user_hover", 'questions_user_hover_menu_handler');
	elgg_register_plugin_hook_handler("notify:entity:message", "object", 'questions_notify_message_handler');
	
	add_group_tool_option('questions', elgg_echo("questions:enable"), true);
	elgg_extend_view("groups/tool_latest", "questions/group_module");
}	

function questions_notify_message_handler($hook, $entity_type, $returnvalue, $params) {
	$entity = $params['entity'];
	$to_entity = $params['to_entity'];
	$method = $params['method'];

	if (elgg_instanceof($entity, 'object', 'question')) {
		$descr = $entity->description;
		$title = $entity->title;
		$url = $entity->getURL();
		$owner = $entity->getOwnerEntity();
		$via = elgg_echo("questions:via");

		if ($method == 'sms') {
			//shortening the url for sms
			$url = elgg_get_site_url() . "view/$entity->guid";
			return "$owner->name $via: $url ($title)";
		}

		if ($method == 'email') {
			return "$owner->name $via: $title \n\n $descr \n\n $url";
		}

		if ($method == 'web') {
			return "$owner->name $via: $title \n\n $descr \n\n $url";
		}
	}

	return null;
}

function objects_page_handler($segments) {
	elgg_push_breadcrumb(elgg_echo('questions'), "/questions/all");

	$pages = dirname(__FILE__) . "/pages/questions";

	switch ($segments[0]) {
		case "all":
			include "$pages/all.php";
			break;

		case "owner":
			include "$pages/owner.php";
			break;

		case "friends":
			gatekeeper();
			include "$pages/friends.php";
			break;

		case "view":
			set_input('guid', $segments[1]);
			include "$pages/view.php";
			break;

		case "add":
			gatekeeper();
			include "$pages/add.php";
			break;

		case "edit":
			gatekeeper();
			set_input('guid', $segments[1]);
			include "$pages/edit.php";
			break;

		case 'group':
			group_gatekeeper();
			include "$pages/owner.php";
			break;

		default:
			return false;
	}

	elgg_pop_context();

	return true;

}

function questions_url_handler($question) {
	return "/questions/view/$question->guid/" . elgg_get_friendly_title($question->title);
}

function answers_url($answer) {
	return get_entity($answer->container_guid)->getURL() . "#answer-$answer->guid";
}

elgg_register_event_handler('init', 'system', 'questions_init');
