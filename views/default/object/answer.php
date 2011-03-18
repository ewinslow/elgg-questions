<?php
/**
 * Elgg answer view
 *
 * @package Questions
 */

$full = elgg_extract('full', $vars, FALSE);

//if ($full) {
if (TRUE) {

	echo elgg_view('object/answer/full', $vars);

}
