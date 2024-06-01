<?php

declare(strict_types=1);

namespace MultipleChain\Tests;

use MultipleChain\Utils\Number;
use phpseclib\Math\BigInteger;
use PHPUnit\Framework\TestCase;

class NumberTest extends TestCase
{
    /**
     * @var Number
     */
    private Number $number0;

    /**
     * @var Number
     */
    private Number $number1;

    /**
     * @var Number
     */
    private Number $number2;

    /**
     * @var Number
     */
    private Number $number3;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->number0 = new Number(0.31190793872462);
        $this->number1 = new Number('0.311907938724615903');
        $this->number2 = new Number('0x04541e9e224e16df');
        $this->number3 = new Number(new BigInteger('311907938724615903'));
    }

    /**
     * @return void
     */
    public function testToHex(): void
    {
        $this->assertEquals('0x04541e9e224e26e0', $this->number0->toHex());
        $this->assertEquals('0x04541e9e224e16df', $this->number1->toHex());
        $this->assertEquals('0x04541e9e224e16df', $this->number2->toHex());
        $this->assertEquals('0x04541e9e224e16df', $this->number3->toHex());
    }

    /**
     * @return void
     */
    public function testToString(): void
    {
        $this->assertEquals('0.31190793872462', $this->number0->toString());
        $this->assertEquals('0.311907938724615903', $this->number1->toString());
        $this->assertEquals('0.311907938724615903', $this->number2->toString());
        $this->assertEquals('0.311907938724615903', $this->number3->toString());
    }

    /**
     * @return void
     */
    public function testToFloat(): void
    {
        $this->assertEquals(0.31190793872462, $this->number0->toFloat());
        $this->assertEquals(0.311907938724615903, $this->number1->toFloat());
        $this->assertEquals(0.311907938724615903, $this->number2->toFloat());
        $this->assertEquals(0.311907938724615903, $this->number3->toFloat());
    }

    /**
     * @return void
     */
    public function testToBigNumber(): void
    {
        $this->assertEquals('311907938724620000', $this->number0->toBigNumber()->toString());
        $this->assertEquals('311907938724615903', $this->number1->toBigNumber()->toString());
        $this->assertEquals('311907938724615903', $this->number2->toBigNumber()->toString());
        $this->assertEquals('311907938724615903', $this->number3->toBigNumber()->toString());
    }

    /**
     * @return void
     */
    public function testToReadableString(): void
    {
        $this->assertEquals('0.31190793872462', $this->number0->toReadableString(), 'number0');
        $this->assertEquals('0.311907938724615903', $this->number1->toReadableString(), 'number1');
        $this->assertEquals('0.311907938724615903', $this->number2->toReadableString(), 'number2');
        $this->assertEquals('0.311907938724615903', $this->number3->toReadableString(), 'number3');
    }

    /**
     * @return void
     */
    public function testEquals(): void
    {
        $this->assertTrue($this->number1->equals($this->number2));
        $this->assertTrue($this->number1->equals($this->number3));
    }
}
