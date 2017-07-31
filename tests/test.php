<?php

require_once __DIR__ . '/vendor/autoload.php';

$feed = new AtomFeed();
$feed->title = 'My test feed';
$feed->addNameSpace('g', 'http://base.google.com/ns/1.0');
$feed->addAuthor(new AtomFeedAuthor('Nick Burka', 'nick@silverorange.com', 'http://www.silverorange.com'));
$feed->link = new AtomFeedLink('http://www.silverorange.com', 'self');
$feed->updated = new DateTime();

for ($i = 0; $i <= 10; $i++) {
	$entry = new AtomFeedEntry('entry'.$i, 'Entry '.$i, new DateTime());
	$entry->contributor = new AtomFeedAuthor('Nick Burka', 'nick@silverorange.com', 'http://www.silverorange.com');
	$entry->addAuthor(new AtomFeedAuthor('Nick Burka', 'nick@silverorange.com', 'http://www.silverorange.com'));
	$feed->addEntry($entry);
}

$feed->display();

header("Content-type: text/xml");
?>
