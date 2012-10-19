<?php
/**
 * header.php
 *
 * (c)2012 mrdragonraaar.com
 */
include('functions.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title><?php dirindex_current_url(); ?></title>
<link rel="shortcut icon" href="<?php dirindex_favicon_url(); ?>" />
<link rel="stylesheet" href="<?php dirindex_css_url(); ?>" type="text/css">
</head>

<body>
<!-- Content -->
<div id="content">

<!-- Header -->
<div id="header">
<?php dirindex_searchbox(); ?>
<?php dirindex_path_navbar(); ?>
</div>
<!-- END Header -->

<!-- Directory Listing -->
<div id="dirindex">
