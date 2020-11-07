<?php

namespace aliyun\sdk\core\lib;

use aliyun\sdk\Aliyun;
use aliyun\sdk\core\credentials\CredentialsInterface;
use aliyun\sdk\core\exception\InvalidParameterException;

/**
 * Class Request
 *
 * @package aliyun\sdk\core\lib
 */
class Request
{
    protected $service_code;
    protected $product   = "";
    protected $action    = "";
    protected $version   = "";
    protected $region    = "";
    protected $domain    = "";
    protected $endpoints = [];
    protected $protocol  = "http";

    public $params    = [];
    private $headers   = [];
    private $options   = [];
    private $curl_path = "/";
    private $format    = "json";
    private $method    = "POST";


    /**
     * @var CredentialsInterface credential name
     */
    protected $credential;

    public function product($product = null)
    {
        return $this->property("product", $product);
    }

    public function serviceCode($service_code = null)
    {
        if (!is_null($service_code)) {
            $this->service_code = $service_code;
        }
        return $this->service_code;
    }

    public function version($version = null)
    {
        return $this->property("version", $version);
    }

    public function region($region = null)
    {
        return $this->property("region", $region);
    }

    public function action($action_name = null)
    {
        return $this->property("action", $action_name);
    }

    public function domain($domain = null)
    {
        return $this->property("domain", $domain);
    }

    public function curlPath($curl_path = null)
    {
        return $this->property("curl_path", $curl_path);
    }

    public function endpoints($endpoints = null)
    {
        return $this->property("endpoints", $endpoints);
    }

    public function method($method = null)
    {
        if (is_null($method)) {
            return $this->method;
        }
        $this->method = strtoupper($method);
        return $this;
    }

    public function format($format = null)
    {
        if (is_null($format)) {
            return $this->format;
        }
        $this->format = strtolower($format);
        return $this;
    }

    public function protocol($protocol = null)
    {
        if (is_null($protocol)) {
            return $this->protocol;
        }
        $this->protocol = $protocol;
        return $this;
    }

    /**
     * @param CredentialsInterface|string $credentials
     *
     * @return CredentialsInterface
     */
    public function credential($credentials = null)
    {
        if (is_null($credentials)) {
            $credentials = $this->credential;
        }
        if (is_string($credentials)) {
            if (false !== strpos($credentials, "\\")) {
                $credentials = new $credentials();
            } else {
                $class       = "\\aliyun\\sdk\\core\\credentials\\" . $credentials;
                $credentials = new $class();
            }
            $this->credential = $credentials;
        }
        return $this->credential;
    }

    public function params($key = null, $value = null)
    {
        if (is_null($key)) {
            return $this->params;
        }
        if (is_null($value)) {
            return isset($this->params[$key]) ? $this->params[$key] : null;
        }
        $this->params[$key] = $value;
        return $this;
    }

    public function headers($key = null, $value = null)
    {
        if (is_null($key)) {
            return $this->headers;
        }
        if (is_null($value)) {
            return isset($this->headers[$key]) ? $this->headers[$key] : null;
        }
        $this->headers[$key] = $value;
        return $this;
    }

    public function options($key = null, $value = null)
    {
        if (is_null($key)) {
            return $this->options;
        }
        $this->options[$key] = $value;
        return $this;
    }

    /**
     * @param CredentialsInterface|null $credentials
     *
     * @return HttpResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request(CredentialsInterface $credentials = null)
    {
        $credentials = $this->credential($credentials);
        if (!$credentials instanceof CredentialsInterface) {
            throw new InvalidParameterException("$credentials must be 'CredentialsInterface'");
        }
        $credentials->init($this);

        $http = new Http($this->options);

        $response = $http->setMethod($this->method)
            ->setDomain($this->protocol . "://" . $this->domain)
            ->setHeaders($this->headers)
            ->setParam($this->params)
            ->send($this->curl_path);
        unset($http);

        return Aliyun::response($response);
    }

    protected function property($property, $value = null)
    {
        if (!is_null($value)) {
            $this->$property = $value;
        }
        return $this->$property;
    }
}
