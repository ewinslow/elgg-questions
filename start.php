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
	//Inicio - Start
	function questions_init(){
		global $CONFIG;
		// Registrar los ficheros de idiomas
		register_translations($CONFIG->pluginspath . "questions/languages/");
		//Extendemos la vista css
		extend_view('css','questions/css/css');

		// Set up the menu for logged in users
		if (isloggedin())
			add_menu(elgg_echo('questions:menu:home'), $CONFIG->wwwroot . "pg/questions/yours/" . $_SESSION['user']->username, 'questions');
		//else
		//	add_menu(elgg_echo('questions:menu:home'), $CONFIG->wwwroot . "pg/questions/home");

		// Register a page handler, so we can have nice URLs
		register_page_handler('questions','questions_page_handler');

		register_entity_url_handler('questions_url','question','all');

		add_widget_type('questions',elgg_echo("questions:widgets:title"),elgg_echo("questions:widgets:description"));

		register_action('questions/addanswer',false,$CONFIG->pluginspath . "questions/actions/addanswer.php");
		register_action('questions/addquestion',false,$CONFIG->pluginspath . "questions/actions/addquestion.php");
		register_action('questions/closequestion',false,$CONFIG->pluginspath . "questions/actions/closequestion.php");
		register_action('questions/editanswer',false,$CONFIG->pluginspath . "questions/actions/editanswer.php");
		register_action('questions/editquestion',false,$CONFIG->pluginspath . "questions/actions/editquestion.php");
		register_action('questions/deleteanswer',false,$CONFIG->pluginspath . "questions/actions/deleteanswer.php");
		register_action('questions/deletequestion',false,$CONFIG->pluginspath . "questions/actions/deletequestion.php");
		register_action('questions/openquestion',false,$CONFIG->pluginspath . "questions/actions/openquestion.php");
		register_action('questions/rateanswer',false,$CONFIG->pluginspath . "questions/actions/rateanswer.php");
		register_action('questions/ratequestion',false,$CONFIG->pluginspath . "questions/actions/ratequestion.php");
	}

	function questions_init_pagesetup()
	{
		global $CONFIG;

		//add submenu options
		if (get_context() == "questions" && isloggedin())
		{
			add_submenu_item(elgg_echo('questions:submenu:home'), $CONFIG->wwwroot."pg/questions/home");
			add_submenu_item(elgg_echo('questions:submenu:new'), $CONFIG->wwwroot."pg/questions/new");
			add_submenu_item(elgg_echo('questions:submenu:youranswered'), $CONFIG->wwwroot."pg/questions/youranswered");
			add_submenu_item(elgg_echo('questions:submenu:yournotanswered'), $CONFIG->wwwroot."pg/questions/yournotanswered");
			add_submenu_item(elgg_echo('questions:submenu:yours'), $CONFIG->wwwroot."pg/questions/yours");
			add_submenu_item(elgg_echo('questions:submenu:answered'), $CONFIG->wwwroot."pg/questions/answered");
			add_submenu_item(elgg_echo('questions:submenu:notanswered'), $CONFIG->wwwroot."pg/questions/notanswered");
			add_submenu_item(elgg_echo('questions:submenu:allquestions'), $CONFIG->wwwroot."pg/questions/allquestions");
		}
	}

	function questions_page_handler($page)
	{
		global $CONFIG;
		if(isset($page[0]))
			set_input("page", $page[0]);

		include($CONFIG->pluginspath . "questions/index.php");
	}

    function questions_can_edit($hook_name, $entity_type,
		$return_value, $parameters)
	{
		$question = $parameters['entity'];

		if ($question->whoanswers == "common")
		{
			return true;
		}
		return null;
	}

	function questions_url($entity) {

		global $CONFIG;

		//$title = friendly_title($entity->question);
		$title = "javier";

		return $CONFIG->url . "pg/questions/{$entity->guid}/$title/";

	}

	//Eventos - Events
	register_elgg_event_handler('init','system','questions_init');
	register_elgg_event_handler('pagesetup','system','questions_init_pagesetup');
	register_plugin_hook('permissions_check','all','questions_can_edit');
?>