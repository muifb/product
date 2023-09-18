<?php

namespace MyApp\Core;

class App
{
    protected $controller = 'Auth';
    protected $method = 'index';
    protected $params = [];

    private const DEFAULT_GET = 'GET';
    private const DEFAULT_POST = 'POST';
    private $handlers = [];
    private $namespace = 'MyApp\Controllers';

    public function setNamespace($namespace)
    {
        $this->namespace = $namespace;
    }

    public function setDefaultController($controller)
    {
        $this->controller = $controller;
    }

    public function setDefaultMethod($method)
    {
        $this->method = $method;
    }

    public function get($uri, $callback)
    {
        $this->setHandler(self::DEFAULT_GET, $uri, $callback);
    }

    public function post($uri, $callback)
    {
        $this->setHandler(self::DEFAULT_POST, $uri, $callback);
    }

    private function setHandler(string $method, string $path, $handler)
    {
        $this->handlers[$method . $path] = [
            'path' => $path,
            'method' => $method,
            'handler' => $handler,
        ];
    }

    public function run()
    {
        $excecute = 0;
        $url = $this->parseURL();
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        foreach ($this->handlers as $handler) {
            $path = explode('/', ltrim(rtrim($handler['path'], '/'), '/'));
            $kurl = (isset($url[0]) ? $url[0] : '') . (isset($url[1]) ? $url[1] : '');
            $kpath = (isset($path[0]) ? $path[0] : '') . (isset($path[1]) ? $path[1] : '');
            if ($kurl != "" && $kurl == $kpath && $requestMethod == $handler['method']) {
                //controller
                // if (isset($handler['handler'][0]) && class_exists($this->namespace . '\\' . $handler['handler'][0])) {
                if (isset($handler['handler'][0]) && class_exists($handler['handler'][0])) {
                    $this->controller = $handler['handler'][0];
                    unset($url[0]);
                }
                // create object
                $fn = $this->controller;
                $this->controller = new $fn;
                $excecute = 1;

                //method
                if (isset($handler['handler'][1]) && method_exists($this->controller, $handler['handler'][1])) {
                    $this->method = $handler['handler'][1];
                    unset($url[1]);
                }
            }
        }

        // create Object
        if ($excecute == 0) {
            $fn = $this->namespace . '\\' . $this->controller;
            $this->controller = new $fn;
        }

        //params
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // run controller & method, and send params if set
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        $uri = urldecode(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? ''
        );

        if (isset($uri)) {
            $uri = ltrim(rtrim($uri, '/'), '/');
            $uri = filter_var($uri, FILTER_SANITIZE_URL);
            $uri = explode('/', $uri);
            return $uri;
        }
    }
}
