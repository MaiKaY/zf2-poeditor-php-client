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

namespace PhpClientPoeditor\Options;

use Zend\Stdlib\AbstractOptions;

/**
 * PhpClientPoeditor\Options\PoeditorOptions
 */
class PoeditorOptions extends AbstractOptions
{
    /** @var string */
    private $url;
    /** @var string */
    private $apiToken;
    /** @var int */
    private $projectId;
    /** @var array */
    private $languages = array();

    /**
     * @param string $apiToken
     *
     * @return PoeditorOptions
     */
    public function setApiToken($apiToken)
    {
        $this->apiToken = (string) $apiToken;
        return $this;
    }

    /**
     * @return string
     */
    public function getApiToken()
    {
        return $this->apiToken;
    }

    /**
     * @param array $languages
     *
     * @return PoeditorOptions
     */
    public function setLanguages($languages)
    {
        $this->languages = (array) $languages;
        return $this;
    }

    /**
     * @return array
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * @param int $projectId
     *
     * @return PoeditorOptions
     */
    public function setProjectId($projectId)
    {
        $this->projectId = (int) $projectId;
        return $this;
    }

    /**
     * @return int
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * @param string $url
     *
     * @return PoeditorOptions
     */
    public function setUrl($url)
    {
        $this->url = (string) $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}
