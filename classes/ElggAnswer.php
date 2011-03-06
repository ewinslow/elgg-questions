<?php

class ElggAnswer extends ElggObject {

	function initializeAttributes() {
		parent::initializeAttributes();
		$this->attributes['subtype'] = 'answer';
	}

}