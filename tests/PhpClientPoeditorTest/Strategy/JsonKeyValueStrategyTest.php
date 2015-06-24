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

namespace PhpClientPoeditorTest\Strategy;

use PhpClientPoeditor\Strategy\JsonKeyValueStrategy;

/**
 * PhpClientPoeditorTest\Strategy\JsonKeyValueStrategyTest
 */
class JsonKeyValueStrategyTest extends \PHPUnit_Framework_TestCase
{
    /** @var JsonKeyValueStrategy */
    protected $fixture;

    public function setUp()
    {
        $this->fixture = new JsonKeyValueStrategy;
    }

    public function testImplementsStrategyInterface()
    {
        $this->assertInstanceOf('PhpClientPoeditor\Strategy\StrategyInterface', $this->fixture);
    }

    public function testBuild()
    {
        $translation = new \stdClass;
        $translation->term = 'foo';
        $translation->definition = 'bar';
        $translations = array($translation);

        $expected = json_encode(
            array(
                'foo' => 'bar',
            )
        );

        $result = $this->fixture->build(json_encode($translations));
        $this->assertSame($expected, $result);
        $this->assertTrue(is_string($result));
    }
}
