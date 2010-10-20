<?php

require_once 'AtomFeedAuthor.php';
require_once 'AtomFeedLink.php';
require_once 'AtomFeedEntry.php';

require_once 'PEAR/Exception.php';
require_once 'HotDate/HotDate.php';

/**
 * A class for constructing Atom feeds
 *
 * @package   AtomFeed
 * @copyright 2005-2006 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class AtomFeed
{
	// {{{ constants

	/**
	 * The package identifier
	 */
	const PACKAGE_ID = 'AtomFeed';

	// }}}
	// {{{ public properties

	/**
	 * XML enconding
	 *
	 * @ var string
	 */
	public $xml_encoding = 'utf-8';

	/**
	 * Title
	 *
	 * @var string
	 */
	public $title = null;

	/**
	 * Subtitle
	 *
	 * @var string
	 */
	public $subtitle = null;

	/**
	 * Id
	 *
	 * @var string
	 */
	public $id = null;

	/**
	 * Icon
	 *
	 * @var string
	 */
	public $icon = null;

	/**
	 * Logo
	 *
	 * @var string
	 */
	public $logo = null;

	/**
	 * Updated
	 *
	 * @var HotDate
	 */
	public $updated = null;

	/**
	 * Link
	 *
	 * @var AtomFeedLink
	 */
	public $link = null;

	// }}}
	// {{{ protected properties

	/**
	 * Array of feed entries
	 *
	 * @see AtomFeed::addEntry()
	 */
	protected $entries = array();

	/**
	 * Authors
	 *
	 * @see AtomFeed::addAuthor()
	 */
	protected $authors = array();

	/**
	 * Array of name spaces
	 *
	 * @see AtomFeed::addNameSpace()
	 */
	protected $name_spaces = array();

	// }}}
	// {{{ public function __construct()

	/**
	 * Creates a new Atom feed
	 */
	public function __construct()
	{
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
	// {{{ public function addEntry()

	/**
	 * Add entry
	 */
	public function addEntry(AtomFeedEntry $entry)
	{
		$this->entries[] = $entry;
	}

	// }}}
	// {{{ public function addNameSpace()

	/**
	 * Add name space
	 */
	public function addNameSpace($name, $uri)
	{
		$this->name_spaces[$name] = $uri;
	}

	// }}}
	// {{{ public function display()

	/**
	 * Display the atom feed
	 */
	public function display()
	{
		// create a new XML document
		$document = new DomDocument('1.0', $this->xml_encoding);

		// create feed node
		$feed = $document->createElement('feed');
		$feed->setAttribute('xmlns', 'http://www.w3.org/2005/Atom');

		foreach ($this->name_spaces as $name => $uri)
			$feed->setAttribute('xmlns:'.$name, $uri);

		$feed = $document->appendChild($feed);

		if ($this->title !== null)
			$feed->appendChild(self::getTextNode($document, 'title', $this->title));

		if ($this->subtitle !== null)
			$feed->appendChild(self::getTextNode($document, 'subtitle', $this->subtitle));

		if ($this->id !== null)
			$feed->appendChild(self::getTextNode($document, 'id', $this->id));

		if ($this->logo !== null)
			$feed->appendChild(self::getTextNode($document, 'logo', $this->logo));

		if ($this->icon !== null)
			$feed->appendChild(self::getTextNode($document, 'icon', $this->icon));

		if ($this->updated !== null)
			$feed->appendChild(self::getDateNode($document, 'updated', $this->updated));

		if ($this->link !== null)
			$feed->appendChild($this->link->getNode($document));

		// add authors
		foreach ($this->authors as $author)
			$feed->appendChild($author->getNode($document, 'author'));

		// add entries
		foreach ($this->entries as $entry)
			$feed->appendChild($entry->getNode($document));

		// get completed xml document
		echo $document->saveXML();
	}

	// }}}
	// {{{ public static function getTextNode()

	/**
	 * Get text node
	 */
	public static function getTextNode($document, $name, $value, $name_space = null)
	{
		$value = htmlspecialchars($value);

		if ($name_space !== null)
			$name = $name_space.':'.$name;

		$child = $document->createElement($name);
		$text_node = $document->createTextNode($value);
		$child->appendChild($text_node);

		return $child;
	}

	// }}}
	// {{{ public static function getCDATANode()

	/**
	 * Gets a CDATA node
	 */
	public static function getCDATANode($document, $name, $value, $name_space = null)
	{
		if ($name_space !== null)
			$name = $name_space.':'.$name;

		$child = $document->createElement($name);
		$cdata_node = $document->createCDATASection($value);
		$child->appendChild($cdata_node);

		return $child;
	}

	// }}}
	// {{{ public static function getDateNode()

	/**
	 * Get date node
	 */
	public static function getDateNode($document, $name, HotDate $date,
		$name_space = null)
	{
		if ($name_space !== null) {
			$name = $name_space.':'.$name;
		}

		return self::getTextNode($document, $name, $date->format('c'));
	}

	// }}}
}

?>
