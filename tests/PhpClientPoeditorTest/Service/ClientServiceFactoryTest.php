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

namespace PhpClientPoeditorTest\Service;

use PhpClientPoeditor\Service\ClientServiceFactory;

/**
 * PhpClientPoeditorTest\Service\ClientServiceFactoryTest
 */
class ClientServiceFactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @var ClientServiceFactory */
    protected $fixture;
    /** @var \Zend\ServiceManager\ServiceLocatorInterface|\Mockery\MockInterface */
    protected $serviceLocator;
    /** @var \PhpClientPoeditor\Options\Options|\Mockery\MockInterface */
    protected $options;

    public function setUp()
    {
        $this->serviceLocator = \Mockery::mock('Zend\ServiceManager\ServiceLocatorInterface');
        $this->options = \Mockery::mock('PhpClientPoeditor\Options\Options');

        $this->fixture = new ClientServiceFactory;
    }

    public function testImplementsFactoryInterface()
    {
        $this->assertInstanceOf('Zend\ServiceManager\FactoryInterface', $this->fixture);
    }

    public function testCreateService()
    {
        $this->serviceLocator
            ->shouldReceive('get')
            ->with('PhpClientPoeditor\Options\Options')
            ->andReturn($this->options)
            ->once();

        $instance = $this->fixture->createService($this->serviceLocator);
        $this->assertInstanceOf('PhpClientPoeditor\Service\ClientService', $instance);
    }
}
