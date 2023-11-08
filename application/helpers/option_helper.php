<?php

function get_option($para){
   $op = & get_instance();
   
   $op->db->select($para);
   $op->db->from('tbl_option');
   $res = $op->db->get();
   $result =  $res->row();
   
   echo $result->$para;
}

function sendmail($to=NULL,$subject=NULL,$message=NULL) {
   $ci = & get_instance();
  $config['protocol']    = 'smtp';
  $config['smtp_host']    = 'ssl://smtp.googlemail.com';
  $config['smtp_port']    = 465;
  $config['smtp_timeout'] = '7';
  $config['smtp_user']    = 'shopquicky.marketing@gmail.com';
  $config['smtp_pass']    = 'vjjmdqvftzpwupzv';
  $config['charset']    = 'iso-8859-1';
  $config['newline']    = "\r\n";
  $config['mailtype'] = 'html'; // or html
  $config['validation'] = TRUE; // bool whether to validate email or not      


  $ci->load->library('email',$config);

     
      $ci->email->from('ShopQuicky');
      $ci->email->to($to);
     //$ci->email->cc('asclavistech@gmail.com');

      $ci->email->subject($subject);
      $ci->email->message($message);
      
  //print_r($ci->email->subject($subject));

  //print_r($ci->email->print_debugger());



      if($ci->email->send())
      {
     return true;
      }
      else{
     return false;
     print_r($ci->email->print_debugger());
      }
}