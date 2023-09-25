<?php

namespace MailerLiteApi\Api;

use MailerLiteApi\Common\ApiAbstract;

/**
 * Class Groups
 *
 * @package MailerLiteApi\Api
 */
class Groups extends ApiAbstract {

    protected $endpoint = 'groups';

    /**
     * Get subscribers from group
     * @param  int    $groupId
     * @param  string $type
     * @param  array  $params
     * @return [type]
     */
    public function getSubscribers($groupId, $type = null, $params = [])
    {
        $endpoint = $this->endpoint . '/' . $groupId . '/subscribers';

        if ($type !== null) {
            $endpoint .=  '/' . $type;
        }

        $params = array_merge($this->prepareParams(), $params);

        return $this->restClient->get($endpoint, $params);
    }

    /**
     * Get single subscriber from group
     *
     * @param $groupId
     * @param $subscriberId
     * @return mixed
     */
    public function getSubscriber($groupId, $subscriberId)
    {
        $endpoint = $this->endpoint . '/' . $groupId . '/subscribers/' . urlencode($subscriberId);

        return $this->restClient->get($endpoint);
    }


    /**
     * Add single subscriber to group
     *
     * @param int   $groupId
     * @param array $subscriberData
     * @param array $params
     * @return [type]
     */
    public function addSubscriber($groupId, $subscriberData = [], $params = [])
    {
        $endpoint = $this->endpoint . '/' . $groupId . '/subscribers';

        return $this->restClient->post($endpoint, $subscriberData);
    }

    /**
     * Remove subscriber from group
     *
     * @param  int $groupId
     * @param  int $subscriberId
     * @return [type]
     */
    public function removeSubscriber($groupId, $subscriberId)
    {
        $endpoint = $this->endpoint . '/' . $groupId . '/subscribers/' . urlencode($subscriberId);

        return $this->restClient->delete($endpoint);
    }

    /**
     * Batch add subscribers to group
     *
     * @param  int $groupId
     * @param  array $subscribers
     * @param  array $options
     * @return [type]
     */
    public function importSubscribers(
        $groupId,
        $subscribers,
        $options = [
            'resubscribe' => false,
            'autoresponders' => false
        ]
    ) {
        $endpoint = $this->endpoint . '/' . $groupId . '/subscribers/import';

        return $this->restClient->post($endpoint, array_merge(['subscribers' => $subscribers], $options));
    }

    /**
    * @param  string $groupName
    * @return [type]
    */
    public function search($groupName)
    {
        $endpoint = $this->endpoint . '/search';

        return $this->restClient->post($endpoint, [
            'group_name' => $groupName
        ]);
    }
}
