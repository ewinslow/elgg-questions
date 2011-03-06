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
	//get data
	$question = new ElggObject($_SESSION['question_guid']);
	$answer = new ElggObject($vars['entity']->guid);
	$page = get_input('page');
	$owner = $answer->getOwnerEntity();
	echo $owner;
	$icon = elgg_view("profile/icon",array('entity' => $owner, 'size' => 'small'));

	//answer info
	$info_answer = "<b>\"".$answer->answer."\"</b>";
	$info_time = sprintf(elgg_echo("questions:body:submittedby"), friendly_time($answer->time_created), $ownertxt);
	$info_url = "<a href=\"" . $owner->getURL() . "\">" . $owner->name ."</a>";

	//setup admin controls
	$controls = "";

	$helpful = "";
	$array_helpful = helpful_answer($answer);
	$yes_helpful = $array_helpful['helpful'];
	$not_helpful = $array_helpful['not_helpful'];
	$helpful .= "<strong>" . elgg_echo('questions:body:rate:helpful') . "</strong>&nbsp;";

	$link_helpful  = "<span style=\"color:green;\">" . sprintf(elgg_echo('questions:body:rate:yes'), $yes_helpful) . "</span>&nbsp;";
	$link_not_helpful  = "<span style=\"color:red;\">" . sprintf(elgg_echo('questions:body:rate:no'), $not_helpful) . "</span>&nbsp;";

	if( can_rate_answer( $_SESSION['user'] , $owner , $answer ) )
	{
		$link_helpful  = "<a href=\"" . $vars['url'] . "action/questions/rateanswer?answer_guid=" . $answer->guid . "&helpful=yes\">$link_helpful</a>&nbsp;";
		$link_not_helpful  = "<a href=\"" . $vars['url'] . "action/questions/rateanswer?answer_guid=" . $answer->guid . "&helpful=no\">$link_not_helpful</a>&nbsp;";
	}



	$helpful .= $link_helpful.$link_not_helpful;

	if (($_SESSION['user']->getGUID() == $answer->owner_guid
		|| $_SESSION['user']->getGUID() == $question->owner_guid
		|| $_SESSION['user']->admin
		|| $_SESSION['user']->siteadmin)
		&& $question->open =='true')
	{
		if(	$_SESSION['user']->getGUID() == $answer->owner_guid
			|| $_SESSION['user']->admin
			|| $_SESSION['user']->siteadmin)
			$controls .= "<a href=\"". $vars['url'] . "pg/questions/editanswer/" . $answer->guid . "\">" . elgg_echo('questions:body:editanswer') . "</a>&nbsp;&nbsp;";

		$controls .= elgg_view("output/confirmlink", array(
		'href' => $vars['url'] . "action/questions/deleteanswer?answer_guid=" . $answer->guid . "&question_guid=" . $question->guid,
		'text' => elgg_echo('questions:body:deleteanswer'),
		'confirm' => elgg_echo('questions:body:deleteanswerconfirm')));
	}
?>
<div class="questions">
	<a name="<?php echo $answer->guid; ?>"></a>
	<div class="answer">
		<!-- display the user icon -->
		<div class="questions_icon">
		    <?php
		        echo elgg_view("profile/icon",array('entity' => $answer->getOwnerEntity(), 'size' => 'tiny'));
			?>
	    </div>
		<div class="questions_body">
			<?php

						echo autop($answer->answer);

			?>
		</div>
		<p class="strapline">
			<?php

				echo sprintf(elgg_echo("questions:body:submittedby"),
								friendly_time($answer->time_created), $ownertxt);
			 	echo "<a href=\"" . $owner->getURL() . "\">" . $owner->name ."</a>";

			?>
		</p>
		<!-- display tags -->
		<p class="tags">
			<?php

				echo elgg_view('output/tags', array('tags' => $answer->tags));

			?>
		</p>
		<div class="clearfloat"></div>
		<div class="questions_rate">
		<p>
		<?php
			echo $helpful;
		?>
		</p>
		</div>
		<div class="clearfloat"></div>
		<!-- display edit options if it is the answer owner -->
		<p class="options">
		<?php
			echo $controls;
		?>
		</p>
	</div>
</div>