<?php

class PackageModel extends CI_Model
{
    private $tableName = "package";

    function __construct()
    {
        parent::__construct();
        $this->load->model("Global_m");
    }



    private $packageId;
    private $packageName;
    private $description;
    private $price;

    public function deletePackageById($id){
        $criteria = array(
            'packageId'=>$id
        );
       return $this->db->delete($this->tableName, $criteria);        
    }

    public function getDetailPackageById($id){
        $criteria = array(
            'packageId' => $id
        );
        $this->db->where($criteria);
        return $this->db->get($this->tableName)->row_object();

    }

    public function getListPackage()
    {
        $this->db->order_by('modifiedtm', 'DESC');
        return $this->db->get($this->tableName)->result();
    }

    public function savePackage(PackageModel $req)
    {
        $req->packageId = $this->Global_m->gen_uuid();
        $data = $this->arrayBuilder($req);
        $this->db->set($data);
        if($this->db->insert($this->tableName, $req)){
            if($this->db->affected_rows()!=1){
                return null;
            }
            return $data;
        }
    }

    public function updatePackage(PackageModel $req){
        $dto = $this->arrayBuilder($req);
        $this->db->update($this->tableName, $dto, array('packageId' => $req->packageId));
        return $this->db->affected_rows() == 1 ? $this->arrayBuilder($req) : null;
    }
    

    private function arrayBuilder(PackageModel $req){
        $data = array(
            "packageId"=>$req->packageId,
            "packageName"=>$req->packageName,
            "description"=>$req->description,
            "price"=>$req->price 
        );
        return $data;

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
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->packageName;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->packageName = $name;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }
}
