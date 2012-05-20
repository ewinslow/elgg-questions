<?php
/**
* Add question page
* Lianglee, ewinslow
* @package ElggQuestions
*/

$question_guid = get_input('guid');
$question = get_entity($question_guid);

if (!elgg_instanceof($question, 'object', 'question') || !$question->canEdit()) {
register_error(elgg_echo('questions:unknown'));
forward(REFERRER);
}

$title = elgg_echo('questions:edit');

elgg_push_breadcrumb($title);

$vars = array(
'entity' => $question,
);

$content = elgg_view_form('object/question/save', array(), $vars);

$body = elgg_view_layout('content', array(
'content' => $content,
'title' => $title,
'filter' => '',
'header' => '',));
echo elgg_view_page($title, $body);