<?php
/**
 * functions.php
 *
 * (c)2012 mrdragonraaar.com
 */
define('FUGUE_ICONS_BASE_URL', '/global/icons/fugue-icons/');

include('lib/DirIndexFugue/DirIndexFugue.php');
include('templates/path_navbar.php');
include('templates/searchbox.php');

/**
 * Display the url of current path.
 */
function dirindex_current_url()
{
	global $dirindex_fugue;

	echo $dirindex_fugue->current_url();
}

/**
 * Display the url of dirindex css file.
 */
function dirindex_css_url()
{
	global $dirindex_fugue;

	echo $dirindex_fugue->css_url();
}

/**
 * Display the url of favicon.
 */
function dirindex_favicon_url()
{
	global $dirindex_fugue;

	echo $dirindex_fugue->favicon_url();
}

?>
