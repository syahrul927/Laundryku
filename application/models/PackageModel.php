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
    private $name;
    private $description;
    private $price;

    public function getListPackage()
    {
        return $this->db->get($this->tableName)->result();
    }

    public function savePackage(PackageModel $req)
    {
        $req->packageId = $this->Global_m->gen_uuid();
        if($this->db->insert($this->tableName, $req)){
            return $this->db->insert_id();
        }
    }
}
