<?php

require_once 'AtomFeedPerson.php';

/**
 * Class for an Atom feed contributor
 *
 * @package   AtomFeed
 * @copyright 2005-2006 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class AtomFeedContributor extends AtomFeedPerson
{
	// {{{ protected properties

	/**
	 * Node Name
	 */
	public $node_name = 'contributor';

	// }}}
}

?>
