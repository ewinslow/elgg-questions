<?php
$answer = get_entity(get_input('guid'));

if (!$answer instanceof ElggAnswer) {
	register_error("Invalid answer guid");
	forward(REFERER);
}

if (!$answer->canEdit()) {
	register_error("You do not have permission to delete that answer");
	forward(REFERER);
}

$question = $answer->getContainerEntity();

$answer->delete();

forward(get_input('forward', $question->getURL()));