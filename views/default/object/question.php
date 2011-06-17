<?php
/**
 * Question entity view
 *
 * @package Questions
*/

$full = elgg_extract('full', $vars, FALSE);
$question = elgg_extract('entity', $vars, FALSE);

if (!$question) {
	return true;
}

$poster = $question->getOwnerEntity();
$container = $question->getContainerEntity();

$poster_icon = elgg_view_entity_icon($poster, 'small');
$poster_link = elgg_view('output/url', array(
	'href' => $poster->getURL(),
	'text' => $poster->name,
));
$poster_text = elgg_echo('questions:asked', array($poster->name));

$tags = elgg_view('output/tags', array('tags' => $question->tags));
$date = elgg_view_friendly_time($question->time_created);

$answers_link = '';
$answers_text = '';

$answer_options = array(
	'type' => 'object',
	'subtype' => 'answer',
	'container_guid' => $question->getGUID(),
	'count' => true,
);

$num_answers = elgg_get_entities($answer_options);

if ($num_answers != 0) {
	$last_answer_options = array(
		'limit' => 1,
		'count' => false,
	);

	$last_answer = elgg_get_entities(array_merge($answer_options, $last_answer_options));

	$poster = $last_answer[0]->getOwnerEntity();
	$answer_time = elgg_view_friendly_time($last_answer[0]->time_created);
	$answer_text = elgg_echo('questions:answered', array($poster->name, $answer_time));

	$answers_link = elgg_view('output/url', array(
		'href' => $question->getURL() . '#question-answers',
		'text' => elgg_echo('answers') . " ($num_answers)",
	));
}

$metadata = elgg_view_menu('entity', array(
	'entity' => $vars['entity'],
	'handler' => 'questions',
	'sort_by' => 'priority',
));

// do not show the metadata and controls in widget view
if (elgg_in_context('widgets')) {
	$metadata = '';
}

if ($full) {
	$subtitle = "$poster_text $date $answers_link";

	$params = array(
		'entity' => $question,
		'title' => false,
		'metadata' => $metadata,
		'subtitle' => $subtitle,
		'tags' => $tags,
	);
	$list_body = elgg_view('page/components/summary', $params);
	
	$list_body .= elgg_view('output/longtext', array('value' => $question->description));
	
	//feels hacky...
	$river_item = new ElggRiverItem();
	$river_item->object_guid = $question->guid;
	$list_body .= elgg_view('river/elements/footer', array('item' => $river_item));
	
	$body = elgg_view_image_block($poster_icon, $list_body);


	echo <<<HTML
$header
$body
HTML;

} else {
	// brief view
	$subtitle = "$poster_text $date $answers_link <span class=\"questions-latest-answer\">$answer_text</span>";

	$params = array(
		'entity' => $question,
		'metadata' => $metadata,
		'subtitle' => $subtitle,
		'tags' => $tags,
		'content' => $excerpt,
	);
	$list_body = elgg_view('page/components/summary', $params);

	echo elgg_view_image_block($poster_icon, $list_body);
}
