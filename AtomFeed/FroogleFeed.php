<?php

require_once 'AtomFeed.php';

/**
 * A class for constructing Froogle Atom feeds
 *
 * @package   AtomFeed
 * @copyright 2005-2006 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class FroogleFeed extends AtomFeed
{
	// {{{ public function __construct()

	/**
	 * Creates a new Atom feed 
	 */
	public function __construct()
	{
		$this->addNameSpace('g', 'http://base.google.com/ns/1.0');
	}

	// }}}
	// {{{ public static function getTextNode()

	/**
	 * Get text node
	 */
	public static function getTextNode($document, $name, $value)
	{
		$value = strip_tags($value);

		return parent::($document, $name, $value);
	}

	// }}}
}

?>
