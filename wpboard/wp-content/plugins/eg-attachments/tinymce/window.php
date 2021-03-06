<?php

	if (!function_exists('bloginfo')) {

		$root = str_replace('\\','/',dirname(dirname(dirname(dirname(dirname(__FILE__))))) ). '/' ;

		if (file_exists( $root . 'wp-load.php') )
			require_once( $root . 'wp-load.php');
		elseif (file_exists( 'wp-load.php') )
			require_once( 'wp-load.php');
		elseif (file_exists( $root . 'wp-config.php') )
			require_once( $root . 'wp-config.php');
		elseif (file_exists( 'wp-config.php') )
			require_once( 'wp-config.php');
		else exit("Could not find wp-load.php or wp-config.php");
	}

require_once( dirname( dirname( __FILE__) ) . '/eg-attachments-config.inc.php');

if (isset($_GET['post_id'])) {
	$attachment_list = get_children('post_type=attachment&post_parent='.$_GET['post_id']);

	$attachment_string = __('No attachment available for this post', EG_ATTACH_TEXTDOMAIN);
	if ($attachment_list) {
		$attachment_string = '<select id="doclist" name="doclist" size="5" multiple><option value="first">'.__('First',EG_ATTACH_TEXTDOMAIN).'</option>';
		foreach ($attachment_list as $key => $attachment) {
			$attachment_string .= '<option value="'.$attachment->ID.'">'.$attachment->post_title.'</option>';
		}
		$attachment_string .= '<option value="last">'.__('Last',EG_ATTACH_TEXTDOMAIN).'</option></select>';
	}
}

$eg_attach_options = get_option(EG_ATTACH_OPTIONS_ENTRY);

if (!$eg_attach_options['shortcode_auto_default_opts']) {
	$default_values = $EG_ATTACHMENT_SHORTCODE_DEFAULTS;
	list($default_values['orderby'], $default_values['sortorder']) = split(' ', $EG_ATTACHMENT_SHORTCODE_DEFAULTS['orderby'] );
	$default_values['force_saveas'] = $eg_attach_options['force_saveas'];
	$default_values['logged_users'] = $eg_attach_options['logged_users_only'];
}
else {
	$default_values = array(
		'orderby'  		=> $eg_attach_options['shortcode_auto_orderby'],
		'order'			=> $eg_attach_options['shortcode_auto_order'],
		'size'     		=> $eg_attach_options['shortcode_auto_size'],
		'doctype'  		=> $eg_attach_options['shortcode_auto_doc_type'],
		'docid'    		=> 0,
		'title'    		=> $eg_attach_options['shortcode_auto_title'],
		'titletag' 		=> $eg_attach_options['shortcode_auto_title_tag'],
		'label'    		=> $eg_attach_options['shortcode_auto_label'],
		'force_saveas'	=> $eg_attach_options['force_saveas'],
		'fields'		=> $eg_attach_options['shortcode_auto_fields'],
		'icon'			=> $eg_attach_options['shortcode_auto_icon'],
		'logged_users'  => $eg_attach_options['logged_users_only']
	);
}

$select_fields = array(
	'orderby'      => array(
		'ID'       => __('ID',        EG_ATTACH_TEXTDOMAIN),
		'0'        => __('Title',     EG_ATTACH_TEXTDOMAIN),
		'date'     => __('Date',      EG_ATTACH_TEXTDOMAIN),
		'mime'     => __('Mime type', EG_ATTACH_TEXTDOMAIN)
	),
	'sortorder'    => array(
		'ASC'      => __('Ascending',  EG_ATTACH_TEXTDOMAIN),
		'DESC'     => __('Descending', EG_ATTACH_TEXTDOMAIN),
	),
	'size'         => array(
		'0'        => __('Large',  EG_ATTACH_TEXTDOMAIN),
		'medium'   => __('Medium', EG_ATTACH_TEXTDOMAIN),
		'small'    => __('Small',  EG_ATTACH_TEXTDOMAIN),
		'custom'   => __('Custom', EG_ATTACH_TEXTDOMAIN)
	),
	'label'        => array(
		'0'        => __('File name',      EG_ATTACH_TEXTDOMAIN),
		'doctitle' => __('Document title', EG_ATTACH_TEXTDOMAIN),	
	),
	'doctype'	   => array(
		'all'	   => __('All',      EG_ATTACH_TEXTDOMAIN),
		'0'	   	   => __('Document', EG_ATTACH_TEXTDOMAIN),
		'image'    => __('Image',    EG_ATTACH_TEXTDOMAIN)
	),
	'force_saveas' => array(
		'-1'       => __('Use default parameter', EG_ATTACH_TEXTDOMAIN),
		'0'        => __('No', EG_ATTACH_TEXTDOMAIN),
		'1'        => __('Yes', EG_ATTACH_TEXTDOMAIN)
	),
	'logged_users' => array(
		'-1'       => __('Use default parameter', EG_ATTACH_TEXTDOMAIN),
		'0'        => __('All users', EG_ATTACH_TEXTDOMAIN),
		'1'        => __('Only logged users', EG_ATTACH_TEXTDOMAIN)
	)	
);

