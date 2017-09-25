<?php
/**
 * Created by unkown ide ps.
 * User: phantom
 * Date Time: 9/23/17 1:11 PM
 */
namespace Tests\Helper;

use Tests\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class HttpRequestTest extends TestCase
{
    protected $prefixUrl = 'http://127.0.0.1:8000';

    protected $method = 'POST';

    protected $data = [];

    public function data(array $data)
    {
        $data['csrf_token'] = csrf_token();
        $this->data = $data;
        $this->data = [
            'form_params' => $this->data,
        ];
        return $this;
    }

    public function request($uri, callable $callback)
    {
        try {
            $url = $this->prefixUrl . $uri;
            $client = new Client();
            $response = $client->request($this->method, $url, $this->data);
        } catch (\Exception $ex) {
            $this->assertTrue(false, $ex->getMessage());
            return false;
        }
        $this->assertTrue(
            $response->getStatusCode() === 200,
            'http code: ' . $response->getStatusCode()
        );

        $response->getData = [];
        try {
            $content = $response->getBody()->getContents();
            $response->getData = \GuzzleHttp\json_decode($content, true);
        } catch (\Exception $ex) {
        }
        $callback($response);
    }

    public function testRequest()
    {
        $this->method = 'GET';
        $this->request('/', function(Response $response) {
            $this->assertTrue($response->getStatusCode() === 200);
        });
    }

}