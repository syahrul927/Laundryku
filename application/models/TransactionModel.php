<?php

class TransactionModel extends CI_Model
{
    private $tableName = "ordertrans";

    function __construct()
    {
        parent::__construct();
        $this->load->model("Global_m");
    }


    private $orderId;
    private $customerId;
    private $packageId;
    private $qty;
    private $total;
    private $kasirId;
    private $delivery;
    private $extraCost;
    private $statusCode;
    
    public function deleteTransactionById($id)
    {
        $criteria = array(
            'orderId' => $id
        );
        return $this->db->delete($this->tableName, $criteria);
    }

    public function getDetailTransactionById($id)
    {
        $criteria = array(
            'orderId' => $id
        );
        $this->db->where($criteria);
        return $this->db->get($this->tableName)->row_object();
    }

    public function countTransactionByPackage(){
        $this->db->select('package.packageName, count(ordertrans.orderId) total');
        $this->db->join('package', 'package.packageId=ordertrans.packageId');
        $this->db->group_by('ordertrans.packageId');        
        return $this->db->get($this->tableName)->result();
    }
    public function countTransactionByMonth(){
        $this->db->select('count(orderId) total, MONTHNAME(createtm) month');
        $this->db->where('YEAR(createtm)', date("Y"));
        $this->db->group_by('YEAR(createtm), MONTHNAME(createtm) ');    
        $this->db->order_by('createtm', 'asc'); 
        return $this->db->get($this->tableName)->result();   

    }

    public function getListTransaction($customerId = null, $dateFrom = null, $dateTo = null)
    {
        $this->db->select('ordertrans.orderId, package.price, ordertrans.customerId, kasir.nama as namakasir, ordertrans.packageId, ordertrans.qty,ordertrans.total, ordertrans.kasirId, ordertrans.delivery,ordertrans.extraCost, ordertrans.statusCode, ordertrans.createtm, ordertrans.modifiedtm, customer.name, package.packageName');
        if (isset($customerId)) {
            $this->db->where("ordertrans.customerId", $customerId);
        }  
        if (isset($dateFrom)) {
            $this->db->where("ordertrans.createtm > ", $dateFrom);
        }
        if (isset($dateTo)) {
            $this->db->where("ordertrans.createtm < ", $dateTo);
        }
        $this->db->join('package', 'package.packageId = ordertrans.packageId');
        $this->db->join('kasir', 'kasir.kasirId = ordertrans.kasirId');
        $this->db->join('customer', 'customer.customerId = ordertrans.customerId');
        $this->db->order_by('ordertrans.modifiedtm', 'DESC');
        return $this->db->get($this->tableName)->result();
    }


    public function saveTransaction(TransactionModel $req)
    {
        $req->orderId = $this->Global_m->gen_uuid();
        $req->statusCode=10;
        $data = $this->arrayBuilder($req);
        $this->db->set($data);
        if ($this->db->insert($this->tableName, $req)) {
            if ($this->db->affected_rows() != 1) {
                return null;
            }
            return $data;
        }
    }

    public function updateTransaction(TransactionModel $req)
    {
        $dto = $this->arrayBuilder($req);
        $this->db->update($this->tableName, $dto, array('orderId' => $req->orderId));
        return $this->db->affected_rows() == 1 ? $this->arrayBuilder($req) : null;
    }

    public function updateStatusTransaction($orderId, $status)
    {
        $trans = $this->getDetailTransactionById($orderId);
        // $dto = new TransactionModel();
        // $dto->orderId = $trans->orderId;
        // $dto->customerId = $trans->customerId;
        // $dto->packageId = $trans->packageId;
        // $dto->total = $trans->total;
        // $dto->qty = $trans->qty;
        // $dto->kasirId = $trans->kasirId;
        // $dto->delivery = $trans->delivery;
        // $dto->extraCost = $trans->extraCost;
        // $dto->statusCode = $status;
        $trans->statusCode = $status;
        $this->db->set($trans);
        $this->db->update($this->tableName, $trans, array('orderId' => $orderId));
        return $this->db->affected_rows() == 1 ? $this->arrayBuilder($trans) : null;
        // var_dump($trans->statusCode);
    }

    private function arrayBuilder(Object $req)
    {
        $data = array(
            "orderId" => $req->orderId,
            "customerId" => $req->customerId,
            "packageId" => $req->packageId,
            "total" => $req->total,
            "qty" => $req->qty,
            "kasirId" => $req->kasirId,
            "delivery" => $req->delivery,
            "extraCost" => $req->extraCost,
            "statusCode" => $req->statusCode,
        );
        return $data;
    }

    /**
     * Get the value of customerId
     */ 
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Set the value of customerId
     *
     * @return  self
     */ 
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;

        return $this;
    }

    /**
     * Get the value of orderId
     */ 
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Set the value of orderId
     *
     * @return  self
     */ 
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * Get the value of packageId
     */ 
    public function getPackageId()
    {
        return $this->packageId;
    }

    /**
     * Set the value of packageId
     *
     * @return  self
     */ 
    public function setPackageId($packageId)
    {
        $this->packageId = $packageId;

        return $this;
    }

    /**
     * Get the value of qty
     */ 
    public function getQty()
    {
        return $this->qty;
    }

    /**
     * Set the value of qty
     *
     * @return  self
     */ 
    public function setQty($qty)
    {
        $this->qty = $qty;

        return $this;
    }

    /**
     * Get the value of total
     */ 
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set the value of total
     *
     * @return  self
     */ 
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get the value of kasirId
     */ 
    public function getKasirId()
    {
        return $this->kasirId;
    }

    /**
     * Set the value of kasirId
     *
     * @return  self
     */ 
    public function setKasirId($kasirId)
    {
        $this->kasirId = $kasirId;

        return $this;
    }

    /**
     * Get the value of delivery
     */ 
    public function getDelivery()
    {
        return $this->delivery;
    }

    /**
     * Set the value of delivery
     *
     * @return  self
     */ 
    public function setDelivery($delivery)
    {
        $this->delivery = $delivery;

        return $this;
    }

    /**
     * Get the value of extraCost
     */ 
    public function getExtraCost()
    {
        return $this->extraCost;
    }

    /**
     * Set the value of extraCost
     *
     * @return  self
     */ 
    public function setExtraCost($extraCost)
    {
        $this->extraCost = $extraCost;

        return $this;
    }

    /**
     * Get the value of statusCode
     */ 
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Set the value of statusCode
     *
     * @return  self
     */ 
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }
}
