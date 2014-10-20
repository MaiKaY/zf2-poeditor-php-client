<?php

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
