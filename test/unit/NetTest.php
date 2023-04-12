<?php

namespace Test\Unit;

use RuntimeException;
use Test\TestCase;
use BAZU\Web3\Providers\HttpProvider;
use BAZU\Web3\RequestManagers\RequestManager;
use BAZU\Web3\RequestManagers\HttpRequestManager;
use BAZU\Web3\Net;

class NetTest extends TestCase
{
    /**
     * net
     * 
     * @var BAZU\Web3\Net
     */
    protected $net;

    /**
     * setUp
     * 
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->net = $this->web3->net;
    }

    /**
     * testInstance
     * 
     * @return void
     */
    public function testInstance()
    {
        $net = new Net($this->testHost);

        $this->assertTrue($net->provider instanceof HttpProvider);
        $this->assertTrue($net->provider->requestManager instanceof RequestManager);
    }

    /**
     * testSetProvider
     * 
     * @return void
     */
    public function testSetProvider()
    {
        $net = $this->net;
        $requestManager = new HttpRequestManager('http://localhost:8545');
        $net->provider = new HttpProvider($requestManager);

        $this->assertEquals($net->provider->requestManager->host, 'http://localhost:8545');

        $net->provider = null;

        $this->assertEquals($net->provider->requestManager->host, 'http://localhost:8545');
    }

    /**
     * testCallThrowRuntimeException
     * 
     * @return void
     */
    public function testCallThrowRuntimeException()
    {
        $this->expectException(RuntimeException::class);

        $net = new Net(null);
        $net->version();
    }
}