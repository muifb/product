<?php
class App
{
    protected $controller = 'Auth';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();
        // var_dump($url);

        //controller
        if (!empty($url[0]) && file_exists(__DIR__ . '/../controllers/' . ucwords($url[0]) . '.php')) {
            $this->controller = ucwords($url[0]);
            // var_dump($this->controller);
            unset($url[0]);
        }

        require_once(__DIR__ . '/../controllers/' . $this->controller . '.php');
        $this->controller = new $this->controller;

        //method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //params
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // jalankan controller & method, serta kirimkan params jika ada
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
        // if (isset($_SERVER['QUERY_STRING'])) {
        //     $url = rtrim($_SERVER['QUERY_STRING'], '/');
        //     // $url = filter_var($url, FILTER_SANITIZE_URL);
        //     // $url = explode('/', $url);
        //     return $url;
        // }
    }
}
