--TEST--
Tideways: Autodetect file_get_contents() HTTP Spans
--FILE--
<?php

include __DIR__ . '/common.php';

tideways_enable(0, array());

@file_get_contents("http://localhost");
@file_get_contents("http://localhost:8080");
@file_get_contents("http://localhost");
file_get_contents(__FILE__);

print_spans(tideways_get_spans());

tideways_disable();

--EXPECTF--
http: 2 timers - title=http://localhost
http: 1 timers - title=http://localhost:8080
