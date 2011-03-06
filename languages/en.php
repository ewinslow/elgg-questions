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
	$english = array(

			/**
			 * Titlebar
			 */

			'questions:titlebar' => "Questions",

			/**
			 * Title
			 */

			'questions:title:allquestions' => 'All The Questions',
			'questions:title:answer' => "Answer",
			'questions:title:answered' => "Answered Questions",
			'questions:title:editanswer' => "Edit Answer",
			'questions:title:editquestion' => "Edit Question",
			'questions:title:home' => "Questions",
			'questions:title:new' => "New Question",
			'questions:title:notanswered' => "Not Answered Questions",
			'questions:title:viewanswers' => "View Answers",
			'questions:title:youranswered' => "Your Answered Questions",
			'questions:title:yournotanswered' => "Your Not Answered Questions",
			'questions:title:yours' => "All Your Questions",

			/**
			 * Form
			 */

			'questions:form:access' => "Access",
			'questions:form:answer' => "Answer",
			'questions:form:question' => "Question",
			'questions:form:tags' => "Tags (comma separated)",
			'questions:form:title' => "Title",
			'questions:form:user:admin' => "Administrator",
			'questions:form:user:common' => "Registered User",
			'questions:form:whoanswers' => "Who can answer?",

			/**
			 * Menu & Submenu
			 */

			'questions:menu:home' => "Questions",

			'questions:submenu:allquestions' => "All The Questions",
			'questions:submenu:answered' => "Answered Questions",
			'questions:submenu:home' => "Questions",
			'questions:submenu:new' => "New Question",
			'questions:submenu:notanswered' => "Not Answered Questions",
			'questions:submenu:youranswered' => "Your Answered Questions",
			'questions:submenu:yournotanswered' => "Your Not Answered Questions",
			'questions:submenu:yours' => "All Your Questions",

			/**
			 * Alerts
			 */

			'questions:alert:answer:deleted' => "The answer was deleted successfully.",
			'questions:alert:answer:edited' => "The answer was edited successfully.",
			'questions:alert:answer:submitted' => "The answer was submitted successfully.",
			'questions:alert:question:deleted' => "The question was deleted successfully.",
			'questions:alert:question:edited' => "The question was edited successfully.",
			'questions:alert:question:submitted' => "The question was submitted successfully.",

			/**
			 * Errors
			 */

			'questions:error:answer:delete' => "Sorry, there was an error while deleting the answer. Please, try it again.",
			'questions:error:answer:edit' => "Sorry, there was an error while editing the answer. Please, try it again.",
			'questions:error:answer:empty' => "The answer is empty.",
			'questions:error:answer:save' => "Sorry, there was an error while saving your answer. Please, try it again.",
			'questions:error:question:delete' => "Sorry, there was an error while deleting the question. Please, try it again.",
			'questions:error:question:edit' => "Sorry, there was an error while editing the question. Please, try it again.",
			'questions:error:question:empty' => "Your question is empty.",
			'questions:error:question:save' => "Sorry, there was an error while saving the question. Please, try it again.",

			/**
			 * Body
			 */

			'questions:body:answer' => "Answer Question",
			'questions:body:deleteanswer' => "Delete Answer",
			'questions:body:deleteanswerconfirm' => "Are you sure that you want to delete the answer?",
			'questions:body:deletequestion' => "Delete Question",
			'questions:body:deletequestionconfirm' => "Are you sure that you want to delete the question?",
			'questions:body:editanswer' => "Edit Answer",
			'questions:body:editquestion' => "Edit Question",
			'questions:body:emptyset' => "Thera are no questions",
			'questions:body:introduction' => "Using Question's plugin you will be able to ask question to other users of the community.",
			'questions:body:noanswers' => "There are no answers for this question",
			'questions:body:numberofanswer' => "%s answer",
			'questions:body:numberofanswers' => "%s answers",
			'questions:body:rate:helpful' => "Was helpful for you?",
			'questions:body:rate:interesting' => "Is interesting to you?",
			'questions:body:rate:no' => "No (%s)",
			'questions:body:rate:yes' => "Yes (%s)",
			'questions:body:submittedby' => 'Submitted %s by %s',
			'questions:body:viewanswers' => "View Answers (%s)",

			/**
			 * Ordering
			 */

			'questions:ordering:asc' => 'Ascendent',
			'questions:ordering:desc' => 'Descendent',
			'questions:ordering:helpful' => 'Helpful',
			'questions:ordering:interesting' => 'Interesting',
			'questions:ordering:num_of_answers' => '# Answers',
			'questions:ordering:time_created' => 'Created',
			'questions:ordering:username' => 'Username',

			/**
			 * Actions
			 */

			'questions:action:closequestion' => "Disable Answers",
			'questions:action:openquestion' => "Enable Answers",

			/**
			 * Status
			 */

			'questions:status:closequestion' => "Closed Question",
			'questions:status:openquestion' => "Opened Question",

			/**
			 * View Answers
			 */

			'questions:viewanswers:question' => "Question",
			'questions:viewanswers:answers' => "Answers",

			/**
			 * Rate
			 */

			'questions:rate:answer:error' => "There has been an error while saving your answer's rate",
			'questions:rate:answer:submitted' => "Your answer's rate has been saved succesfully",
			'questions:rate:question:error' => "There has been an error while saving your questions's rate",
			'questions:rate:question:submitted' => "Your question's rate has been saved succesfully",

			/**
			 * River
			 */

			'questions:river:answer:create' => "a new answer.",
			'questions:river:answer:created' => "%s has created",
			'questions:river:question:create' => "a new question.",
			'questions:river:question:created' => "%s has created",

			/**
			 * Widgets
			 */

			'questions:widgets:description' => "You can view the status of your questions.",
			'questions:widgets:numberofquestions' => "Number of questions to display:",
			'questions:widgets:title' => "Questions",

			/**
			 * Email
			 */

			'questions:email:subject' => "%s has answered your question in %s.",
			'questions:email:mailbody' => "%s, %s has answered your question in %s.
Question:
%s
Answer:
%s
To see the answer from the web, please click in the next link: %s",

			/**
			 * Settings
			 */

			'questions:settings:answers:perpage' => "Answers per page: ",
			'questions:settings:questions:perpage' => "Questions per page: ",

			/**
			 * Stats
			 */

			'item:object:answer' => "Answers",
			'item:object:question' => "Questions",
	);

	add_translation('en',$english);
?>