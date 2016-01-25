<?php

require_once 'AtomFeedNode.php';

/**
 * Abstract class for an Atom feed person
 *
 * @package   AtomFeed
 * @copyright 2005-2016 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
abstract class AtomFeedPerson extends AtomFeedNode
{
	// {{{ public properties

	/**
	 * Name
	 */
	public $name;

	/**
	 * Email
	 */
	public $email = null;

	/**
	 * Uri
	 */
	public $uri = null;

	// }}}
	// {{{ protected properties

	/**
	 * Node Name
	 */
	public $node_name;

	// }}}
	// {{{ public function __construct()

	/**
	 * Create a new author
	 */
	public function __construct($name, $email = null, $uri = null)
	{
		$this->name = $name;
		$this->email = $email;
		$this->uri = $uri;
	}

	// }}}
	// {{{ public function getNode()

	/**
	 * Get DOM node
	 */
	public function getNode($document)
	{
		$node_name = $this->node_name;

		if ($this->name_space !== null)
			$name = $this->name_space.':'.$node_name;

		$author = $document->createElement($node_name);

		$author->appendChild(AtomFeed::getTextNode($document,
			'name',	$this->name, $this->name_space));

		if ($this->email !== null)
			$author->appendChild(AtomFeed::getTextNode(
				$document, 'email', $this->email, $this->name_space));

		if ($this->uri !== null)
			$author->appendChild(AtomFeed::getTextNode(
				$document, 'uri', $this->uri, $this->name_space));

		return $author;
	}

	// }}}
}

?>
