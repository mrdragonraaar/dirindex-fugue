<?php
/**
 * path_navbar.php
 *
 * Display the path navigation bar.
 *
 * (c)2012 mrdragonraaar.com
 */
function dirindex_path_navbar() {

global $dirindex_fugue;

$path = explode('/', $dirindex_fugue::current_url());
$path_navbar_icon = $dirindex_fugue::path_navbar_icon_url();
$current_url = '/';

?>
<!-- Path Navbar -->
<div id="path_navbar">
<h1 id="path">
<img id="navicon" src="<?php echo $path_navbar_icon; ?>" />
<span class="navsep">/</span>
<?php
foreach ($path as $dirname)
{
	if ($dirname)
	{
		$current_url .= $dirname . '/';
?>
<a class="navlink" title="<?php echo $dirname; ?>" href="<?php echo $current_url; ?>"><?php echo $dirname; ?></a>
<span class="navsep">/</span>
<?php
	}
}
?>
</h1>
</div>
<!-- END Path Navbar -->
<?php } ?>
