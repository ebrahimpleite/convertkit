<?php

namespace EbrahimPLeite\ConvertKit;

/**
 * Class ConvertKit
 *
 * @author Ebrahim P. Leite <https://github.com/ebrahimpleite>
 * @package EbrahimPLeite\ConvertKit
 */
class ConvertKit
{
    /** @var string */
    private $url;
    /** @var string */
    private $endPoint;
    /** @var string */
    private $callback;
    /** @var array */
    private $params;

    /**
     * ConvertKit constructor.
     * @param string $api_key
     * @param string|null $api_secret
     */
    public function __construct(string $api_key, string $api_secret = null)
    {
        $this->url = "https://api.convertkit.com";
        $this->params = [
            "api_key" => $api_key,
            "api_secret" => $api_secret
        ];
    }

    /**
     * @param string $form_id
     * @param string $email
     * @param string|null $first_name
     * @param array|null $tags
     * @param string|null $last_name
     * @return object
     */
    public function addSubscribe(string $form_id, string $email, string $first_name = null, array $tags = null, string $last_name = null)
    {
        $this->endPoint = "/v3/forms/{$form_id}/subscribe";
        $this->params += [
            "first_name" => $first_name,
            "email" => $email,
            "tags" => $tags,
            "fields" => [
                "last_name" => $last_name
            ]
        ];

        $this->post();
        return $this->callback;
    }

    /**
     * @param string $email
     * @return object
     */
    public function removeSubscribe(string $email)
    {
        $this->endPoint = "/v3/unsubscribe";
        $this->params += [
            "email" => $email
        ];

        $this->put();
        return $this->callback;
    }

    /**
     * PRIVATE METHODS
     */
    private function post()
    {
        $url = $this->url . $this->endPoint;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, "");
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($this->params));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json"
        ]);
        $this->callback = json_decode(curl_exec($ch));
        curl_close($ch);
    }

    private function put()
    {
        $url = $this->url . $this->endPoint;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, "");
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($this->params));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json"
        ]);
        $this->callback = json_decode(curl_exec($ch));
        curl_close($ch);
    }
}