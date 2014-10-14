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

namespace PhpClientPoeditor\Service;

use PhpClientPoeditor\Options\Options;
use PhpClientPoeditor\Strategy\StrategyInterface;
use Zend\Http;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;

/**
 * PhpClientPoeditor\Service\ClientService
 */
class ClientService implements ServiceLocatorAwareInterface
{
    use ServiceLocatorAwareTrait;

    /** @var Options */
    private $options;
    /** @var array */
    private $validTypes = array(
        'po',
        'pot',
        'mo',
        'xls',
        'apple_strings',
        'android_strings',
        'resx',
        'resw',
        'properties',
        'json',
    );

    /**
     * @param Options $options
     */
    public function __construct(Options $options)
    {
        $this->options = $options;
    }

    /**
     * @return void
     * @throws \DomainException
     */
    public function build()
    {
        foreach ($this->options->getStrategies() as $contentType => $fqnStrategy) {
            if (!$this->isValidType($contentType)) {
                throw new \DomainException('Invalid Type (' . $contentType . ')');
            }
            $strategy = $this->getStrategy($fqnStrategy);
            foreach ($this->options->getLanguages() as $languageKey => $languageProjectKey) {
                $data = array(
                    'type'     => $contentType,
                    'language' => $languageKey,
                );
                $content = file_get_contents($this->getFile($data));
                $content = $strategy->build($content);

                $file = $languageProjectKey . '.' . $contentType;
                $this->writeFile($strategy->getSavePath() . '/' . $file, $content);
            }
        }
    }

    /**
     * @param array $data
     *
     * @return string
     * @throws \RuntimeException
     */
    private function getFile(array $data)
    {
        $data = array_merge(
            array(
                'api_token' => $this->options->getApiToken(),
                'action'    => 'export',
            ),
            $data
        );

        $adapter = new Http\Client\Adapter\Curl;
        $client = new Http\Client;
        $client->setAdapter($adapter);

        $request = new Http\Request;
        $request->setUri($this->options->getUrl());
        $request->setMethod(Http\Request::METHOD_POST);
        $request->setContent(http_build_query($data));

        /** @var \Zend\Http\Response $response */
        $response = $client->dispatch($request);

        if (!$response->isSuccess()) {
            throw new \RuntimeException('Request was not successful');
        }

        /** @var \stdClass $content */
        $content = json_decode($response->getContent());
        if ($content->response->code != 200) {
            throw new \RuntimeException($content->response->message);
        }

        return $content->item;
    }

    /**
     * @param string $file
     * @param string $data
     *
     * @return void
     */
    private function writeFile($file, $data)
    {
        $handler = fopen($file, 'w+');

        if ($handler !== false) {
            fwrite($handler, $data, strlen($data));
            fflush($handler);
            fclose($handler);
            chmod($file, 0777);
        }
    }

    /**
     * @param string $type
     *
     * @return bool
     */
    private function isValidType($type)
    {
        return in_array($type, $this->validTypes);
    }

    /**
     * @param string $alias
     *
     * @return StrategyInterface
     * @throws \RuntimeException
     */
    private function getStrategy($alias)
    {
        $strategy = $this->getServiceLocator()->get($alias);
        if (!$strategy instanceof StrategyInterface) {
            throw new \RuntimeException(
                'Requested Strategy must implement PhpClientPoeditor\Strategy\StrategyInterface'
            );
        }
        return $strategy;
    }
}
