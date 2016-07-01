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

namespace PhpClientPoeditorTest\Controller;

use PhpClientPoeditor\Controller\BuildController;

/**
 * PhpClientPoeditorTest\Controller\BuildControllerTest
 */
class BuildControllerTest extends \PHPUnit_Framework_TestCase
{
    /** @var BuildController */
    protected $fixture;
    /** @var \Zend\ServiceManager\ServiceLocatorInterface|\Mockery\MockInterface */
    protected $serviceLocator;
    /** @var \PhpClientPoeditor\Service\ClientService|\Mockery\MockInterface */
    protected $clientService;

    public function setUp()
    {
        $this->serviceLocator = \Mockery::mock('Zend\ServiceManager\ServiceLocatorInterface');
        $this->clientService = \Mockery::mock('PhpClientPoeditor\Service\ClientService');

        $this->fixture = new BuildController;
        $this->fixture->setServiceLocator($this->serviceLocator);
    }

    public function testExtendsAbstractConsoleController()
    {
        $this->assertInstanceOf('Zend\Mvc\Controller\AbstractConsoleController', $this->fixture);
    }

    public function testBuildAction()
    {
        $this->serviceLocator
            ->shouldReceive('get')
            ->with('PhpClientPoeditor\Service\ClientService')
            ->andReturn($this->clientService)
            ->once();

        $this->clientService
            ->shouldReceive('build')
            ->andReturnNull()
            ->once();

        $result = $this->fixture->buildAction();
        $this->assertInstanceOf('Zend\View\Model\JsonModel', $result);
        $this->assertSame(array('success' => true), $result->getVariables());
    }
}
