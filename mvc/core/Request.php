<?php

class Request
{
    public function getValue($data, $key = null)
    {
        if (isset($data[$key])) {
            return $data[$key];
        }

        if (is_null($key)) {
            return $data;
        }

        return null;
    }

    public function getPost($name = null)
    {
        $rawValue = $this->getValue($_POST, $name);
        $encodeValue = htmlspecialchars($rawValue);
        // $decodeValue = htmlspecialchars_decode($encodeValue);

        return $encodeValue;
    }

    public function isPost($name = null)
    {
        if (is_null($name) && count($_POST) > 0) {
            return true;
        }

        if (isset($_POST[$name])) {
            return true;
        }
        return false;
    }

    public function getQuery($name = null)
    {
        $rawValue = $this->getValue($_GET, $name);
        $encodeValue = htmlspecialchars($rawValue);
        // $decodeValue = htmlspecialchars_decode($encodeValue);

        return $encodeValue;
    }

    public function isQuery($name = null)
    {
        if (is_null($name) && count($_GET) > 0) {
            return true;
        }

        if (isset($_GET[$name])) {
            return true;
        }
        return false;
    }
}
