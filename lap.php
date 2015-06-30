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
$stopwatch->start('example_lap');
$totalLap = 10;
for($count = 0; $count <$totalLap; $count++){
	doSomeFunction();
	$stopwatch->lap('example_lap');
}

$event = $stopwatch->stop('example_lap');
$periods = $event->getPeriods();
?>
<ul>
	<?php
	foreach($periods as $index=>$period){
		echo '<li>#'.$index.':'.$period->getDuration().'ms</li>';
	}
	?>
	<li>Total time: <?php echo $event->getDuration() ?>ms</li>
	<li>The fastest runner's time: <?php echo $event->getStartTime() ?>ms</li>
	<li>Athletes slowest's time: <?php echo $event->getEndTime() ?>ms</li>
	<li>Max memmory used : <?php echo $event->getMemory() ?>ms</li>
</ul>