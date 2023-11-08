<?php
    function insert_refresh_token($data){
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));
        for ($i = 0; $i < 20; $i++) {
            $key .= $keys[array_rand($keys)];
        }
        $token = 'Bearer-'.$key;
        $op = & get_instance();
        $op->db->where($data);
        $op->db->update('tbl_customer', array('reset_token'=>$token)); 
        return $token;
    }
    function delete_refresh_token($data){
        $op = & get_instance();
        $op->db->where($data);
        $op->db->update('tbl_customer', array('reset_token'=>NULL)); 
        //echo $op->db->last_query();die;
    }
    function verify_user(){//echo trim(get_instance()->input->request_headers()['Authorization']);die;
              get_instance()->db->select('*')->from('tbl_customer');
              get_instance()->db->where('reset_token', trim(get_instance()->input->request_headers()['Authorization']));
              return    get_instance()->db->get()->result();
    }
?>