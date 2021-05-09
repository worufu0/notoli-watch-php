<?php
require_once "config.php";
class DB
{
    public $con;
    protected $serverName = SERVER;
    protected $userName = USERNAME;
    protected $password = PASSWORD;
    protected $dbName = DBNAME;


    protected $emailUsername = EMAIL_USER;
    protected $emailPassword = EMAIL_PASSWORD;


    function __construct()
    {
        $this->con = mysqli_connect(SERVER, USERNAME, PASSWORD);
        mysqli_select_db($this->con, DBNAME);
        mysqli_query($this->con, "SET NAMES 'utf8'");
    }
}
