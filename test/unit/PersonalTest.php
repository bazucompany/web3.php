<?php

namespace Test\Unit;

use RuntimeException;
use Test\TestCase;
use BAZU\Web3\Providers\HttpProvider;
use BAZU\Web3\RequestManagers\RequestManager;
use BAZU\Web3\RequestManagers\HttpRequestManager;
use BAZU\Web3\Personal;

class PersonalTest extends TestCase
{
    /**
     * personal
     * 
     * @var BAZU\Web3\Personal
     */
    protected $personal;

    /**
     * setUp
     * 
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->personal = $this->web3->personal;
    }

    /**
     * testInstance
     * 
     * @return void
     */
    public function testInstance()
    {
        $personal = new Personal($this->testHost);

        $this->assertTrue($personal->provider instanceof HttpProvider);
        $this->assertTrue($personal->provider->requestManager instanceof RequestManager);
    }

    /**
     * testSetProvider
     * 
     * @return void
     */
    public function testSetProvider()
    {
        $personal = $this->personal;
        $requestManager = new HttpRequestManager('http://localhost:8545');
        $personal->provider = new HttpProvider($requestManager);

        $this->assertEquals($personal->provider->requestManager->host, 'http://localhost:8545');

        $personal->provider = null;

        $this->assertEquals($personal->provider->requestManager->host, 'http://localhost:8545');
    }

    /**
     * testCallThrowRuntimeException
     * 
     * @return void
     */
    public function testCallThrowRuntimeException()
    {
        $this->expectException(RuntimeException::class);

        $personal = new Personal(null);
        $personal->newAccount('');
    }
}