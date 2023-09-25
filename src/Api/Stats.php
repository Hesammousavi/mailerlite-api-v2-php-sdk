<?php

namespace MailerLiteApi\Api;

use MailerLiteApi\Common\ApiAbstract;

/**
 * Class Stats
 *
 * @package MailerLiteApi\Api
 */
class Stats extends ApiAbstract {

    protected $endpoint = 'stats';

    public function get($fields = [])
    {
        return $this->restClient->get($this->endpoint, []);
    }

    public function getHistorical($timestamp)
    {
        return $this->restClient->get($this->endpoint, ['timestamp' => $timestamp]);
    }

}
