<?php

/**
 * Atom feed link
 *
 * @package   AtomFeed
 * @copyright 2005-2016 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class AtomFeedLink extends AtomFeedNode
{
	// {{{ public properties

	/**
	 * Href
	 */
	public $href;

	/**
	 * Relation type
	 */
	public $relation_type = null;

	/**
	 * Type
	 */
	public $type = null;

	/**
	 * Href language
	 */
	public $href_language = null;

	/**
	 * Title
	 */
	public $title = null;

	/**
	 * Length
	 */
	public $length = null;

	// }}}
	// {{{ public function __construct()

	/**
	 * Create a new author
	 */
	public function __construct($href, $relation_type = null)
	{
		$this->href = $href;
		$this->relation_type = $relation_type;
	}

	// }}}
	// {{{ public function getNode()

	/**
	 * Get DOM node
	 */
	public function getNode($document)
	{
		$name = 'link';

		if ($this->name_space !== null)
			$name = $this->name_space.':'.$name;

		$link = $document->createElement($name);
		$link->setAttribute('href', $this->href);

		if ($this->relation_type !== null)
			$link->setAttribute('rel', $this->relation_type);

		if ($this->type !== null)
			$link->setAttribute('type', $this->type);

		if ($this->href_language !== null)
			$link->setAttribute('hreflang', $this->href_language);

		if ($this->title !== null)
			$link->setAttribute('title', $this->title);

		if ($this->length !== null)
			$link->setAttribute('length', $this->length);

		return $link;
	}

	// }}}
}

?>
