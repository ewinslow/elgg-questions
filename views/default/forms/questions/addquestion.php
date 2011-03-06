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
		$title = $vars['entity']->title;
		$action = "action/questions/editquestion";
		$question = $vars['entity']->question;
		$whoanswers = $vars['entity']->whoanswers;
		$tags = $vars['entity']->tags;
		$access_id = $vars['entity']->access_id;
	} else  {
		$title = "";
		$action = "action/questions/addquestion";
		$question = "";
		$whoanswers = "admin";
		$tags = "";
		$access_id = 0;
	}
	switch($whoanswers)
	{
		case 'admin':
			$admin = 'selected="selected"';
			$common = '';
			break;
		case 'common':
			$admin = '';
			$common = 'selected="selected"';
			break;
		default:break;
	}
?>
<form action="<?php echo $vars['url'] . $action; ?>" enctype="multipart/form-data" method="post">
	<?php $question_fields = array( 'title' => 'text', 'question' => 'longtext',  'tags' => 'tags' );

		foreach($question_fields as $shortname => $valtype)
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
		<label>
			<?php echo elgg_echo('questions:form:whoanswers'); ?><br />
			<select name="whoanswers">
				<option <?php echo $admin; ?> value="admin"><?php echo elgg_echo('questions:form:user:admin'); ?></option>
				<option <?php echo $common; ?> value="common"><?php echo elgg_echo('questions:form:user:common'); ?></option>
			</select>
		</label>
	</p>

	<p>
		<label>
			<?php echo elgg_echo('questions:form:access'); ?><br />
			<?php echo elgg_view('input/access', array('internalname' => 'access_id','value' => $vars['entity']->access_id )); ?>
		</label>
	</p>

	<p>
		<input type="hidden" name="question_guid" value="<?php echo $vars['entity']->guid; ?>" />
		<input type="submit" class="submit_button" value="<?php echo elgg_echo("save"); ?>" />
	</p>

</form>