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
            $responseDto->setContent($this->PackageModel->getDetailPackageById($id));
            $responseDto->setSuccess(true);
            $this->responseBuilder($responseDto);
        } else {
            $responseDto->setSuccess(true);
            $responseDto->setContent($this->PackageModel->getListPackage());
            $this->responseBuilder($responseDto);
        }
    }
    function save()
    {
        $req =  $this->requestBuilder();
        
        $this->output
            ->set_content_type('application/json');
        $responseDto = new ResponseController();
        if (null != $req['name'] && null != $req['price'] && null != $req['description']) {
            $param = $this->postToDto($req);
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
        $req =  $this->requestBuilder();
        $this->output
            ->set_content_type('application/json');
        $responseDto = new ResponseController();
        if(empty($req['packageId'])){
            $responseDto->setStatus(400);
            $this->responseBuilder($responseDto);
        }
        $dto =  $this->postToDto($req); 
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
        $req =  $this->requestBuilder();
        $this->output
            ->set_content_type('application/json');

        $responseDto = new ResponseController();
        if (isset($req['packageId'])) {
            $responseDto->setSuccess($this->PackageModel->deletePackageById($req['packageId']));
        } else {
            $responseDto->setSuccess(false);
            $responseDto->setStatus(400);
        }
        $this->responseBuilder($responseDto);
    }

    private function responseBuilder($responseDto)
    {
        $status = $responseDto->getStatus() == null ? 200 : $responseDto->getStatus();
        $responseDto->setStatus($status);
        $this->output
            ->set_status_header($status)
            ->set_output(json_encode($responseDto));
    }

    function postToDto($req)
    {
        $param = new $this->PackageModel();
        if (isset($req['packageId'])) {
            $param->setPackageId($req['packageId']);
        }
        $param->setName($req['name']);
        $param->setPrice($req['price']);
        $param->setDescription($req['description']);
        return $param;
    }

}
