<?php

namespace PhpClientPoeditorTest\Options;

use PhpClientPoeditor\Options\OptionsFactory;

/**
 * PhpClientPoeditorTest\Options\OptionsFactoryTest
 */
class OptionsFactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @var OptionsFactory */
    protected $fixture;

    public function setUp()
    {
        $this->fixture = new OptionsFactory;
    }

    public function testImplementsFactoryInterface()
    {
        $this->assertInstanceOf('Zend\ServiceManager\FactoryInterface', $this->fixture);
    }

    public function testCreateService()
    {
        $config = array(
            'PhpClientPoeditor' => array(
                'options' => array(),
            ),
        );

        $serviceLocatorMock = \Mockery::mock('Zend\ServiceManager\ServiceLocatorInterface');
        $serviceLocatorMock->shouldReceive('get')->with('Config')->andReturn($config);

        $instance = $this->fixture->createService($serviceLocatorMock);
        $this->assertInstanceOf('PhpClientPoeditor\Options\Options', $instance);
    }
}
