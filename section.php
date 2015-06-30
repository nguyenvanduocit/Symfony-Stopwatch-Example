<?php
require_once 'vendor/autoload.php';
require_once 'functions.php';

use Symfony\Component\Stopwatch\Stopwatch;

$stopwatch = new Stopwatch();

$stopwatch->openSection();
$stopwatch->start('do_phase_1');
doSomeFunction();
$stopwatch->stopSection('step1');

$stopwatch->openSection();
$stopwatch->start('do_phase_1');
$totalLap = 10;
for($count = 0; $count <$totalLap; $count++){
	doSomeFunction();
	$stopwatch->lap('do_phase_1');
}
$stopwatch->stopSection('step2');


echo '<p>Step 1 :</p>';
$events_1 = $stopwatch->getSectionEvents('step1');
echo '<ul>';
foreach($events_1 as $id=> $event){
	echo '<li> phase '.$id.':'.$event->getDuration().'</li>';
}
echo '</ul>';

echo '<p>Step 2 :</p>';
$events_2 = $stopwatch->getSectionEvents('step2');
echo '<ul>';
foreach($events_2 as $id=> $event){
	echo '<li> phase '.$id.':'.$event->getDuration().'</li>';
}
echo '</ul>';