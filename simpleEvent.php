<?php
/**
 * Stopwatch's example
 *
 * An example show you how to use Symfony Stopwatch
 *
 * @author nguyenvanduocit
 */


require_once 'vendor/autoload.php';
require_once 'functions.php';

use Symfony\Component\Stopwatch\Stopwatch;

$stopwatch = new Stopwatch();
$stopwatch->start('example_loop');

doSomeFunction();

$event = $stopwatch->stop('example_loop');
echo $event->getDuration().'ms';