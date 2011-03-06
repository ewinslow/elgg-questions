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
	if (isset($vars['entity'])) {
		$title = sprintf(elgg_echo("questions:title:editanswer"),$object->title);
		$action = "action/questions/editanswer";
		$answer = $vars['entity']->answer;
		$tags = $vars['entity']->tags;
	} else  {
		$title = elgg_echo("questions:title:answer");
		$action = "action/questions/addanswer";
		$answer = "";
		$tags = "";
	}
?>
<form action="<?php echo $vars['url'] . $action; ?>" enctype="multipart/form-data" method="post">
	<?php $answer_fields = array( 'answer' => 'longtext',  'tags' => 'tags' );

		foreach($answer_fields as $shortname => $valtype)
		{
	?>
	<p>
		<label>
			<?php echo elgg_echo("questions:form:{$shortname}") ?><br />
			<?php echo elgg_view("input/{$valtype}",array(
															'internalname' => $shortname,
															'value' => $vars['entity']->$shortname,
															)); ?>
		</label>
	</p>
	<?php

		}

	?>
	<p>
		<input type="hidden" name="question_guid" value="<?php echo $_SESSION['question_guid']; ?>" />
		<input type="hidden" name="answer_guid" value="<?php echo $vars['entity']->guid; ?>" />
		<input type="submit" class="submit_button" value="<?php echo elgg_echo("save"); ?>" />
	</p>

</form>