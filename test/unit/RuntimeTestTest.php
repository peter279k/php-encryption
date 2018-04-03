<?php

use \Defuse\Crypto\RuntimeTests;
use PHPUnit\Framework\TestCase;

class RuntimeTestTest extends TestCase
{
    public function testRuntimeTest()
    {
        RuntimeTests::runtimeTest();
    }
}
