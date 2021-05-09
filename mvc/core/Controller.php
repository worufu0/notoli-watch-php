<?php
class Controller
{

    protected $request = null;

    public function __construct()
    {
        $this->request = new Request();
    }

    public function model($model)
    {
        require_once(APPLICATION_PATH . "/mvc/models/" . $model . ".php");
        return new $model;
    }
    public function view($view, $data = [])
    {
        $isAdminRequest = isAdminPath();
        $viewPath = APPLICATION_PATH . "/mvc/views/";
        if ($isAdminRequest) {
            $viewPath = APPLICATION_PATH . "/admincp/views/";
        }

        require_once($viewPath . $view . ".php");
    }
}
