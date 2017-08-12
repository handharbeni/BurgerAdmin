<<<<<<< HEAD
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

A PHP Error was encountered

Severity:    <?php echo $severity, "\n"; ?>
Message:     <?php echo $message, "\n"; ?>
Filename:    <?php echo $filepath, "\n"; ?>
Line Number: <?php echo $line; ?>
=======
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

A PHP Error was encountered

Severity: <?php echo $severity;?>
Message:  <?php echo $message;?>
Filename: <?php echo $filepath;?>
Line Number: <?php echo $line;?>
>>>>>>> 8cd45ab3c29762c5ce11b638e33e32d02c7ca9f7

<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>

Backtrace:
<<<<<<< HEAD
<?php	foreach (debug_backtrace() as $error): ?>
<?php		if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>
	File: <?php echo $error['file'], "\n"; ?>
	Line: <?php echo $error['line'], "\n"; ?>
	Function: <?php echo $error['function'], "\n\n"; ?>
<?php		endif ?>
<?php	endforeach ?>

<?php endif ?>
=======
	<?php foreach (debug_backtrace() as $error): ?>
		<?php if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>

	File: <?php echo $error['file'];?>
	Line: <?php echo $error['line'];?>
	Function: <?php echo $error['function'];?>

		<?php endif ?>

	<?php endforeach ?>
<?php endif ?>
>>>>>>> 8cd45ab3c29762c5ce11b638e33e32d02c7ca9f7
