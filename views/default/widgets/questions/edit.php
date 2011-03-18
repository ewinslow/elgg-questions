<?php
/**
 * Questions widget settingsf
 */

$widget = $vars['entity'];

?>
<div>
	<?php echo elgg_echo("widget:questions:limit"); ?>
	<?php echo elgg_view('input/text', array('name' => 'params[limit]', 'value' => $widget->limit)); ?>
</div>