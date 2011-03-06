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
	global $CONFIG;
	$page = get_input("page");
	if($page=="")
		$page = "home";
	elseif(	$page == "answer"
			|| $page == "viewanswers"
			|| $page == "editquestion"
			|| $page == "closequestion"
			|| $page == "openquestion"
			|| $page == "deletequestion"
			|| $page == "ratequestion")
	{
		$params = explode('/',$_REQUEST["page"]);
		$_SESSION['question_guid'] = $params[1];
	}
	elseif(	$page == "deleteanswer"
			|| $page == "editanswer"
			|| $page == "rateanswer")
	{
		$params = explode('/',$_REQUEST["page"]);
		$answer = get_entity($params[1]);
		$answer_guid = $answer->guid;
		$_SESSION['answer_guid'] = $answer_guid;
	}

	set_context('questions');

	$title_string = "questions:title:".$page;

	$view_string = "questions/".$page;

	$title = elgg_view_title(elgg_echo($title_string));

	//main page area
	$area1 = $title;
	$area1 .= elgg_view($view_string,$vars);

	$content = elgg_view_layout("two_column_left_sidebar", '', $area1);
	page_draw(elgg_echo('questions:titlebar'), $content);
?>