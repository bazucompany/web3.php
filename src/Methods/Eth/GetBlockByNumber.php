<?php

/**
 * This file is part of web3.php package.
 * 
 * (c) Kuan-Cheng,Lai <alk03073135@gmail.com>
 * 
 * @author Peter Lai <alk03073135@gmail.com>
 * @license MIT
 */

namespace BAZU\Web3\Methods\Eth;

use InvalidArgumentException;
use BAZU\Web3\Methods\EthMethod;
use BAZU\Web3\Validators\QuantityValidator;
use BAZU\Web3\Validators\TagValidator;
use BAZU\Web3\Validators\BooleanValidator;
use BAZU\Web3\Formatters\OptionalQuantityFormatter;
use BAZU\Web3\Formatters\BooleanFormatter;

class GetBlockByNumber extends EthMethod
{
    /**
     * validators
     * 
     * @var array
     */
    protected $validators = [
        [
            QuantityValidator::class, TagValidator::class
        ], BooleanValidator::class
    ];

    /**
     * inputFormatters
     * 
     * @var array
     */
    protected $inputFormatters = [
        OptionalQuantityFormatter::class, BooleanFormatter::class
    ];

    /**
     * outputFormatters
     * 
     * @var array
     */
    protected $outputFormatters = [];

    /**
     * defaultValues
     * 
     * @var array
     */
    protected $defaultValues = [
        0 => 'latest'
    ];

    /**
     * construct
     * 
     * @param string $method
     * @param array $arguments
     * @return void
     */
    // public function __construct($method='', $arguments=[])
    // {
    //     parent::__construct($method, $arguments);
    // }
}