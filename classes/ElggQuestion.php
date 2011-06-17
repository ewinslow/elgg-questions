<?php

class ElggQuestion extends ElggObject {
	protected function initializeAttributes() {
		parent::initializeAttributes();
		$this->attributes['subtype'] = 'question';
		$this->attributes['access_id'] = ACCESS_DEFAULT;
	}

	public function getAnswers(array $options = array()) {
		$defaults = array(
			'order_by' => 'time_created asc',
		);

		$overrides = array(
			'type' => 'object',
			'subtype' => 'answer',
			'container_guid' => $this->guid,
		);

		return elgg_get_entities(array_merge($defaults, $options, $overrides));
	}

	public function listAnswers(array $options = array()) {
		return elgg_list_entities($options, array($this, 'getAnswers'));
	}
}
