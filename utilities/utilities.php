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

	function can_rate_question( ElggUser $user , ElggUser $question_owner , ElggObject $question )
	{
		if( $user->getGUID() == $question_owner->getGUID() )
			return false;

		$annotations = $question->getAnnotations("interesting");

		foreach ($annotations as $annotation)
		{
			if ($annotation->owner_guid == $user->getGUID())
			{
				return false;
			}
		}
		return true;
	}

	function can_rate_answer( ElggUser $user , ElggUser $answer_owner , ElggObject $answer )
	{
		if( $user->getGUID() == $answer_owner->getGUID() )
			return false;

		$annotations = $answer->getAnnotations("helpful");

		foreach ($annotations as $annotation)
		{
			if ($annotation->owner_guid == $user->getGUID())
			{
				return false;
			}
		}
		return true;
	}

	function interesting_question( ElggObject $question )
	{
		$interesting = 0;
		$not_interesting = 0;
		$annotations = $question->getAnnotations("interesting");
		foreach($annotations as $annotation)
		{
			if( $annotation->value == "yes" ) $interesting++;
			else $not_interesting++;
		}
		return array( 'interesting' => $interesting , 'not_interesting' => $not_interesting );
	}

	function helpful_answer( ElggObject $answer )
	{
		$helpful = 0;
		$not_helpful = 0;
		$annotations = $answer->getAnnotations("helpful");
		foreach($annotations as $annotation)
		{
			if( $annotation->value == "yes" ) $helpful++;
			else $not_helpful++;
		}
		return array( 'helpful' => $helpful , 'not_helpful' => $not_helpful );
	}

	function order_answers_by_criteria( $answers , $order_by , $criteria, $limit , $offset)
	{
		$answers_ordered = array();

		foreach( $answers as $answer )
		{
			$index = 0;
			switch( $order_by )
			{
				case 'owner':
					$owner = get_user($answer->owner_guid);
					$index = strtoupper($owner->name);
					break;
				case 'helpful':
					$index = calculate_helpful_value($answer);
					break;
				default:
					$index = $answer->guid;
					break;
			}
			$answers_ordered[$index][] = $answer;
		}

		ksort( $answers_ordered );

		$answers_ordered = matrix_to_array( $answers_ordered );

		if( $criteria == 'desc' )
			$answers_ordered = array_reverse( $answers_ordered );

		return array_slice($answers_ordered,$offset,$limit);
	}

	function order_questions_by_criteria( $questions , $order_by , $criteria , $limit , $offset )
	{
		$questions_ordered = array();

		foreach( $questions as $question )
		{
			$index = 0;
			switch( $order_by )
			{
				case 'num_of_answers':
					$index = $question->countEntitiesFromRelationship( 'answer' );
					break;
				case 'owner':
					$owner = get_user($question->owner_guid);
					$index = strtoupper($owner->name);
					break;
				case 'interesting':
					$index = calculate_interest_value($question);
					break;
				default:
					$index = $question->guid;
					break;
			}
			$questions_ordered[$index][] = $question;
		}

		ksort( $questions_ordered );

		$questions_ordered = matrix_to_array( $questions_ordered );

		if( $criteria == 'desc' )
			$questions_ordered = array_reverse( $questions_ordered );
		//return $questions_ordered;
		return array_slice($questions_ordered,$offset,$limit);
	}

	function matrix_to_array( $matrix )
	{
		$return = array();
		foreach( $matrix as $array )
		{
			foreach( $array as $element )
				$return[] = $element;
		}
		return $return;
	}

	function calculate_interest_value(ElggObject $question)
	{
		$interesting = 0;
		$not_interesting = 0;

		$annotations = $question->getAnnotations("interesting");

		foreach( $annotations as $annotation )
		{
			if( $annotation->value == "yes" )
				$interesting++;
			else
				$not_interesting++;
		}

		return $interesting-$not_interesting;
	}

	function calculate_helpful_value(ElggObject $answer)
	{
		$helpful = 0;
		$not_helpful = 0;

		$annotations = $answer->getAnnotations("helpful");

		foreach( $annotations as $annotation )
		{
			if( $annotation->value == "yes" )
				$helpful++;
			else
				$not_helpful++;
		}

		return $helpful-$not_helpful;
	}

	function order_question_links($url,$page)
	{
		$asc = elgg_echo('questions:ordering:asc');
		$desc = elgg_echo('questions:ordering:desc');

		$links = '<div class="questions_links">';
		$links .= '<a href="' . $url . 'pg/questions/'.$page.'?order_by=time_created&criteria=asc" title="'.$asc.'">
				<img src="' . $url . 'mod/questions/graphics/arrowup_15.png" /></a>';
		$links .= '<a href="' . $url . 'pg/questions/'.$page.'?order_by=time_created&criteria=desc" title="'.$desc.'">
				<img src="' . $url . 'mod/questions/graphics/arrowdown_15.png" /></a>&nbsp;'.elgg_echo('questions:ordering:time_created').'&nbsp;&nbsp;';

		if($page <> 'notanswered' && $page <> 'yournotanswered')
		{
			$links .= '<a href="' . $url . 'pg/questions/'.$page.'?order_by=num_of_answers&criteria=asc" title='.$asc.'>
					<img src="' . $url . 'mod/questions/graphics/arrowup_15.png" /></a>';
			$links .= '<a href="' . $url . 'pg/questions/'.$page.'?order_by=num_of_answers&criteria=desc" title="'.$desc.'">
					<img src="' . $url . 'mod/questions/graphics/arrowdown_15.png" /></a>&nbsp;'.elgg_echo('questions:ordering:num_of_answers').'&nbsp;&nbsp;';
		}
		if($page <> 'yours' && $page <> 'youranswered' && $page <> 'yournotanswered')
		{
			$links .= '<a href="' . $url . 'pg/questions/'.$page.'?order_by=owner&criteria=asc" title="'.$asc.'">
					<img src="' . $url . 'mod/questions/graphics/arrowup_15.png" /></a>';
			$links .= '<a href="' . $url . 'pg/questions/'.$page.'?order_by=owner&criteria=desc" title="'.$desc.'">
					<img src="' . $url . 'mod/questions/graphics/arrowdown_15.png" /></a>&nbsp;'.elgg_echo('questions:ordering:username').'&nbsp;&nbsp;';
		}
		$links .= '<a href="' . $url . 'pg/questions/'.$page.'?order_by=interesting&criteria=asc" title="'.$asc.'">
				<img src="' . $url . 'mod/questions/graphics/arrowup_15.png" /></a>';
		$links .= '<a href="' . $url . 'pg/questions/'.$page.'?order_by=interesting&criteria=desc" title="'.$desc.'">
				<img src="' . $url . 'mod/questions/graphics/arrowdown_15.png" /></a>&nbsp;'.elgg_echo('questions:ordering:interesting').'&nbsp;&nbsp;';
		$links .= '</div>';
		$links .= '<div class="clearfloat"></div>';
		echo $links;
	}

	function order_answer_links($url,$question_guid)
	{
		$asc = elgg_echo('questions:ordering:asc');
		$desc = elgg_echo('questions:ordering:desc');

		$links = '<div class="questions_links">';
		$links .= '<a href="' . $url . 'pg/questions/viewanswers/' . $question_guid . '?order_by=time_created&criteria=asc" title="'.$asc.'">
				<img src="' . $url . 'mod/questions/graphics/arrowup_15.png" /></a>';
		$links .= '<a href="' . $url . 'pg/questions/viewanswers/' . $question_guid . '?order_by=time_created&criteria=desc" title="'.$desc.'">
				<img src="' . $url . 'mod/questions/graphics/arrowdown_15.png" /></a>&nbsp;'.elgg_echo('questions:ordering:time_created').'&nbsp;&nbsp;';
		$links .= '<a href="' . $url . 'pg/questions/viewanswers/' . $question_guid . '?order_by=owner&criteria=asc" title="'.$asc.'">
				<img src="' . $url . 'mod/questions/graphics/arrowup_15.png" /></a>';
		$links .= '<a href="' . $url . 'pg/questions/viewanswers/' . $question_guid . '?order_by=owner&criteria=desc" title="'.$desc.'">
				<img src="' . $url . 'mod/questions/graphics/arrowdown_15.png" /></a>&nbsp;'.elgg_echo('questions:ordering:username').'&nbsp;&nbsp;';
		$links .= '<a href="' . $url . 'pg/questions/viewanswers/' . $question_guid . '?order_by=helpful&criteria=asc" title="'.$asc.'">
				<img src="' . $url . 'mod/questions/graphics/arrowup_15.png" /></a>';
		$links .= '<a href="' . $url . 'pg/questions/viewanswers/' . $question_guid . '?order_by=helpful&criteria=desc" title="'.$desc.'">
				<img src="' . $url . 'mod/questions/graphics/arrowdown_15.png" /></a>&nbsp;'.elgg_echo('questions:ordering:helpful').'&nbsp;&nbsp;';
		$links .= '</div>';
		$links .= '<div class="clearfloat"></div>';
		echo $links;
	}
?>