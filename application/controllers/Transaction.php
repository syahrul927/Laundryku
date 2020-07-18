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
        $this->load->view('transaction/transactionView');
        $this->load->view('transaction/transactionForm');
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
    function history($customer = null)
    {
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
        $req =  $this->requestBuilder();
        $this->output
            ->set_content_type('application/json');
        $responseDto = new ResponseController();
        if (isset($req['customerId']) && isset($req['packageId']) && isset($req['qty']) && isset($req['total']) && isset($_SESSION['username'])) {
            $param = $this->postToDto($req);
            $res = $this->TransactionModel->saveTransaction($param);
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

    function update($status = null)
    {
        $req =  $this->requestBuilder();
        $this->output
            ->set_content_type('application/json');
        $responseDto = new ResponseController();
        if (empty($req['orderId'])) {
            $responseDto->setSuccess(false);
            $responseDto->setStatus(400);
            $this->responseBuilder($responseDto);
        } else {
            if (isset($status)) {
                if (isset($req['statusCode'])) {
                    $responseDto->setSuccess(true);
                    $responseDto->setContent($this->TransactionModel->updateStatusTransaction($req['orderId'], $req['statusCode']));
                } else {
                    $responseDto->setSuccess(false);
                    $responseDto->setStatus(400);
                }
            } else {

                $dto =  $this->postToDto($req);
                $res = $this->TransactionModel->updateTransaction($dto);
                if ($res == null) {
                    $responseDto->setSuccess(false);
                    $responseDto->setStatus(500);
                } else {
                    $responseDto->setSuccess(true);
                    $responseDto->setStatus(200);
                    $responseDto->setContent($res);
                }
            }
        }
        $this->responseBuilder($responseDto);
    }
    function delete()
    {
        $this->output
            ->set_content_type('application/json');

        $responseDto = new ResponseController();
        if (isset($_POST['orderId'])) {
            $responseDto->setSuccess($this->TransactionModel->deleteTransactionById($_POST['orderId']));
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
        $param = new $this->TransactionModel();
        if (isset($req['orderId'])) {
            $param->setTransactionId($req['orderId']);
        }
        $param->setCustomerId($req['customerId']);
        $param->setPackageId($req['packageId']);
        $param->setQty($req['qty']);
        $param->setTotal($req['total']);
        $param->setKasirId($_SESSION['username']);
        $param->setDelivery($req['delivery']);
        $param->setExtraCost($req['extraCost']);
        return $param;
    }
    
    public function exportpdf(){

        $req =  $this->requestBuilder();
        $data['listTrans'] = $this->TransactionModel->getListTransaction($req['customerId'], $req['dateFrom'], $req['dateTo']);
        // var_dump($data);
        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "transaksi ".$data['listTrans'][0]->name."_".$req['dateFrom']."-".$req['dateTo'].".pdf";
        $this->pdf->load_view('report', $data);
    
    
    }
    public function report(){
        
        $this->load->view('_part/header');
        $this->load->view('report/reportForm');
        $this->load->view('_part/footer');
    }
}
