<?php

use \Defuse\Crypto\KeyProtectedByPassword;
use PHPUnit\Framework\TestCase;

class PasswordTest extends TestCase
{
    public function testKeyProtectedByPasswordCorrect()
    {
        $pkey1 = KeyProtectedByPassword::createRandomPasswordProtectedKey('password');
        $pkey2 = KeyProtectedByPassword::loadFromAsciiSafeString($pkey1->saveToAsciiSafeString());

        $key1 = $pkey1->unlockKey('password');
        $key2 = $pkey2->unlockKey('password');

        $this->assertSame($key1->getRawBytes(), $key2->getRawBytes());
    }

    /**
     * @expectedException \Defuse\Crypto\Exception\WrongKeyOrModifiedCiphertextException
     */
    public function testKeyProtectedByPasswordWrong()
    {
        $pkey = KeyProtectedByPassword::createRandomPasswordProtectedKey('rightpassword');
        $key1 = $pkey->unlockKey('wrongpassword');
    }
}
