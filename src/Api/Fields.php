<?php

namespace MailerLiteApi\Api;

use MailerLiteApi\Common\ApiAbstract;

/**
 * Class Fields
 *
 * @package MailerLiteApi\Api
 */
class Fields extends ApiAbstract {

    protected $endpoint = 'fields';

    public function getAccountFields() {

        return $this->restClient->get($this->endpoint);
    }

}
