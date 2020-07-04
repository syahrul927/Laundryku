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

    public function deleteTransactionById($id){
        $criteria = array(
            'orderId'=>$id
        );
       return $this->db->delete($this->tableName, $criteria);        
    }

    public function getDetailTransactionById($id){
        $criteria = array(
            'orderId' => $id
        );
        $this->db->where($criteria);
        return $this->db->get($this->tableName)->row_object();

    }

    public function getListTransaction($customerId = null)
    {
        if(isset($customerId)){
            $this->db->where("ordertrans.customerId", $customerId);
        }
        $this->db->join('package', 'package.packageId = ordertrans.packageId');
        $this->db->join('customer', 'customer.customerId = ordertrans.customerId');
        $this->db->order_by('ordertrans.modifiedtm', 'DESC');
        return $this->db->get($this->tableName)->result();
    }


    public function saveTransaction(TransactionModel $req)
    {
        $req->orderId = $this->Global_m->gen_uuid();
        $data = $this->arrayBuilder($req);
        $this->db->set($data);
        if($this->db->insert($this->tableName, $req)){
            if($this->db->affected_rows()!=1){
                return null;
            }
            return $data;
        }
    }

    public function updatePackage(TransactionModel $req){
        $dto = $this->arrayBuilder($req);
        $this->db->update($this->tableName, $dto, array('orderId' => $req->orderId));
        return $this->db->affected_rows() == 1 ? $this->arrayBuilder($req) : null;
    }
    

    private function arrayBuilder(TransactionModel $req){
        $data = array(
            "orderId"=>$req->orderId,
            "customerId"=>$req->customerId,
            "packageId"=>$req->packageId,
            "total"=>$req->total,
            "qty"=>$req->qty,
            "kasirId"=>$req->kasirId,
            "delivery"=>$req->delivery,
            "extraCost"=>$req->extraCost,
            "statusCode"=>$req->statusCode,
        );
        return $data;

    }
}
