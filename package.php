<?php

require_once 'PEAR/PackageFileManager2.php';

$version = '2.0.4';
$notes = <<<EOT
see ChangeLog
EOT;

$description =<<<EOT
This package provides a PHP API for writing Atom feeds
EOT;

$package = new PEAR_PackageFileManager2();
PEAR::setErrorHandling(PEAR_ERROR_DIE);

$result = $package->setOptions(
	array(
		'filelistgenerator' => 'file',
		'simpleoutput'      => true,
		'baseinstalldir'    => '/',
		'packagedirectory'  => './',
		'dir_roles'         => array(
			'tests' => 'test'
		),
	)
);

$package->setPackage('AtomFeed');
$package->setSummary('PHP API for writing Atom feeds');
$package->setDescription($description);
$package->setChannel('pear.silverorange.com');
$package->setPackageType('php');
$package->setLicense('LGPL', 'http://www.gnu.org/copyleft/lesser.html');

$package->setReleaseVersion($version);
$package->setReleaseStability('stable');
$package->setAPIVersion('0.0.1');
$package->setAPIStability('beta');
$package->setNotes($notes);

$package->addIgnore('package.php');

$package->addMaintainer('lead', 'nick', 'Nick Burka', 'nick@silverorange.com');
$package->addMaintainer('lead', 'nrf', 'Nathan Fredrickson', 'nrf@silverorange.com');

$package->setPhpDep('5.3.0');
$package->setPearinstallerDep('1.4.0');
$package->generateContents();


if (isset($_GET['make']) || (isset($_SERVER['argv']) && @$_SERVER['argv'][1] == 'make')) {
	$package->writePackageFile();
} else {
	$package->debugPackageFile();
}

?>
