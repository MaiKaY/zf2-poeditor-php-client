<?php
/**
 * The MIT License (MIT)
 *
 * Copyright (c) 2016 Maik Schmidt
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

use PhpClientPoeditor\Options\Options;

/**
 * PhpClientPoeditorTest\Options\OptionsTest
 */
class OptionsTest extends \PHPUnit_Framework_TestCase
{
    /** @var Options */
    protected $fixture;

    public function setUp()
    {
        $this->fixture = new Options;
    }

    public function testExtendsAbstractOptions()
    {
        $this->assertInstanceOf('Zend\Stdlib\AbstractOptions', $this->fixture);
    }

    public function testMutateClient()
    {
        $value = array(
            'adapter' => 'Zend\Http\Client\Adapter\Curl',
        );
        $this->fixture->setClient($value);
        $this->assertSame($value, $this->fixture->getClient());
    }

    public function testMutateRequestDelay()
    {
        $value = 5000000;
        $this->fixture->setRequestDelay($value);
        $this->assertSame($value, $this->fixture->getRequestDelay());
    }

    public function testMutateUrl()
    {
        $value = 'https://poeditor.com/api/';
        $this->fixture->setUrl($value);
        $this->assertSame($value, $this->fixture->getUrl());
    }

    public function testMutateApiToken()
    {
        $value = 'API_TOKEN';
        $this->fixture->setApiToken($value);
        $this->assertSame($value, $this->fixture->getApiToken());
    }

    public function testMutateProjectId()
    {
        $value = 1337;
        $this->fixture->setProjectId($value);
        $this->assertSame($value, $this->fixture->getProjectId());
    }

    public function testMutateLanguages()
    {
        $value = array(
            'DE' => 'de_DE',
        );
        $this->fixture->setLanguages($value);
        $this->assertSame($value, $this->fixture->getLanguages());
    }

    public function testMutateStrategies()
    {
        $value = array(
            array(
                'name'      => 'PhpClientPoeditor\Strategy\PhpArrayStrategy',
                'type'      => 'json',
                'extension' => 'php',
                'save_path' => 'data/php_array',
            ),
        );
        $this->fixture->setStrategies($value);
        $this->assertSame($value, $this->fixture->getStrategies());
    }
}
