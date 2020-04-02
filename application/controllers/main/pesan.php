<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('model_data');
    }

	public function index()
	{
        $this->load->view("main/barang/sewa_barang");
    }

    public function form_pesan($id_barang=null){
        $data["produk"]=$this->model_data->getDetail($id_barang);
        $this->load->view("main/pesan/form_pesan", $data);
    }

    public function buat_pesanan(){

        $id_penyewa = $this->input->post('id_penyewa');
        $id_vendor = $this->input->post('id_vendor');
        $id_barang = $this->input->post('id_barang');
        $nama_barang = $this->input->post('nama_barang_input');
        $jumlah_barang = $this->input->post('jumlah_barang');
        $harga_barang = $this->input->post('harga_barang');
        $tgl_pinjam = $this->input->post('tgl_pinjam');
        $tgl_kembali = $this->input->post('tgl_kembali');
        $ambil_barang = $this->input->post('ambil_barang');
       // $alamat = $this->input->post('alamat');
        $ket = $this->input->post('ket');
        $total=$harga_barang*$jumlah_barang;
        $datetime1 = new DateTime($tgl_kembali);
        $datetime2 = new DateTime($tgl_pinjam);
        $difference = $datetime1->diff($datetime2);
        $lama_sewa= $difference->days;
        $status="BELUM DIKONFIRMASI";
        if($ambil_barang=="Diambil di tempat penyedia"){
            $alamat = "";
        }
        else {
            $alamat = $this->input->post('alamat');
        }
        $data=array(
            "id_penyewa"=>$id_penyewa,
            "id_vendor"=>$id_vendor,
            "id_barang"=>$id_barang,
            "nama_barang"=>$nama_barang,
            "jumlah_barang"=>$jumlah_barang,
            "total_bayar"=>$total,
            "tgl_pinjam"=>$tgl_pinjam,
            "tgl_kembali"=>$tgl_kembali,
            "lama_sewa" => $lama_sewa,
            "ambil_barang"=>$ambil_barang,
            "alamat"=>$alamat,
            "ket"=>$ket,
            "status"=>$status
        );
        $this->model_data->buat_pesanan($data);
        //$this->model_data->hitung_total($jumlah_barang,$harga_barang);
        redirect('main/pesan/nyari_id_sewa/'.$id_barang.'/'.$jumlah_barang.'/'.$tgl_pinjam.'/'.$tgl_kembali.'/'.$ambil_barang.'/'.$alamat.'');
       // var_dump($data);
    }

	public function nyari_id_sewa($id_barang,$jumlah_barang,$tgl_pinjam,$tgl_kembali,$ambil_barang,$alamat=null)
	{
        // $data["rincian_pesan"]=$this->model_data->getRinci($id_barang,$jumlah_barang,$tgl_pinjam,$tgl_kembali,$ambil_barang,$alamat);
        $data['ataz'] = 'main/pesan/berhasil';
        $this->load->view('main/dashboard_penyewa',$data);

        // $data["rincian_pesan"]=$this->model_data->getRinci($id_barang,$jumlah_barang,$tgl_pinjam,$tgl_kembali,$ambil_barang,$alamat);
        // $this->load->view('main/dashboard_penyewa',$data);
		//var_dump($rinci);
	}

    public function detail_pesanan($id_barang){
        $data["produk"]=$this->model_data->getById_penyewaan($id_barang);
        $this->load->view('main/pesan/detail_pesanan',$data);
    }

    public function konfirmasi_bayar($id_sewa){
        $data["sewa"]=$this->model_data->getDetailSewa($id_sewa);
        $this->load->view('main/pesan/konfirmasi_bayar',$data);
    }

    public function upload_bukti($id_sewa){
        $this->model_data->update_status($id_sewa);
        $this->load->view('main/pesan/berhasil_pesan');
    }

       public function detail_pesanan_penyewa($id_sewa){
        $data['ataz'] = 'main/pesan/detail_pesanan';
        $data["rincian_pesan"]=$this->model_data->get_rinci_pesanan($id_sewa);
        $this->load->view('main/dashboard_penyewa',$data);
    }

    public function terima_barang($id_sewa){
        $this->model_data->terima_barang($id_sewa);
        // $nominal=$this->input->post('nominal');
        // $nama_vendor=$this->input->post('nama_ven');
        // var_dump($nominal,$nama_vendor);
        // $this->model_data->upd_pac_ven($nama_vendor,$nominal);
        redirect('main/dashboard_peny/history_pesanan');
    }

    public function kembalikan_barang($id_sewa){
        $this->model_data->kembalikan_barang($id_sewa);
        redirect('main/dashboard_peny/history_pesanan');
    }

}