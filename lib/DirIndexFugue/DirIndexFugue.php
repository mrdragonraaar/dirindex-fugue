<?php
/**
 * DirIndexFugue.php
 *
 * (c)2012 mrdragonraaar.com
 */
// base url to icons
if (!defined('FUGUE_ICONS_BASE_URL')) {
define('FUGUE_ICONS_BASE_URL', 'fugue-icons/');       
}
// icon to use for favicon.
if (!defined('FAVICON_ICON')) {
define('FAVICON_ICON', 'folder-horizontal-open.png'); 
}
// css filename
if (!defined('DIRINDEX_CSS')) {
define('DIRINDEX_CSS', 'dirindex-fugue.css');
}
// icon to use for path navbar.
if (!defined('PATH_NAVBAR_ICON')) {
define('PATH_NAVBAR_ICON', 'folder-horizontal.png');
}
// icon to use for search box.
if (!defined('SEARCHBOX_ICON')) {
define('SEARCHBOX_ICON', 'magnifier.png');
}


/**
 * Helper methods for fugue-icon themed mod_autoindex.
 *
 * @author Adrian D. Elgar
 */
class DirIndexFugue
{
	// querystring params
	protected $_query;

	/**
         * Create new DirIndexFugueIcons instance.
         */
	function __construct()
	{
		$this->_querystring_params();
	}

	/**
	 * Get dirindex base url.
	 * @return dirindex base url.
	 */
	static public function base_url()
	{
		return dirname(rawurldecode($_SERVER['SCRIPT_NAME'])) . '/';
	}

	/**
	 * Get dirindex url.
	 * @param $url relative url from dirindex base url.
	 * @return dirindex url.
	 */
	static public function url($url)
	{
		return self::base_url() . $url;
	}

	/**
	 * Get dirindex css url.
	 * @return dirindex css url.
	 */
	static public function css_url()
	{
		return self::url('css/' . DIRINDEX_CSS);
	}

	/**
	 * Get the url of current path.
	 * @return current path url.
	 */
	static public function current_url()
	{
		return parse_url(rawurldecode($_SERVER['REQUEST_URI']), PHP_URL_PATH);
	}

	/**
	 * Get the url of file in current path.
	 * @param $url relative url from current url.
	 * @return current file url.
	 */
	static public function current_file_url($url)
	{
		return self::current_url() . '/' . $url;
	}

	/**
	 * Get the document root path.
	 * @return root path.
	 */
	static public function root_path()
	{
		return realpath($_SERVER["DOCUMENT_ROOT"]);
	}

	/**
	 * Get the file in root path.
	 * @param $path relative path from root path.
	 * @return root file path.
	 */
	static public function root_file_path($path)
	{
		return self::root_path() . $path;
	}

	/**
	 * Get the current path.
	 * @return current path.
	 */
	static public function current_path()
	{
		return self::root_file_path(self::current_url());
	}

	/**
	 * Get the file in current path.
	 * @param $path relative path from current path.
	 * @return current file path.
	 */
	static public function current_file_path($path)
	{
		return self::current_path() . '/' . $path;
	}

	/**
	 * Get the query string paramaters.
	 * This needs to be done as $_GET not set in footer.
	 * @return query params.
	 */
	private function _querystring_params()
	{
		$query_string = parse_url(rawurldecode($_SERVER['REQUEST_URI']),
		   PHP_URL_QUERY);
		parse_str($query_string, $this->_query);
	}

	/**
	 * Get querystring search pattern.
	 * @return querystring search pattern.
	 */
	public function search_pattern()
	{
		return isset($this->_query['P']) ? $this->_query['P'] : '';
	}

	/**
	 * Test if filename matches querystring search pattern.
	 * @param $filename filename.
	 * @return 1 if match.
	 */
	public function is_search_match($filename)
	{
		return $this->search_pattern() ? preg_match($this->search_pattern(), $filename) : 1;
	}

