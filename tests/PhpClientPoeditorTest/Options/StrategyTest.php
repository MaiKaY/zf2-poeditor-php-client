<?php
/**
 * The MIT License (MIT)
 *
 * Copyright (c) 2015 Maik Schmidt
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

namespace PhpClientPoeditorTest\Options;

use PhpClientPoeditor\Options\Strategy;

/**
 * PhpClientPoeditorTest\Options\StrategyTest
 */
class StrategyTest extends \PHPUnit_Framework_TestCase
{
    /** @var Strategy */
    protected $fixture;

    public function setUp()
    {
        $this->fixture = new Strategy;
    }

    public function testExtendsAbstractOptions()
    {
        $this->assertInstanceOf('Zend\Stdlib\AbstractOptions', $this->fixture);
    }

    public function testMutateName()
    {
        $value = 'PhpClientPoeditor\Strategy\PhpArrayStrategy';
        $this->fixture->setName($value);
        $this->assertSame($value, $this->fixture->getName());
    }

    public function testMutateType()
    {
        $value = 'json';
        $this->fixture->setType($value);
        $this->assertSame($value, $this->fixture->getType());
    }

    public function testMutateExtension()
    {
        $value = 'php';
        $this->fixture->setExtension($value);
        $this->assertSame($value, $this->fixture->getExtension());
    }

    public function testMutateSavePath()
    {
        $value = 'data/php_array';
        $this->fixture->setSavePath($value);
        $this->assertSame($value, $this->fixture->getSavePath());
    }
}
