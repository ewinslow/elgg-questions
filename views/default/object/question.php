<?php
/**
 * Elgg question view
 *
 * @package ElggBookmarks
 */

$full = elgg_extract('full', $vars, FALSE);
$question = elgg_extract('entity', $vars, FALSE);

if (!$question) {
	return;
}

$owner = $question->getOwnerEntity();
$owner_icon = elgg_view_entity_icon($owner, 'small');
$container = $question->getContainerEntity();
$categories = elgg_view('output/categories', $vars);

$title = elgg_view('output/text', array('value' => $question->title));
$description = elgg_view('output/longtext', array('value' => $question->description));

$owner_link = elgg_view('output/url', array(
	'href' => "questions/owner/$owner->username",
	'text' => $owner->name,
));
$author_text = elgg_echo('byline', array($owner_link));

$tags = elgg_view('output/tags', array('tags' => $question->tags));
$date = elgg_view_friendly_time($question->time_created);

$answers_count = $question->getAnswers(array('count' => TRUE));

//only display if there are commments
if ($answers_count != 0) {
	$text = elgg_echo("answers") . " ($answers_count)";
	$answers_link = elgg_view('output/url', array(
		'href' => $question->getURL() . '#answers',
		'text' => $text,
	));
} else {
	$answers_link = '';
}

$metadata = elgg_view_menu('entity', array(
	'entity' => $vars['entity'],
	'handler' => 'questions',
	'sort_by' => 'priority',
	'class' => 'elgg-menu-hz',
));

$subtitle = "$author_text $date $categories $answers_link";

// do not show the metadata and controls in widget view
if (elgg_in_context('widgets')) {
	$metadata = '';
}

if ($full && !elgg_in_context('gallery')) {

	$header = elgg_view_title($title);

	$body = $description;
	$body .= $tags;
	$body .= $categories;

	$question_info = elgg_view_image_block($owner_icon, $description);
	echo <<<HTML
$metadata
$header
$question_info
HTML;

} else {
	// brief view
	$excerpt = elgg_get_excerpt($question->description);

	$params = array(
		'entity' => $question,
		'metadata' => $metadata,
		'subtitle' => $subtitle,
		'tags' => $tags,
		'content' => $excerpt,
	);

	$body = elgg_view('page/components/summary', $params);
	echo elgg_view_image_block($owner_icon, $body);
}