	/**
	 * Get querystring sort column value.
	 * @return sort column value.
	 */
	protected function sort_column()
	{
		return isset($this->_query['C']) ? 
		   $this->_query['C'] : '';
	}

	/**
	 * Test if querystring sort column is given value.
	 * @param $sort_column sort column value.
	 * @return 1 if filename. -1 if not set.
	 */
	protected function is_sort_by($sort_column)
	{
		return $this->sort_column() ? 
		   !strcmp($this->sort_column(), $sort_column) : -1;
	}

	/**
	 * Test if querystring sort column is filename.
	 * @return 1 if filename. -1 if not set.
	 */
	public function is_sort_by_filename()
	{
		return $this->is_sort_by('N');
	}

	/**
	 * Test if querystring sort column is file modified time.
	 * @return 1 if filemtime. -1 if not set.
	 */
	public function is_sort_by_filemtime()
	{
		return $this->is_sort_by('M');
	}

	/**
	 * Test if querystring sort column is file size.
	 * @return 1 if filesize. -1 if not set.
	 */
	public function is_sort_by_filesize()
	{
		return $this->is_sort_by('S');
	}

	/**
	 * Get querystring sort order value.
	 * @return sort order value.
	 */
	protected function sort_order()
	{
		return isset($this->_query['O']) ? 
		   $this->_query['O'] : '';
	}

	/**
	 * Test if querystring sort order is ascending.
	 * @return 1 if ascending. -1 if not set.
	 */
	public function is_sort_asc()
	{
		return $this->sort_order() ? 
		   !strcmp($this->sort_order(), 'A') : -1;
	}

	/**
         * Get base url for fugue-icons.
         * @return base icon url.
         */
	static public function base_icon_url()
	{
		return FUGUE_ICONS_BASE_URL;
	}

	/**
         * Get base url for 16px fugue-icons.
         * @return base 16px icon url.
         */
	static public function base_icon16_url()
	{
		return self::base_icon_url() . 'icons/';
	}

	/**
         * Get base url for 24px fugue-icons.
         * @return base 24px icon url.
         */
	static public function base_icon24_url()
	{
		return self::base_icon_url() . 'bonus/icons-24/';
	}

	/**
         * Get base url for 32px fugue-icons.
         * @return base 32px icon url.
         */
	static public function base_icon32_url()
	{
		return self::base_icon_url() . 'bonus/icons-32/';
	}

	/**
         * Same as icon16_url().
         * @param $icon_name name of fugue-icon.
         * @return 16px icon url.
         */
	static public function icon_url($icon_name)
	{
		return self::icon16_url($icon_name);
	}

	/**
         * Get url for 16px fugue-icon.
         * @param $icon_name name of fugue-icon.
         * @return 16px icon url.
         */
	static public function icon16_url($icon_name)
	{
		return self::base_icon16_url() . $icon_name;
	}

	/**
         * Get url for 24px fugue-icon.
         * @param $icon_name name of fugue-icon.
         * @return 24px icon url.
         */
	static public function icon24_url($icon_name)
	{
		return self::base_icon24_url() . $icon_name;
	}

	/**
         * Get url for 32px fugue-icon.
         * @param $icon_name name of fugue-icon.
         * @return 32px icon url.
         */
	static public function icon32_url($icon_name)
	{
		return self::base_icon32_url() . $icon_name;
	}

	/**
         * Get url for favicon.
         * @return favicon url.
         */
	static public function favicon_url()
	{
		return self::icon_url(FAVICON_ICON);
	}

	/**
         * Get url for path navbar icon.
         * @return path navbar icon url.
         */
	static public function path_navbar_icon_url()
	{
		return self::icon24_url(PATH_NAVBAR_ICON);
	}

	/**
         * Get url for searchbox icon.
         * @return searchbox icon url.
         */
	static public function searchbox_icon_url()
	{
		return self::icon_url(SEARCHBOX_ICON);
	}
}

$dirindex_fugue = new DirIndexFugue();

?>
