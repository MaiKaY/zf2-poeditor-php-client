<?php

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
