<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_adm extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
    }
    
    public function index()
	{	
		$data['content'] = 'main/dash_admin_awal';
		$this->load->view('main/dashboard_admin',$data);	
		//$this->load->view('main/profil_penyewa');	
	}

	public function data_profil_admin()
	{
		$data['content'] = 'main/profil_admin';
		$data['admin']=$this->model_data->getAdmin($this->session->userdata('id_user')->id_user);
		$this->load->view('main/dashboard_admin',$data);	
	}

	public function data_vendor(){
		$data['content'] = 'main/admin/data_vendor';
		$data['vendor'] = $this->model_data->lihat_vendor();
		$this->load->view('main/dashboard_admin',$data);
	}

	public function data_penyewa(){

		$data['content'] = 'main/admin/data_penyewa';
		$data['penyewa'] = $this->model_data->lihat_penyewa();
		$this->load->view('main/dashboard_admin',$data);
	}
	
	public function data_penyewaan(){
		$data['content'] = 'main/admin/data_penyewaan';
		$data['penyewaan'] = $this->model_data->lihat_penyewaan();
		$this->load->view('main/dashboard_admin',$data);
	}

	public function data_pencairan(){
		$data['content'] = 'main/admin/data_pencairan';
		$data['pencairan'] = $this->model_data->lihat_pencairan();
		$this->load->view('main/dashboard_admin',$data);
	}

	public function detail_cair($id_cair){
		$data['content'] = 'main/admin/detail_pencairan';
		$data['pencairan'] = $this->model_data->detail_pencairan($id_cair);
		$this->load->view('main/dashboard_admin',$data);
	}

		public function terima_pencairan(){
			$id_cair = $this->input->post('id_cair');
			$role = $this->input->post('role');
			$id_user = $this->input->post('id_user');
			$nominal = $this->input->post('nominal');
			// var_dump($id_cair,$role,$id_user,$nominal);
			$this->model_data->terima_pencairan($id_cair);
			$this->model_data->update_pacmoney($nominal,$id_user,$role);
			redirect('main/dashboard_adm/data_pencairan');
		}

		public function konfirm_transfer($id_cair){
			$this->model_data->konfirm_transfer($id_cair);
			redirect('main/dashboard_adm/data_pencairan');
		}

		public function edit_vendor($id_user){ 
			$role="vendor";
			$nama_vendor=$this->input->post('nama_ven');
			$telp_vendor=$this->input->post('telp_ven'); 
			$username_ven=$this->input->post('username_ven'); 
			$email_vendor=$this->input->post('email_ven'); 
			$status_vendor=$this->input->post('status'); 
	
			$data_update=array(
			"nama_ven"=>$nama_vendor,
			"telp_ven"=>$telp_vendor,
			"username_ven"=>$username_ven,
			"email_ven"=>$email_vendor,
			"status"=>$status_vendor
			);
	
			$this->model_data->simpan_profil_vendor($id_user,$data_update);
			$this->model_data->update_seslog($id_user,$username_ven,$role);
			redirect('main/dashboard_adm/data_vendor');
		}

		public function hapus_vendor($id_user)
	{
		$this->model_data->delete_data_ven($id_user);
		redirect('main/dashboard_adm/data_vendor');
	}

	public function update_data_penyewa($id_user){
		$role="penyewa";
		$nama_peny=$this->input->post('nama_peny');
		$telp_peny=$this->input->post('telp_peny'); 
		$email_peny=$this->input->post('email_peny'); 
		$username_peny=$this->input->post('username_peny'); 

		$data_update=array(
		"nama_peny"=>$nama_peny,
		"telp_peny"=>$telp_peny,
		"email_peny"=>$email_peny,
		"username_peny"=>$username_peny
		);

		$this->model_data->simpan_profil_penyewa($id_user,$data_update);
		//$this->model_data->update_seslog($id_user,$username_peny,$this->session->userdata("role"));
		$this->model_data->update_seslog($id_user,$username_peny,$role);
		redirect('main/dashboard_adm/data_penyewa');	
	}

	public function tolak_pencairan($id_cair){
		$id_cair = $this->input->post('id_cair');
		// $role = $this->input->post('role');
		// $id_user = $this->input->post('id_user');
		// $nominal = $this->input->post('nominal');
		// var_dump($id_cair,$role,$id_user,$nominal);
		$this->model_data->tolak_pencairan($id_cair);
		redirect('main/dashboard_adm/data_pencairan');
	}

}