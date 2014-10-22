<?php
/**
 * The MIT License (MIT)
 *
 * Copyright (c) 2014 Maik Schmidt
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

namespace PhpClientPoeditorTest\Service;

use PhpClientPoeditor\Service\ClientServiceFactory;

/**
 * PhpClientPoeditorTest\Service\ClientServiceFactoryTest
 */
class ClientServiceFactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @var ClientServiceFactory */
    protected $fixture;

    public function setUp()
    {
        $this->fixture = new ClientServiceFactory;
    }

    public function testImplementsFactoryInterface()
    {
        $this->assertInstanceOf('Zend\ServiceManager\FactoryInterface', $this->fixture);
    }

    public function testCreateService()
    {
        $optionsMock = \Mockery::mock('PhpClientPoeditor\Options\Options');
        $serviceLocatorMock = \Mockery::mock('Zend\ServiceManager\ServiceLocatorInterface');
        $serviceLocatorMock->shouldReceive('get')->with('PhpClientPoeditor\Options\Options')->andReturn($optionsMock);

        $instance = $this->fixture->createService($serviceLocatorMock);
        $this->assertInstanceOf('PhpClientPoeditor\Service\ClientService', $instance);
    }
}
