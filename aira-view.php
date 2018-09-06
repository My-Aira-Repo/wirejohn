<?php
class AiraTableView
{
	/**
	 * Load and update view
	 *
	 * Parameters:
	 * @param string $view // the view to load, dot used as directory separator, no file extension given
	 * @param mixed  $data // The data to display in the view (could be anything, even an object)
	 */
	public static function load($view, $data = null)
	{
		if (isset($data) && is_array($data)) {
			extract($data);
		}
		
		$viewFileOrigin = dirname(__FILE__).DIRECTORY_SEPARATOR.'views';
		$viewName = str_replace('.',DIRECTORY_SEPARATOR,$view).'.php';

		if (locate_template(array('/aira-table-filter'.DIRECTORY_SEPARATOR.$viewName)))
		{
			$viewFileOrigin = get_template_directory().DIRECTORY_SEPARATOR.'aira-table-filter';
		}

		ob_start();
		include $viewFileOrigin.DIRECTORY_SEPARATOR.$viewName;
		return ob_get_clean();
	}

}