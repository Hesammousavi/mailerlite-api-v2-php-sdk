<?php

namespace MailerLiteApi\Api;

use MailerLiteApi\Common\ApiAbstract;

/**
 * Class Settings
 *
 * @package MailerLiteApi\Api
 */
class Settings extends ApiAbstract {

    protected $endpoint = 'settings';

    /**
     * Retrieve double opt in status
     *
     * @return mixed
     */
    public function getDoubleOptin()
    {
        $endpoint = $this->endpoint . '/double_optin';

        return $this->restClient->get( $endpoint );
    }

    public function setDoubleOptin( $status ) {

        $endpoint = $this->endpoint . '/double_optin';

        $params = array_merge($this->prepareParams(), ['enable' => $status] );

        return $this->restClient->post( $endpoint, $params );
    }

}
