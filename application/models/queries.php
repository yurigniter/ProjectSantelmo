<?php

class Queries extends CI_Model
{
    public function select($field_name, $tbl_name, $where)
    {
        $query = $this->db->select($field_name)
                       ->from($tbl_name)
                       ->where($where)
                       ->get();
       
        if ($query->num_rows() > 0) {
            $result = $query->result_array();   
            
            return $result;
        }  
        return false;
    }
    
    public function select_logs($offset, $limit) {
        $query = $this->db->select("a.date, b.notif_time, b.resp_time, b.arvl_time, b.fout_time, c.location, d.substn_name, e.category_type")
            ->from("fire_info a")
            ->join("time_info b","a.fk_time = b.pk_time")
            ->join("location_info c","a.fk_loc=c.pk_loc")
            ->join("categ_info e","a.fk_categ=e.pk_categ")
            ->join("substation_info d","c.fk_substn=d.pk_substn")
            ->order_by("a.date","ASC")
            ->limit($limit,$offset)
            ->get();
            
         if ($query->num_rows() > 0) {
            $result = $query->result_array();   
            return $result;
        }  
        return false;
    }
    
    public function filter($where,$offset, $limit) {
        $query = $this->db->select("a.date, b.notif_time, b.resp_time, b.arvl_time, b.fout_time, c.location, d.substn_name, e.category_type")
            ->from("fire_info a")
            ->join("time_info b","a.fk_time = b.pk_time")
            ->join("location_info c","a.fk_loc=c.pk_loc")
            ->join("categ_info e","a.fk_categ=e.pk_categ")
            ->join("substation_info d","c.fk_substn=d.pk_substn")    
            ->order_by("a.date","ASC")
            ->limit($limit,$offset)
            ->where($where)
            ->get();
            
        if ($query->num_rows() > 0) {
            $result = $query->result_array();   
            return $result;
        }  
        return false;
    }
    
    public function select_locNS($select,$from){
        $query = $this->db->select($select)
                ->from($from)
                ->get();
                
        if ($query->num_rows() > 0) {
            $result = $query->result_array();   
            return $result;
        }  
        return false;
    }
}