<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_ven extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library("session");
	}

	public function index()
	{	
		//$data['content'] = 'main/profil_vendor';
		$this->load->view('main/dash_vendor_awal');	
		//$this->load->view('main/profil_penyewa');	
	}
	
	public function data_profil_vendor()
	{
		// $data["penyewa"]=$this->model_data->getPenyewa($id_penyewa);
		// $this->load->view('main/profil_penyewa',$data);	
		$data['content'] = 'main/profil_vendor';
		//$id_vendor=$this->uri->segment('4');
		$data['vendor']=$this->model_data->getVendor($this->session->userdata('id_user')->id_user);
		$this->load->view('main/dashboard_vendor',$data);	
		//var_dump($this->session->userdata('id_user')->id_user);
	}

	public function update_vendor()
	{
		$id_user=$this->input->post('id_vendor');
		$nama_ven=$this->input->post('nama_ven');
		$telp_ven=$this->input->post('telp_ven');
		$email_ven=$this->input->post('email_ven');
		$username=$this->input->post('username_ven');
		//$id_user=$this->model_data->getId_vendor($username_ven);
		//$id_user=$this->model_data->getVendor($id_vendor);
		$data=array(
			"id_user"=>$id_user,
			"nama_ven"=>$nama_ven,
			"telp_ven"=>$telp_ven,
			"email_ven"=>$email_ven,
			"username_ven"=>$username
		);
		//$this->model_data->simpan_profil_vendor($id_user,$data);
		$this->model_data->simpan_profil_vendor($id_user,$data);
		//var_dump($data);
		$this->model_data->update_seslog($id_user,$username);
		redirect('main/dashboard_ven/data_profil_vendor/'.$id_user.'');
	}

	public function upload_barang(){
		$this->load->view('main/vendor/upload_barang');
	}

	public function upload(){
		
	}

	public function lihat_penyewaan()
	{
		$data['content'] = 'main/vendor/data_penyewaan';
		$data['vendor'] = $this->model_data->lihat_penyewaan_vendor($this->session->userdata('id_user')->id_user);
		$this->load->view('main/dashboard_vendor',$data);
		//var_dump($this->session->userdata('id_user')->id_user);
	}

	public function konfirmasi($id_sewa){
		$data['content'] = 'main/vendor/konfirmasi_penyewaan';
		$data['sewa'] = $this->model_data->konfirmasi_sewa($id_sewa);
		$this->load->view('main/dashboard_vendor',$data);
	}

	public function terima_pesanan($id_sewa){
		$data['content'] = 'main/vendor/terima_pesanan';
		$this->model_data->terima_pesanan($id_sewa);
		$this->load->view('main/dashboard_vendor',$data);
	}

	public function cek_status_upload(){
		// $this->load->view('main/upload_barang');
		$data= $this->model_data->getStatusVendor($this->session->userdata('id_user')->id_user);
		 if($data == 1){
			redirect ('main/dashboard_ven/upload_barang');
		}
		 else if ($data == 0){
			 redirect('main/dashboard_ven/belum_aktif');
		 }
		 else{
			 redirect('main/dashboard_ven/akun_nonaktif');
		 }
	}

	public function belum_aktif(){
		$data['content'] = 'main/vendor/belum_aktif';
		$this->load->view('main/dashboard_vendor',$data);
		// $uploaddir = './assets/img/vendor/bayar_daftar/';
		// $uploadfile = $uploaddir . basename($_FILES['foto_bukti_byr']['name']);

        // if (move_uploaded_file($_FILES['foto_bukti_byr']['tmp_name'], $uploadfile)) {
        //    // echo "File is valid, and was successfully uploaded.\n";
        //      $this->model_data->upload_daftar_ven($_FILES['foto_bukti_byr']['name'],$this->session->userdata('id_user')->id_user);
        // } else {
        //     echo "Ukuran File terlalu besar!\n";
		// }
		//redirect('main/dashboard_ven');
	}

	public function detail_pesanan_konfirmasi($id_sewa){
		$data['content'] = 'main/vendor/detail_pesanan_konfirmasi';
		$data['sewa'] = $this->model_data->konfirmasi_sewa($id_sewa);
		$this->load->view('main/dashboard_vendor',$data);
	}

	public function kembalikan_barang($id_sewa){
        $this->model_data->vendor_terima_barang($id_sewa);
        redirect('main/dashboard_ven/lihat_penyewaan');
    }

    public function kirim_barang($id_sewa){
        $this->model_data->vendor_kirim_barang($id_sewa);
        redirect('main/dashboard_ven/lihat_penyewaan');
    }
	
	
}
