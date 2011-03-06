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
	//get data
	$page = get_input('page');

	$question = new ElggObject($vars['entity']->guid);
	$owner = $question->getOwnerEntity();

	echo $owner;
	$icon = elgg_view("profile/icon",array('entity' => $owner, 'size' => 'small'));

	$controls = "";
	$number_of_answers = $question->countEntitiesFromRelationship('answer');

	switch($question->open)
	{
		case 'true':
			$status = 'open';
			$action = 'close';
			break;
		case 'false':
			$status = 'close';
			$action = 'open';
			break;
		default:break;
	}
	$lock = '<div class="question_' . $status . '">';

	if( $number_of_answers > 0)
	{
		if($page <> "viewanswers")
		{
			$style = "_answered";
			$controls .= "<a href=\"" . $vars['url'] . "pg/questions/viewanswers/" . $question->guid .
						 "\">" . sprintf(elgg_echo('questions:body:viewanswers'),$number_of_answers) . "</a>&nbsp;&nbsp;";
		}
		else
		{
			$style = "_notanswered";
			if($number_of_answers == 1)
				$controls .= "<strong>".sprintf(elgg_echo('questions:body:numberofanswer'),$number_of_answers) . "</strong>&nbsp;&nbsp;";
			else
				$controls .= "<strong>".sprintf(elgg_echo('questions:body:numberofanswers'),$number_of_answers) . "</strong>&nbsp;&nbsp;";
		}
	}
	else
	{
		$style = "_notanswered";
		if(	$question->whoanswers == "common"
			||	$_SESSION['user']->admin
			||	$_SESSION['user']->siteadmin)
		{
			if($owner->guid <> $_SESSION['user']->getGUID())
				$controls .= "<a href=\"" . $vars['url'] . "pg/questions/answer/" . $question->guid . "\">" . elgg_echo('questions:body:answer') . "</a>&nbsp;&nbsp;";
		}
	}

	$interest = "";
	$array_interest = interesting_question($question);
	$interesting = $array_interest['interesting'];
	$not_interesting = $array_interest['not_interesting'];
	$interest .= "<strong>" . elgg_echo('questions:body:rate:interesting') . "</strong>&nbsp;";
	$link_interesting  = "<span style=\"color:green;\">" . sprintf(elgg_echo('questions:body:rate:yes'), $interesting) . "</span>&nbsp;";
	$link_not_interesting  = "<span style=\"color:red;\">" . sprintf(elgg_echo('questions:body:rate:no'), $not_interesting) . "</span>&nbsp;";

	if( can_rate_question( $_SESSION['user'] , $owner , $question ) )
	{
		$link_interesting  = "<a href=\"" . $vars['url'] . "action/questions/ratequestion?question_guid=" . $question->guid . "&interesting=yes\">$link_interesting</a>&nbsp;";
		$link_not_interesting  = "<a href=\"" . $vars['url'] . "action/questions/ratequestion?question_guid=" . $question->guid . "&interesting=no\">$link_not_interesting</a>&nbsp;";
	}


	$interest .= $link_interesting.$link_not_interesting;

	//question info
	$info_question = "<b>\"".$question->question."\"</b>";
	$info_time = sprintf(elgg_echo("questions:body:submittedby"), friendly_time($question->time_created), $ownertxt);
	$info_url = "<a href=\"" . $owner->getURL() . "\">" . $owner->name ."</a>";


	//setup admin controls
	if ($_SESSION['user']->getGUID() == $question->owner_guid || $_SESSION['user']->admin || $_SESSION['user']->siteadmin)
	{
		if( $number_of_answers > 0)
			$lock .= '<a href="' . $vars['url'] . "action/questions/" . $action . "question?question_guid=" . $question->guid . '" title="' . elgg_echo('questions:action:'. $action . 'question') .'"></a>';
		else
			$lock .='<img src="' . $vars['url'] . 'mod/questions/graphics/' . $status . 'question_20.png" title="' . elgg_echo('questions:status:'. $status . 'question') . '" align="left" style="padding-top:3px;" />';
		//this is for deleting the question (allowed by owner and admin)

		$controls .= "<a href=\"". $vars['url'] . "pg/questions/editquestion/" . $question->guid . "\">" . elgg_echo('questions:body:editquestion') . "</a>&nbsp;&nbsp;";
		$controls .= elgg_view("output/confirmlink", array(
		'href' => $vars['url'] . "action/questions/deletequestion?question_guid=" . $question->guid,
		'text' => elgg_echo('questions:body:deletequestion'),
		'confirm' => elgg_echo('questions:body:deletequestionconfirm')));
	}
	else
		$lock .='<img src="' . $vars['url'] . 'mod/questions/graphics/' . $status . 'question_20.png" title="' . elgg_echo('questions:status:'. $status . 'question') . '" align="left" style="padding-top:3px;" />';
	$lock .= '</div>';

	// In answer page, question has no controls.
	if($page == "answer") unset($controls);
?>
<div class="questions">
	<div class="question<?php echo $style; ?>">
		<!-- display the user icon -->
		<div class="questions_icon">
		    <?php
		        echo elgg_view("profile/icon",array('entity' => $question->getOwnerEntity(), 'size' => 'tiny'));
			?>
	    </div>
	    <div class="questions_title">
			<?php echo $lock; ?>
	    	<?php echo $question->title; ?>
	    </div>
	    <div class="clearfloat"></div>
		<div class="questions_body">
			<?php

						echo autop($question->question);

			?>
		</div>
		<p class="strapline">
			<?php

				echo sprintf(elgg_echo("questions:body:submittedby"),
								friendly_time($question->time_created), $ownertxt);
			 	echo "<a href=\"" . $owner->getURL() . "\">" . $owner->name ."</a>";

			?>
		</p>
		<!-- display tags -->
		<p class="tags">
			<?php

				echo elgg_view('output/tags', array('tags' => $question->tags));

			?>
		</p>
		<div class="clearfloat"></div>
		<div class="questions_rate">
		<p>
		<?php
			echo $interest
		?>
		</p>
		</div>
		<div class="clearfloat"></div>
		<!-- display edit options if it is the question owner -->
		<p class="options">
		<?php
			echo $controls;
		?>
		</p>
	</div>
</div>