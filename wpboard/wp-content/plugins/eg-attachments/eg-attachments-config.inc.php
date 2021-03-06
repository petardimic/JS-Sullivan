<?php

define('EG_ATTACH_OPTIONS_ENTRY', 'EG-Attachments-Options');
define('EG_ATTACH_TEXTDOMAIN',    'eg-attachments');

$EG_ATTACH_DEFAULT_OPTIONS = array(
	'shortcode_auto'			  => 0,
	'shortcode_auto_where'		  => 'post',
	'shortcode_auto_title'  	  => '',
	'shortcode_auto_title_tag'	  => 'h2',
	'shortcode_auto_size'		  => 'large',
	'shortcode_auto_doc_type'	  => 'document',
	'shortcode_auto_orderby'	  => 'title',
	'shortcode_auto_order'		  => 'ASC',
	'shortcode_auto_label'		  => 'filename',
	'shortcode_auto_fields'		  => 'caption',
	'shortcode_auto_icon'		  => 1,
	'shortcode_auto_default_opts' => 0,
	'custom_format_pre'	  	  	  => '<ul>',
	'custom_format'		  		  => '<li><a href="%URL%" title="%TITLE%">%TITLE%</a></li>',
	'custom_format_post'  		  => '</ul>',
	'force_saveas' 				  => 0,
	'logged_users_only'			  => 0,
	'login_url'					  => '',
	'uninstall_del_options'		  => 0,
	'stats_enable'				  => 0,
	'clicks_table'				  => 0,
	'stats_ip_exclude'			  => '',
	'load_css'					  => 1,
	'use_metabox'				  => 0
);

$EG_ATTACHMENT_SHORTCODE_DEFAULTS = array(
	'orderby'  		=> 'title ASC',
	'size'     		=> 'large',
	'doctype'  		=> 'document',
	'docid'    		=> 0,
	'title'    		=> '',
	'titletag' 		=> 'h2',
	'label'    		=> 'filename',
	'force_saveas'	=> -1,
	'fields'		=> 'caption',
	'icon'			=> 1,
	'format_pre'	=> '',
	'format'		=> '',
	'format_post'	=> '',
	'format_pre'	=> '',
	'format'		=> '',
	'format_post'	=> '',
	'logged_users'  => -1,
	'id'            => 0
);

?>