<?php
class Route
{
    protected $controller = "home";
    protected $method = "Action";
    protected $params = [];

    function __construct()
    {
        $request = $this->getRoute();
        if (empty($request)) {
            $request[0] = "home";
        }

        if (file_exists(APPLICATION_PATH . "/mvc/controllers/" . $request[0] . ".php")) {
            $this->controller = $request[0];
            unset($request[0]);
        }
        require_once(APPLICATION_PATH . "/mvc/controllers/" . $this->controller . ".php");
        $this->controller = new $this->controller;

        if (isset($request[1])) {
            if (method_exists($this->controller, $request[1])) {
                $this->method = $request[1];
            }
            unset($request[1]);
        }

        if ($request) {
            $this->params = array_values($request);
        }
        //$this->params = $request?array_values($request):[];
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    function getRoute()
    {
        if (isset($_GET["url"])) {
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
    }
}
