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

namespace PhpClientPoeditorTest;

use PhpClientPoeditor\Module;

class ModuleTest extends \PHPUnit_Framework_TestCase
{
    /** @var Module */
    protected $fixture;

    protected function setUp()
    {
        $this->fixture = new Module;
    }

    public function testImplementsAutoloaderProviderInterface()
    {
        $this->assertInstanceOf('Zend\ModuleManager\Feature\AutoloaderProviderInterface', $this->fixture);
    }

    public function testImplementsConfigProviderInterface()
    {
        $this->assertInstanceOf('Zend\ModuleManager\Feature\ConfigProviderInterface', $this->fixture);
    }

    public function testConfigRetrieval()
    {
        $expected = include __DIR__ . '/../../config/module.config.php';
        $this->assertSame($expected, $this->fixture->getConfig());
    }

    public function testAutoloaderConfigRetrieval()
    {
        $expected = array(
            'Zend\Loader\ClassMapAutoloader',
            'Zend\Loader\StandardAutoloader',
        );

        $this->assertSame($expected, array_keys($this->fixture->getAutoloaderConfig()));
    }
}
