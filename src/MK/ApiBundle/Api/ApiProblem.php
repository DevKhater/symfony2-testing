<?php

namespace MK\ApiBundle\Api;

/**
 * A wrapper for holding data to be used for a application/problem+json response
 */
class ApiProblem
{

    private $statusCode;
    private $type;
    private $title;
    private $extraData = array();

    public function __construct($statusCode, $type=null, $title)
    {
        $this->statusCode = $statusCode;
        $this->type = $type;
        $this->title = 'API Problem: ' . $title;
    }

    public function toArray()
    {
        return array_merge(
                $this->extraData, array(
            'status' => $this->statusCode,
            'type' => $this->type,
            'title' => $this->title,
                )
        );
    }

    public function set($name, $value)
    {
        $this->extraData[$name] = $value;
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function getTitle()
    {
        return $this->title;
    }

}
