--TEST--
Test for bug #1829: Range and precision of time
--INI--
xdebug.mode=trace
xdebug.start_with_request=no
xdebug.collect_params=4
xdebug.collect_assignments=0
xdebug.collect_return=0
--FILE--
<?php
$tf = xdebug_start_trace(sys_get_temp_dir() . '/'. uniqid('xdt', TRUE));

var_dump( 42 );

xdebug_stop_trace();
echo file_get_contents( $tf );
unlink( $tf );
?>
--EXPECTF--
int(42)
TRACE START [20%d-%d-%d %d:%d:%d.%d]
%w0.%d %w%d     -> var_dump(42) %sbug01829.php:4
%w0.%d %w%d     -> xdebug_stop_trace() %sbug01829.php:6
%w0.%d %w%d
TRACE END   [20%d-%d-%d %d:%d:%d.%d]
