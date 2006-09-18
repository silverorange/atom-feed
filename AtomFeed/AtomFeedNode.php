<?php

/**
 * Abstract class for an Atom feed node
 *
 * @package   AtomFeed
 * @copyright 2005-2006 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
abstract class AtomFeedNode
{
	// {{{ public properties

	/**
	 * Name space
	 */
	public $name_space = null;

	// }}}
	// {{{ public function getNode()

	/**
	 * Get DOM node
	 */
	public abstract function getNode($document);

	// }}}
}

?>
