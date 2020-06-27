<?php
class CustomerModel extends CI_Model
{
    private $tableName = "customer";

    function __construct()
    {
        parent::__construct();
        $this->load->model("Global_m");
    }



    private $customerId;
    private $name;
    private $address;
    private $telp;

    public function getListCustomer()
    {
        $this->db->order_by('modifiedtm', 'DESC');
        return $this->db->get($this->tableName)->result();
    }

    
    public function deleteCustomerById($id){
        $criteria = array(
            'customerId'=>$id
        );
       return $this->db->delete($this->tableName, $criteria);        
    }
    
    public function getDetailCustomerById($id){
        $criteria = array(
            'customerId' => $id
        );
        $this->db->where($criteria);
        return $this->db->get($this->tableName)->row_object();

    }


    public function saveCustomer(CustomerModel $req)
    {
        $req->customerId = $this->Global_m->gen_uuid();
        $data = $this->arrayBuilder($req);
        $this->db->set($data);
        if($this->db->insert($this->tableName, $req)){
            if($this->db->affected_rows()!=1){
                return null;
            }
            return $data;
        }
    }

    public function updateCustomer(CustomerModel $req){
        $dto = $this->arrayBuilder($req);
        $this->db->update($this->tableName, $dto, array('customerId' => $req->customerId));
        return $this->db->affected_rows() == 1 ? $this->arrayBuilder($req) : null;
    }
    

    private function arrayBuilder(CustomerModel $req){
        $data = array(
            "customerId"=>$req->customerId,
            "name"=>$req->name,
            "address"=>$req->address,
            "telp"=>$req->telp 
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
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of telp
     */
    public function getTelp()
    {
        return $this->telp;
    }

    /**
     * Set the value of telp
     *
     * @return  self
     */
    public function setTelp($telp)
    {
        $this->telp = $telp;

        return $this;
    }
}
