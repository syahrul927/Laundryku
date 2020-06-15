<?php
require_once "ParentControllerAdmin.php";
class Package extends ParentControllerAdmin
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("PackageModel");
    }

    function index()
    {
        echo "index Package";
    }
    function show($detail = null, $id = null)
    {
        if (isset($detail) && isset($id)) {
            echo "detail here";
        } else {
            echo json_encode($this->PackageModel->getListPackage());
        }
    }

    function logout()
    {
        session_destroy();
    }
}
