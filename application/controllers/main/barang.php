<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('model_data');
	}

	public function index()
    {
        $username = $this->session->userdata('username');
        $role = $this->session->userdata('role');
        if($username==""){
            $this->load->view('view_login');
        }
        else{
            if($role=="penyewa"){
                //$data['content'] = 'main/barang/lihat_barang';
                $data["produk"]=$this->model_data->getBarang();
                $this->load->view('main/barang/lihat_barang',$data);
            }
            if($role=="vendor"){
                //$data['content'] = 'main/barang/lihat_barang';
                $data["produk"]=$this->model_data->vendor_barang();
                $this->load->view('main/barang/lihat_barang',$data);
            }
        }

    }
    
    public function detail($id_barang=null)
    {
        $username = $this->session->userdata('username');
		if($username==""){
	   		$this->load->view('view_login');
	  	}
	  	else{
        $data["produk"]=$this->model_data->getDetail($id_barang);
        $this->load->view("main/barang/detail_barang",$data);
    	}
    }

    public function upload2()
    {
        $uploaddir = './assets/img/vendor/barang/';
        $uploadfile = $uploaddir . basename($_FILES['foto_barang']['name']);

        echo '<pre>';
        if (move_uploaded_file($_FILES['foto_barang']['tmp_name'], $uploadfile)) {
           // echo "File is valid, and was successfully uploaded.\n";
             $this->model_data->insert_image($_FILES['foto_barang']['name']);
        } else {
            echo "Possible file upload attack!\n";
        }

        // echo 'Here is some more debugging info:';
        // print_r($_FILES);

        // print "</pre>";
        redirect ('main/dashboard_ven');

    }

    public function get_profil_vendor($id_vendor){
        $data['content'] = 'main/profil_vendor';
		$data['vendor']=$this->model_data->getVendor($id_vendor);
		$this->load->view('main/dashboard_penyewa',$data);
    }

}
