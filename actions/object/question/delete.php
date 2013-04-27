<?php
$question = get_entity(get_input('guid'));

if (!$question instanceof ElggQuestion) {
	register_error("Invalid question guid!");
	forward(REFERER);
}

if (!$question->canEdit()) {
	register_error("You do not have permission to delete that question!");
	forward(REFERER);
}

$owner = $question->getContainerEntity();

$question->delete();

forward(get_input('forward', "questions/owner/$owner->guid"));
