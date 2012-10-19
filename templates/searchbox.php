<?php
/**
 * searchbox.php
 *
 * Display the search box.
 *
 * (c)2012 mrdragonraaar.com
 */
function dirindex_searchbox() {

global $dirindex_fugue;

$search_icon = $dirindex_fugue::searchbox_icon_url();
$search_pattern = $dirindex_fugue->search_pattern();

?>
<!-- Search Box -->
<div id="searchbox">
<form method="get">
<img id="searchicon" src="<?php echo $search_icon; ?>" />
<input id="search" type="text" name="P" value="<?php echo $search_pattern; ?>" />
</form>
</div>
<!-- END Search Box -->
<?php } ?>
