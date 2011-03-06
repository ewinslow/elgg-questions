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
<?php
	gatekeeper();

	$form = elgg_view("forms/questions/addquestion");

	//$body = elgg_view_layout('two_column_left_sidebar', $area1, $area2);

	echo $form;

	//page_draw($title, $body);
?>