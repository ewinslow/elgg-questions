<?php

$question = $vars['entity'];

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
?>

<div>
	<label for="question_title"><?php echo elgg_echo('title'); ?></label>
	<?php echo elgg_view('input/text', $title); ?>
</div>
<div>
	<label for="question_description"><?php echo elgg_echo('description'); ?></label>
	<?php echo elgg_view('input/longtext', $description); ?>
</div>
<div>
	<label for="question_tags"><?php echo elgg_echo('tags'); ?></label>
	<?php echo elgg_view('input/tags', $tags); ?>
</div>

<?php if (elgg_is_active_plugin('categories')): ?>
<div>
	<label for="question_categories"><?php echo elgg_echo('categories'); ?></label>
	<?php echo elgg_view('input/categories', $categories); ?>
</div>
<?php endif; ?>

<div>
<?php
	echo elgg_view('input/hidden', array('name' => 'container_guid', 'value' => elgg_get_page_owner_guid()));
	echo elgg_view('input/hidden', array('name' => 'guid', 'value' => $question->guid));
	echo elgg_view('input/submit', array('value' => elgg_echo('submit')));
?>
</div>