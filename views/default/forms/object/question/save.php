<?php

$question = $vars['entity'];

if (!$question) {
	$question = new ElggQuestion();
	$question->container_guid = elgg_get_page_owner_guid();
}

$title = array(
	'name' => 'title',
	'id' => 'question_title',
	'value' => $question->title,
);

$description = array(
	'name' => 'description',
	'id' => 'question_description',
	'value' => $question->description,
);

$tags = array(
	'name' => 'tags',
	'id' => 'question_tags',
	'value' => $question->tags,
);

$categories = array(
	'name' => 'categories',
	'id' => 'question_categories',
	'value' => $question->categories,
);

$access_id = array(
	'name' => 'access_id',
	'id' => 'question_access_id',
	'value' => $question->access_id,
);
?>

<div>
	<label for="question_title"><?php echo elgg_echo('object:question:title'); ?></label>
	<?php echo elgg_view('input/text', $title); ?>
</div>
<div>
	<label for="question_description"><?php echo elgg_echo('object:question:description'); ?></label>
	<?php echo elgg_view('input/longtext', $description); ?>
</div>
<div>
	<label for="question_tags"><?php echo elgg_echo('tags'); ?></label>
	<?php echo elgg_view('input/tags', $tags); ?>
</div>

<?php if (elgg_view_exists('input/categories')): ?>
<div>
	<label for="question_categories"><?php echo elgg_echo('categories'); ?></label>
	<?php echo elgg_view('input/categories', $categories); ?>
</div>
<?php endif; ?>

<div>
	<label for="question_access_id"><?php echo elgg_echo('access'); ?></label>
	<?php echo elgg_view('input/access', $access_id); ?>
</div>

<div>
<?php
	echo elgg_view('input/hidden', array('name' => 'container_guid', 'value' => $question->container_guid));
	echo elgg_view('input/hidden', array('name' => 'guid', 'value' => $question->guid));
	echo elgg_view('input/submit', array('value' => elgg_echo('submit')));
?>
</div>