<?php

/**
 * Froogle feed entry
 *
 * @packageAtomFeed
 * @copyright 2005-2006 silverorange
 * @licensehttp://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class FroogleFeedEntry
{
	// {{{ public properties

	public $description;
	public $expiration_date;
	public $image_link;
	public $price;

	public $actor = null;
	public $apparel_type = null;
	public $artist = null;
	public $brand = null;
	public $color = null;
	public $condition = null;
	public $delivery_notes = null;
	public $delivery_radius = null;
	public $format = null;
	public $isbn = null;
	public $manufacturer = null;
	public $manufacturer_id = null;
	public $megapixels = null;
	public $memory = null;
	public $model_number = null;
	public $payment_accepted = null;
	public $payment_notes = null;
	public $pickup = null;
	public $price_type = null;
	public $processor_speed = null;
	public $product_type = null;
	public $shipping = null;
	public $size = null;
	public $tax_percent = null;
	public $tax_region = null;
	public $upc = null;

	// }}}
	// {{{ private properties

	private $name_space = 'g';

	// }}}
	// {{{ public function getNode()

	/**
	 * Get DOM node
	 */
	public function getNode($document)
	{
		$entry = parent::getNode($document);

		if ($this->content !== null)
			$entry->appendChild(AtomFeed::getTextNode($document, 'content', $this->content));

		return $entry;
	}

	// }}}
}

?>
