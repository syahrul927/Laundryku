<?php

    class Global_m extends CI_Model 
    {
        function cek_login_m($table, $kondisi)
        {
            return $this->db->get_where($table, $kondisi);
        }	
    }
    
?>