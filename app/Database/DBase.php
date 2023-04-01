<?php

class DBase extends Base
{
    protected $db_host = "localhost";
    protected $db_user = "root";
    protected $db_pass = "";
    protected $db_name = "product_order";

    protected $con;
    public $single = false;
    public $result = [];
    protected $myQuery = "";
    protected $numResults = "";
}