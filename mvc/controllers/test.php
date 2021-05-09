<?php
class test extends Controller
{
    public $prod;
    public $cart;
    public function __construct()
    {
    }
    public function Action()
    {
        $page = $_GET["action"];
        //exit($page);
        $this->view("AdminLayout", [
            "page" => "$page",
        ]);
    }
}
