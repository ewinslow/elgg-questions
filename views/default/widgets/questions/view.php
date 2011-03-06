<?php
/**
 *	QUESTIONS PLUGIN
 *	@package questions
 *	@author Javier Luces jluces@df-digital.com
 *	@license GNU General Public License (GPL) version 2
 *	@copyright (c) DF-Digital 2009
 *	@link http://www.df-digital.com
 **/
?>
<p>
	<?php

		// Get any wire notes to display
		// Get the current page's owner
		$page_owner = page_owner_entity();
		if ($page_owner === false || is_null($page_owner)) {
			$page_owner = $_SESSION['user'];
			set_page_owner($page_owner->getGUID());
		}

		$questions = $page_owner->getObjects('question', $vars['entity']->num_display);

		// If there are any questions to view, view them
		if (is_array($questions) && sizeof($questions) > 0) {

			foreach($questions as $question) {

				echo elgg_view_entity($question,false);

			}

		}

	?>
</p>