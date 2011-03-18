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

/*=============================
===============================
  Questions plugin CSS
===============================
=============================*/

/*=======================================
   CSS for displaying listed quotes
========================================*/

.questions .answer {
	background-color: #eeeeff;
	margin-bottom: 15px;
	border-bottom: 1px solid #aaaaaa;
	background-image:url('<?php echo $vars['url']; ?>mod/questions/graphics/questions_answered_rotated.gif');
	background-repeat:no-repeat;
	background-position:right;
	padding-right:50px;
}

.questions .question_notanswered {
	background-color: #eee;
	margin-bottom: 15px;
	border-bottom: 1px solid #aaaaaa;
	padding-right:50px;
	background-image:url('<?php echo $vars['url']; ?>mod/questions/graphics/questions_notanswered_rotated.gif');
	background-repeat:no-repeat;
	background-position:right;
}

.questions .question_answered {
	background-color: #eee;
	margin-bottom: 15px;
	border-bottom: 1px solid #aaaaaa;
	padding-right:50px;
	background-image:url('<?php echo $vars['url']; ?>mod/questions/graphics/questions_answered_rotated.gif');
	background-repeat:no-repeat;
	background-position:right;
}

.question_open a{
	display:block;
	height:20px;
	width:20px;
	float:left;
	margin-top:3px;
	background: transparent url('<?php echo $vars['url']; ?>mod/questions/graphics/openclosequestion_20.png') no-repeat top right;
	background-position: right -20px;
}

.question_close a{
	display:block;
	height:20px;
	width:20px;
	float:left;
	margin-top:3px;
	background: transparent url('<?php echo $vars['url']; ?>mod/questions/graphics/openclosequestion_20.png') no-repeat top right;
}

.question_open a:hover {
	background: transparent url('<?php echo $vars['url']; ?>mod/questions/graphics/openclosequestion_20.png') no-repeat top right;
}

.question_close a:hover {
	background-position: right -20px;
}

.questions_icon {
	float:left;
	margin:3px 0 0 3px;
	padding:0;
}

.questions h3 {
	font-size: 150%;
	margin-bottom: 5px;
}

.questions p {
	margin: 0 0 5px 0;
}

.questions .strapline {
	margin: 0 0 0 35px;
	padding:0;
	color: #aaa;
	line-height:1em;
}
.questions p.tags {
	background:transparent url(<?php echo $vars['url']; ?>_graphics/icon_tag.gif) no-repeat scroll left 2px;
	margin:0 0 0 35px;
	padding:0pt 0pt 0pt 16px;
	min-height:22px;
}

.questions_body {
	font-style:italic;
	margin-left: 35px;
}

.questions_body img[align="left"] {
	margin: 10px 10px 10px 0;
	float:left;
}
.questions_body img[align="right"] {
	margin: 10px 0 10px 10px;
	float:right;
}
.questions_body img {
	margin: 10px !important;
}

.questions_title {
	font-size:15px;
	font-weight:bold;
	margin-left: 35px;
}

.questions_rate a {
	text-decoration: none;
	font-weight: bold;
}

.questions_links {
	float:right;
	font-size:10px;
}
/*END CSS FOR LISTING QUESTIONS*/

/*==============================
   End Questions Plugin
================================*/