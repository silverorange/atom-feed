<?php

require_once 'AtomFeedPerson.php';

/**
 * Class for an Atom feed author
 *
 * @package   AtomFeed
 * @copyright 2005-2006 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class AtomFeedAuthor extends AtomFeedPerson
{
	// {{{ protected properties

	/**
	 * Node Name
	 */
	public $node_name = 'author';

	// }}}
}

?>
