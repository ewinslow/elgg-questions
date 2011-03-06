<?PHP
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

	//Setting for questions displayed per-page
	echo elgg_echo('questions:settings:questions:perpage');
    echo '<select name="params[questions_perpage]">';

	for($i=5;$i<=100;$i=$i+5)
	{
		if($i==10 && $vars['entity']->questions_perpage=="")
			echo '<option value="'.$i.'" selected="yes">10</option>'; //default setting
		else
		{
			echo '<option value="'.$i.'"';
			if ($vars['entity']->questions_perpage == $i)
				echo " selected=\"yes\" >";
			else
				echo " >";
			echo $i."</option>";
		}
	}
    echo "</select>";
    echo "<br />";

  	//Setting for questions displayed per-page
	echo elgg_echo('questions:settings:answers:perpage');
    echo '<select name="params[answers_perpage]">';

	for($i=5;$i<=100;$i=$i+5)
	{
		if($i==10 && $vars['entity']->answers_perpage=="")
			echo '<option value="'.$i.'" selected="yes">10</option>'; //default setting
		else
		{
			echo '<option value="'.$i.'"';
			if ($vars['entity']->answers_perpage == $i)
				echo " selected=\"yes\" >";
			else
				echo " >";
			echo $i."</option>";
		}
	}
    echo "</select>";
  	?>
</p>