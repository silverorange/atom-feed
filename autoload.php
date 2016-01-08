<?php

namespace Silverorange\Autoloader;

$package = new Package('silverorange/atom_feed');

$package->addRule(new Rule('', 'AtomFeed'));

Autoloader::addPackage($package);

?>
