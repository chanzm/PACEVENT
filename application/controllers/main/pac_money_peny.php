<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pac_money_peny extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('model_data');
    }

	public function index()
	{
        $data['penyewa']=$this->model_data->getPenyewa($this->session->userdata('id_user')->id_user);
        $this->load->view("main/pac_money/pac_penyewa",$data);
    }

    public function pac_cair($id_user=null){
        $data["user"]=$this->model_data->getPenyewa($id_user);
        $this->load->view("main/pac_money/pac_cair", $data);
    }

    public function cairkan_penyewa($id_user=null){
        $id_user = $this->input->post('id_user');
        $nominal = $this->input->post('nominal');
        $bank_peny = $this->input->post('bank_peny');
        $pacmoney = $this->input->post('pac_money');
        $no_rek_peny = $this->input->post('no_rek_peny');
        $role = $this->session->userdata('id_user')->role;
        //$waktu_pengajuan = $this->input->post('waktu_pengajuan');
        $nama_rekening = $this->input->post('nama_rekening');
        if($nominal > $pacmoney || $pacmoney == 0){
            $this->load->view('main/pac_money/gagal_cair');
        }
        else {
            $data=array(
            "id_user"=>$id_user,
            "role"=>$role,
            "nominal_cair"=>$nominal,
            "bank_tujuan"=>$bank_peny,
            "no_rekening"=>$no_rek_peny,
       //     "waktu_pengajuan"=>$waktu_pengajuan,
            "nama_rekening" => $nama_rekening,
            "status"=> "MENUNGGU KONFIRMASI"
        );
        $this->model_data->cairkan_pacmoney($data);
        // $this->model_data->update_pacmoney($nominal,$id_user,$role);
        redirect('main/pac_money_peny/berhasil_ajukan');
        }
    }

    public function berhasil_ajukan(){
        $this->load->view('main/pac_money/berhasil_ajukan');
    }
}