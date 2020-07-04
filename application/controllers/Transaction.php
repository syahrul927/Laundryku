<?php
require_once "ParentControllerAdmin.php";
class Transaction extends ParentControllerAdmin
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("TransactionModel");
    }

    function index()
    {
        $this->load->view('_part/header');
        $this->load->view('package/packageView');
        $this->load->view('package/packageForm');
        $this->load->view('_part/footer');
    }
    function show($detail = null, $id = null)
    {
        $this->output
            ->set_content_type('application/json');

        $responseDto = new ResponseController();
        if (isset($detail)) {
            if (empty($id)) {
                $responseDto->setStatus(400);
                $responseDto->setSuccess(false);
                $this->responseBuilder($responseDto);
            }
            $responseDto->setContent($this->TransactionModel->getDetailTransactionById($id));
            $responseDto->setSuccess(true);
            $this->responseBuilder($responseDto);
        } else {
            $responseDto->setSuccess(true);
            $responseDto->setContent($this->TransactionModel->getListTransaction());
            $this->responseBuilder($responseDto);
        }
    }
    function history($customer = null){
        $this->output
            ->set_content_type('application/json');
            $responseDto = new ResponseController();
        if (isset($customer)) {
            $responseDto->setContent($this->TransactionModel->getListTransaction($customer));
            $responseDto->setSuccess(true);
            $this->responseBuilder($responseDto);
        } else {
            $responseDto->setStatus(400);
            $responseDto->setSuccess(false);
            $this->responseBuilder($responseDto);
        }

    }
    function save()
    {
        $this->output
            ->set_content_type('application/json');
        $responseDto = new ResponseController();
        if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['description'])) {
            $param = $this->postToDto();
            $res = $this->PackageModel->savePackage($param);
            if ($res == null) {
                $responseDto->setSuccess(false);
                $responseDto->setStatus(500);
            } else {
                $responseDto->setSuccess(true);
                $responseDto->setStatus(200);
                $responseDto->setContent($res);
            }
        $this->responseBuilder($responseDto);
        }
    }

    function update()
    {
        $this->output
            ->set_content_type('application/json');
        $responseDto = new ResponseController();
        if(empty($_POST['packageId'])){
            $responseDto->setStatus(400);
            $this->responseBuilder($responseDto);
        }
        $dto =  $this->postToDto(); 
        $res = $this->PackageModel->updatePackage($dto);
        if ($res == null) {
            $responseDto->setSuccess(false);
            $responseDto->setStatus(500);
        } else {
            $responseDto->setSuccess(true);
            $responseDto->setStatus(200);
            $responseDto->setContent($res);
        }
    $this->responseBuilder($responseDto);
    }
    function delete()
    {
        $this->output
            ->set_content_type('application/json');

        $responseDto = new ResponseController();
        if (isset($_POST['packageId'])) {
            $responseDto->setSuccess($this->PackageModel->deletePackageById($_POST['packageId']));
        } else {
            $responseDto->setSuccess(false);
            $responseDto->setStatus(400);
        }
        $this->responseBuilder($responseDto);
    }
    function logout()
    {
        session_destroy();
    }

    private function responseBuilder($responseDto)
    {
        $status = $responseDto->getStatus() == null ? 200 : $responseDto->getStatus();
        $responseDto->setStatus($status);
        $this->output
            ->set_status_header($status)
            ->set_output(json_encode($responseDto));
    }

    function postToDto()
    {
        $param = new $this->PackageModel();
        if (isset($_POST['packageId'])) {
            $param->setPackageId($_POST['packageId']);
        }
        $param->setName($_POST['name']);
        $param->setPrice($_POST['price']);
        $param->setDescription($_POST['description']);
        return $param;
    }
}
