<?php

use Behat\Behat\Context\Context;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    const URL = "http://localhost/";
    /**
     * @var Client
     */
    private $client;
    private $body;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->client = new Client([
            "base_uri" => self::URL
        ]);
    }

    /**
     * @Given the request body is:
     */
    public function theRequestBodyIs($body)
    {
        return $this->body = $body;
    }

    /**
     * @When I post to :uri
     */
    public function iPostTo($uri)
    {
        $this->response = $this->client->post($uri, [
            RequestOptions::JSON => json_decode($this->body, true)
        ]);
    }

    /**
     * @Then the code response should be :code
     */
    public function theCodeResponseShouldBe($code)
    {
        return $this->response->getStatusCode() == $code;
    }


}
