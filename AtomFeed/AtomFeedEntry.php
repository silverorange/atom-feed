<?php

require_once 'AtomFeedNode.php';

/**
 * Atom feed entry
 *
 * @package   AtomFeed
 * @copyright 2005-2006 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class AtomFeedEntry extends AtomFeedNode
{
	// {{{ public properties

	/**
	 * Title
	 */
	public $title;

	/**
	 * Id
	 */
	public $id;

	/**
	 * Updated
	 */
	public $updated;

	/**
	 * Summary
	 */
	public $summary = null;

	/**
	 * Content
	 */
	public $content = null;

	/**
	 * Link
	 */
	public $link = null;

	/**
	 * Published
	 */
	public $published = null;

	/**
	 * Contributor
	 */
	public $contributor = null;

	// }}}
	// {{{ protected properties

	/**
	 * Authors
	 */
	protected $authors = array();

	// }}}
	// {{{ public function __construct()

	/**
	 * Create a new entry
	 */
	public function __construct($id, $title, $updated)
	{
		$this->id = $id;
		$this->title = $title;
		$this->updated = $updated;
	}

	// }}}
	// {{{ public function getNode()

	/**
	 * Get DOM node
	 */
	public function getNode($document)
	{
		$entry = $document->createElement('entry');

		$entry->appendChild(AtomFeed::getTextNode($document, 'title', $this->title));
		$entry->appendChild(AtomFeed::getTextNode($document, 'id', $this->id));
		$entry->appendChild(AtomFeed::getDateNode($document, 'updated', $this->updated));

		if ($this->summary !== null)
			$entry->appendChild(AtomFeed::getTextNode($document, 'summary', $this->summary));

		if ($this->link !== null)
			$entry->appendChild(AtomFeed::getTextNode($document, 'link', $this->link));

		if ($this->published !== null)
			$entry->appendChild(AtomFeed::getDateNode($document, 'published', $this->published));

		if ($this->contributor !== null)
			$entry->appendChild($this->contributor->getNode($document, 'contributor'));

		// add authors
		foreach ($this->authors as $author)
			$entry->appendChild($author->getNode($document, 'author'));

		if ($this->content !== null)
			$entry->appendChild(AtomFeed::getTextNode($document, 'content', $this->content));

		return $entry;
	}

	// }}}
	// {{{ public function addAuthor()

	/**
	 * Add author
	 */
	public function addAuthor(AtomFeedAuthor $author)
	{
		$this->authors[] = $author;
	}

	// }}}
}

?>
