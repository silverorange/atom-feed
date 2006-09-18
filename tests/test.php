<?php

ini_set('include_path', '.:/so/sites/veseys2/pear/lib:/usr/share/zend/library');

@include_once 'PackageConfig.php';
if (class_exists('PackageConfig')) {
	PackageConfig::addPath('/so/packages/pear/pear/Date');
}


require_once '../AtomFeed/AtomFeed.php';
require_once 'Date.php';

$feed = new AtomFeed();
$feed->title = 'My test feed';
$feed->addNameSpace('g', 'http://base.google.com/ns/1.0');
$feed->addAuthor(new AtomFeedAuthor('Nick Burka', 'nick@silverorange.com', 'http://www.silverorange.com'));
$feed->link = new AtomFeedLink('http://www.silverorange.com', 'self');
$feed->updated = new Date();

for ($i = 0; $i <= 10; $i++) {
	$entry = new AtomFeedEntry('entry'.$i, 'Entry '.$i, new Date());
	$entry->contributor = new AtomFeedAuthor('Nick Burka', 'nick@silverorange.com', 'http://www.silverorange.com');
	$entry->addAuthor(new AtomFeedAuthor('Nick Burka', 'nick@silverorange.com', 'http://www.silverorange.com'));
	$feed->addEntry($entry);
}

$feed->display();

header("Content-type: text/xml");
?>
