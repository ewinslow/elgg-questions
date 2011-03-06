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
	$spanish = array(

			/**
			 * Titlebar
			 */

			'questions:titlebar' => "Preguntas",

			/**
			 * Title
			 */

			'questions:title:allquestions' => 'Todas Las Preguntas',
			'questions:title:answer' => "Responder",
			'questions:title:answered' => "Preguntas Contestadas",
			'questions:title:editanswer' => "Editar Respuesta",
			'questions:title:editquestion' => "Editar Pregunta",
			'questions:title:home' => "Preguntas",
			'questions:title:new' => "Nueva Pregunta",
			'questions:title:notanswered' => "Preguntas No Contestadas",
			'questions:title:viewanswers' => "Ver Respuestas",
			'questions:title:youranswered' => "Tus Preguntas Contestadas",
			'questions:title:yournotanswered' => "Tus Preguntas No Contestadas",
			'questions:title:yours' => "Todas Tus Preguntas",

			/**
			 * Form
			 */

			'questions:form:access' => "Acceso",
			'questions:form:answer' => "Respuesta",
			'questions:form:question' => "Pregunta",
			'questions:form:tags' => "Etiquetas (separadas por coma)",
			'questions:form:title' => "T&iacute;tulo",
			'questions:form:user:admin' => "Administrador",
			'questions:form:user:common' => "Usuario Registrado",
			'questions:form:whoanswers' => "&iquest;Qui&eacute;n puede contestar?",

			/**
			 * Menu & Submenu
			 */

			'questions:menu:home' => "Preguntas",

			'questions:submenu:allquestions' => "Todas Las Preguntas",
			'questions:submenu:answered' => "Preguntas Contestadas",
			'questions:submenu:home' => "Preguntas",
			'questions:submenu:new' => "Nueva Pregunta",
			'questions:submenu:notanswered' => "Preguntas No Contestadas",
			'questions:submenu:youranswered' => "Tus Preguntas Contestadas",
			'questions:submenu:yournotanswered' => "Tus Preguntas No Contestadas",
			'questions:submenu:yours' => "Todas Tus Preguntas",

			/**
			 * Alerts
			 */

			'questions:alert:answer:deleted' => "La respuesta fue eliminada exitosamente.",
			'questions:alert:answer:edited' => "La respuesta fue editada exitosamente.",
			'questions:alert:answer:submitted' => "Tu respuesta fue guardada exitosamente.",
			'questions:alert:question:deleted' => "La pregunta fue eliminada exitosamente.",
			'questions:alert:question:edited' => "La pregunta fue editada exitosamente.",
			'questions:alert:question:submitted' => "Tu pregunta fue guardada exitosamente.",

			/**
			 * Errors
			 */

			'questions:error:answer:delete' => "Lo lamentamos, hubo un error mientras se eliminaba la respuesta. Por favor, int&eacute;ntalo de nuevo.",
			'questions:error:answer:edit' => "Lo lamentamos, hubo un error mientras se editaba la respuesta. Por favor, int&eacute;ntalo de nuevo.",
			'questions:error:answer:empty' => "Tu respuesta est&aacute; vac&iacute;a.",
			'questions:error:answer:save' => "Lo lamentamos, hubo un error mientras se guardaba tu respuesta. Por favor, int&eacute;ntalo de nuevo.",
			'questions:error:question:delete' => "Lo lamentamos, hubo un error mientras se eliminaba tu pregunta. Por favor, int&eacute;ntalo de nuevo.",
			'questions:error:question:edit' => "Lo lamentamos, hubo un error mientras se editaba tu pregunta. Por favor, int&eacute;ntalo de nuevo.",
			'questions:error:question:empty' => "Tu pregunta est&aacute; vac&iacute;a.",
			'questions:error:question:save' => "Lo lamentamos, hubo un error mientras se guardaba tu pregunta. Por favor, int&eacute;ntalo de nuevo.",

			/**
			 * Body
			 */

			'questions:body:answer' => "Responder pregunta",
			'questions:body:deleteanswer' => "Eliminar respuesta",
			'questions:body:deleteanswerconfirm' => "&iquest;Est&aacute; seguro que desea eliminar la respuesta?",
			'questions:body:deletequestion' => "Eliminar pregunta",
			'questions:body:deletequestionconfirm' => "&iquest;Est&aacute; seguro que desea eliminar la pregunta?",
			'questions:body:editanswer' => "Editar Respuesta",
			'questions:body:editquestion' => "Editar Pregunta",
			'questions:body:emptyset' => "No hay preguntas",
			'questions:body:introduction' => "Usando el plugin de Preguntas usted podr&aacute; enviar preguntas a otros usuarios de la comunidad.",
			'questions:body:noanswers' => "No hay respuestas a esta pregunta",
			'questions:body:numberofanswer' => "%s respuesta",
			'questions:body:numberofanswers' => "%s respuestas",
			'questions:body:rate:helpful' => "&iquest;Fue de su ayuda?",
			'questions:body:rate:interesting' => "&iquest;Le parece interesante?",
			'questions:body:rate:no' => "No (%s)",
			'questions:body:rate:yes' => "Si (%s)",
			'questions:body:submittedby' => 'Enviada %s por %s',
			'questions:body:viewanswers' => "Ver respuestas (%s)",

			/**
			 * Ordering
			 */

			'questions:ordering:asc' => 'Ascendente',
			'questions:ordering:desc' => 'Descendente',
			'questions:ordering:helpful' => 'Ayuda',
			'questions:ordering:interesting' => 'Inter&eacute;s',
			'questions:ordering:num_of_answers' => '# Respuestas',
			'questions:ordering:time_created' => 'Creado',
			'questions:ordering:username' => 'Usuario',

			/**
			 * Actions
			 */

			'questions:action:closequestion' => "Deshabilitar Respuestas",
			'questions:action:openquestion' => "Habilitar Respuestas",

			/**
			 * Status
			 */

			'questions:status:closequestion' => "Pregunta Cerrada",
			'questions:status:openquestion' => "Pregunta Abierta",

			/**
			 * View Answers
			 */

			'questions:viewanswers:question' => "Pregunta",
			'questions:viewanswers:answers' => "Respuestas",

			/**
			 * Rate
			 */

			'questions:rate:answer:error' => 'Ha ocurrido un error al registrar su calificaci&oacute;n de la respuesta',
			'questions:rate:answer:submitted' => 'Su calificaci&oacute;n de la respuesta ha sido registrada',
			'questions:rate:question:error' => 'Ha ocurrido un error al registrar su calificaci&oacute;n de la pregunta',
			'questions:rate:question:submitted' => 'Su calificaci&oacute;n de la pregunta ha sido registrada',

			/**
			 * River
			 */

			'questions:river:answer:create' => "a esta pregunta.",
			'questions:river:answer:created' => "%s ha respondido",
			'questions:river:question:create' => "una nueva pregunta.",
			'questions:river:question:created' => "%s ha creado",

			/**
			 * Widgets
			 */

			'questions:widgets:description' => "Podr&aacute;s ver el estado de tus preguntas.",
			'questions:widgets:numberofquestions' => "N&uacute;mero de preguntas a mostrar:",
			'questions:widgets:title' => "Preguntas",

			/**
			 * Email
			 */

			'questions:email:subject' => "%s ha respondido una pregunta tuya en %s.",
			'questions:email:mailbody' => "%s, %s ha respondido una pregunta tuya en %s.
Pregunta:
%s
Respuesta:
%s
Para ver la respuesta desde la página haz clic en el siguiente enlace: %s",

			/**
			 * Settings
			 */

			'questions:settings:answers:perpage' => "Respuestas por p&aacute;gina: ",
			'questions:settings:questions:perpage' => "Preguntas por p&aacute;gina: ",

			/**
			 * Stats
			 */

			'item:object:answer' => "Respuestas",
			'item:object:question' => "Preguntas",
	);

	add_translation('es',$spanish);
?>