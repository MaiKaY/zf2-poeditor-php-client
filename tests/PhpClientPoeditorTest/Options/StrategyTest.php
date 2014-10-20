<?php

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
