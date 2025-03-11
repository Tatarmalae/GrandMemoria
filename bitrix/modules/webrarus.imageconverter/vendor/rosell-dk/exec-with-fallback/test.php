<?php

namespace Rarus\Isolated;

include 'vendor/autoload.php';
//include 'src/ExecWithFallback.php';
use Rarus\Isolated\ExecWithFallback\ExecWithFallback;
use Rarus\Isolated\ExecWithFallback\Tests\ExecWithFallbackTest;
ExecWithFallback::exec('echo hello');
ExecWithFallbackTest::testExec();
