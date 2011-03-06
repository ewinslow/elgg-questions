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
	require_once(dirname(dirname(dirname(dirname((__FILE__)))))."/utilities/utilities.php");

	global $CONFIG;
	$answers_perpage = get_plugin_setting('answers_perpage');
	$limit = $answers_perpage;
	$offset = get_input('offset', 0);
	$order_by = get_input('order_by','time_created');
	$criteria = get_input('criteria','asc');

	$question = new ElggObject($_SESSION['question_guid']);
	$owner = $question->getOwnerEntity();

	if($order_by == 'time_created')
	{
		switch($criteria)
		{
			case 'asc':
				$count_answers = get_entities_from_relationship('answer',$question->guid,false,'object','answer',0,'time_created asc',$limit,$offset,true);
				$answers = get_entities_from_relationship('answer',$question->guid,false,'object','answer',0,'time_created asc',$limit,$offset);
				break;
			case 'desc':
				$count_answers = get_entities_from_relationship('answer',$question->guid,false,'object','answer',0,'time_created desc',$limit,$offset,true);
				$answers = get_entities_from_relationship('answer',$question->guid,false,'object','answer',0,'time_created desc',$limit,$offset);
				break;
			default:break;
		}
	}
	else
	{
		$answers = $question->getEntitiesFromRelationship("answer",false,1000);
		$count_answers = count($answers);
		$answers = order_answers_by_criteria($answers , $order_by , $criteria , $limit , $offset);
	}
?>
	<h3>
		<?php echo elgg_echo('questions:viewanswers:question'); ?>
	</h3>
		<?php echo elgg_view_entity($question); ?>
	<h3>
		<?php echo elgg_echo('questions:viewanswers:answers'); ?>
	</h3>

<?php	if ($answers){
			order_answer_links($vars['url'],$question->guid);
			echo elgg_view_entity_list($answers,$count_answers,$offset,$limit,true,false,true);
		}
		else echo elgg_echo('questions:body:noanswers');
?>
<?php
	if(	$question->whoanswers == "common"
		||	$_SESSION['user']->admin
		||	$_SESSION['user']->siteadmin)
	{
		if($owner->guid <> $_SESSION['user']->getGUID() && $question->open == 'true')
		{
			$form = elgg_view("forms/questions/addanswer");

			echo $form;
		}
	}
?>