function get_select($key, $default_values) {
	global $select_fields;
	
	$string = '<select id="'.$key.'" name="'.$key.'">';
	foreach ($select_fields[$key] as $id => $value) {
		if ($default_values[$key] == $id) $selected = 'selected'; else $selected = '';
		$string .= '<option value="'.$id.'" '.$selected.'>'.$value.'</option>';
	}
	$string .= '</select>';
	return $string;
}

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
	<title>EG Attachments</title>
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="eg-attachments.js"></script>
</head>
<body id="link" onload="tinyMCEPopup.executeOnLoad('init();');document.body.style.display='';">
	<form name="EGAttachments" action="#">
		<table border="0">
			<tr>
				<td valign="top"><label for="orderby"><?php _e('Order by: ',EG_ATTACH_TEXTDOMAIN); ?></label></td>
				<td><?php echo get_select('orderby', $default_values); ?> <?php echo get_select('sortorder', $default_values); ?></td>
			</tr>
			<tr>
				<td valign="top"><label for="listsize"><?php _e('List size: ',EG_ATTACH_TEXTDOMAIN); ?></label></td>
				<td><?php echo get_select('size', $default_values); ?></td>
			</tr>
			<tr>
				<td valign="top"><label for="doclabel"><?php _e('Document label',EG_ATTACH_TEXTDOMAIN); ?></label></td>
				<td><?php echo get_select('label', $default_values); ?></td>
			</tr>
			<tr>
				<td valign="top"><label for="doctype"><?php _e('Document type',EG_ATTACH_TEXTDOMAIN); ?></label></td>
				<td><?php echo get_select('doctype', $default_values); ?></td>
			</tr>
			<tr>
				<td valign="top"><?php _e('Fields: ',EG_ATTACH_TEXTDOMAIN); ?></td>
				<td>
					<input type="checkbox" id="field_caption" <?php echo (strpos($default_values['fields'], 'caption')!==FALSE?'checked':''); ?> /><?php _e('Caption',EG_ATTACH_TEXTDOMAIN); ?><br />
					<input type="checkbox" id="field_description" <?php echo (strpos($default_values['fields'], 'description')!==FALSE?'checked':''); ?>/><?php _e('Description',EG_ATTACH_TEXTDOMAIN); ?>
				</td>
			</tr>
			<tr>
				<td valign="top"><label for="doclist"><?php _e('Document list: ',EG_ATTACH_TEXTDOMAIN); ?></label></td>
				<td>
					<?php echo $attachment_string; ?>
				</td>
			</tr>
			<tr>
				<td valign="top"><label for="title"><?php _e('Title: ',EG_ATTACH_TEXTDOMAIN); ?></label></td>
				<td><input id="title" name="title" type="text" value="" /></td>
			</tr>
			<tr>
				<td valign="top"><label for="titletag"><?php _e('HTML Tag for title: ',EG_ATTACH_TEXTDOMAIN); ?></label></td>
				<td><input id="titletag" name="titletag" type="text" value="<?php echo $default_values['titletag']; ?>" /></td>
			</tr>
			<tr>
				<td valign="top"><label for="force_saveas"><?php _e('Force "saveas": ',EG_ATTACH_TEXTDOMAIN); ?></label></td>
				<td><?php echo get_select('force_saveas', $default_values); ?></td>
			</tr>
			<tr>
				<td valign="top"><label for="logged_users"><?php _e('Attachments access: ',EG_ATTACH_TEXTDOMAIN); ?></label></td>
				<td><?php echo get_select('logged_users', $default_values); ?></td>
			</tr>
		</table>
	<div class="mceActionPanel">
		<div style="float: left">
			<input type="button" id="cancel" name="cancel" value="<?php _e("Cancel", EG_ATTACH_TEXTDOMAIN); ?>" onclick="tinyMCEPopup.close();" />
		</div>

		<div style="float: right">
			<input type="submit" id="insert" name="insert" value="<?php _e("Insert", EG_ATTACH_TEXTDOMAIN); ?>" onclick="insertEGAttachmentsShortCode();" />
		</div>
	</div>
	</form>
</body>
</html>
