<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Support{

	var $CI;
    public function __construct($params = array())
    {
        $this->CI =& get_instance();
        $this->CI->load->database();
        $this->CI->load->library('session');
        $this->CI->load->library('upload');
        $this->CI->load->helper(array('form', 'url'));
    }

    public function register($r_data)
    {

    	$this->CI->db->insert(auth_table,$r_data);
    	if($this->CI->db->affected_rows() > 0){
    		if(session){
    			$this->start_session_now($r_data);
    		}
    		return true;
    	}else{
    		return false;
    	}
	}

	public function login($l_data)
    {

    	$this->CI->db->where($l_data);
    	$query = $this->CI->db->get(auth_table);
    	if($query->num_rows() == 1){
    		if(session){
    			$this->start_session_now($query->result_array()[0]);
    		}
    		return true;
    	}else{
    		return false;
    	}
	}

	public function start_session_now($data){
		$this->CI->session->set_userdata($data);
	}

    public function ses($name='',$print=false)
    {
        $res = $this->CI->session->userdata();
        if($print == true){
            print_r($res);
        }else{
            return $res;
        }
    }

    public function upload_file($file)
    {
        $config['upload_path'] = upload_folder;
        $this->upload->initialize($config);
        if(!$this->upload->do_upload($file))
        {
            $data = array('data' => $this->upload->display_errors());
            return $data;
        }
        else
        {
            $data = array('data' => $this->upload->data());
            return $data;
        }
    }
}

