<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_data extends CI_Model 
{

  //menampilkan data barang
  public function getBarang(){

  $query=$this->db->query("SELECT * from barang b, vendor v where b.id_vendor=v.id_user");
  	return $query->result();
  }

  public function getDetail($id){
    $this->db->where('id_barang',$id);
    $query=$this->db->get('barang');
    return $query->result();
  }

  public function buat_pesanan($data){
    
    $this->db->insert('penyewaan',$data);
  }

  public function getById_penyewaan($id_barang){
    $this->db->where('id_barang',$id_barang);
    // $this->db->where('id_vendor',$id_vendor);
    // $this->db->where('id_barang',$id_penyewa);
    $query=$this->db->get('penyewaan');
    return $query->result();
  }

  public function getRinci($id_barang,$jumlah_barang,$tgl_pinjam,$tgl_kembali,$ambil_barang,$alamat=null){
    $this->db->where('id_barang',$id_barang);
    $this->db->where('jumlah_barang',$jumlah_barang);
    $this->db->where('tgl_pinjam',$tgl_pinjam);
    $this->db->where('tgl_kembali',$tgl_kembali);
    $this->db->where('ambil_barang',$ambil_barang);
    $this->db->where('alamat',$alamat);
    $query = $this->db->get('penyewaan');
    return $query->result();
  }

  public function getDetailSewa($id_sewa){
    $this->db->where('id_sewa',$id_sewa);
    $query = $this->db->get('penyewaan');
    return $query->result();
  }

  public function lihat_penyewaan_penyewa($id_user){
    $query = $this->db->query("SELECT s.id_sewa,s.id_penyewa,s.waktu_pemesanan,s.nama_barang,v.nama_ven,s.jumlah_barang,s.total_bayar,s.tgl_pinjam,s.tgl_kembali,s.lama_sewa,s.ambil_barang,s.alamat,s.ket,s.status from penyewaan s,vendor v where s.id_vendor=v.id_user and s.id_penyewa='$id_user'");
    //var_dump($query->result());
    return $query->result();
  }

  public function getPenyewa($id_penyewa)
  {
    $query=$this->db->query("SELECT * from penyewa where id_user='".$id_penyewa."'");
    return $query->result();
    //var_dump($query);
  }

  public function getAdmin($id_admin)
  {
    $query=$this->db->query("SELECT * from admin where id_user='".$id_admin."'");
    return $query->result();
    //var_dump($query);
  }

  //menampilkan data vendor
  public function getVendor($id_vendor)
  {
    $query=$this->db->query("SELECT * from vendor where id_user='".$id_vendor."'");
    return $query->result();
    //var_dump($query);
  }

  // public function simpan_profil_vendor($id_user,$nama_ven,$telp_ven,$email_ven,$username_ven)
  // {
  //   $hasil=$this->db->query("UPDATE vendor SET nama_ven='$nama_ven',telp_ven='$telp_ven',email_ven='$email_ven',username_ven='$username_ven' where id_user='".$id_user."'");
  //   return $hasil;
  // }


  public function insert_image($image){
    $data = array(
      'id_vendor' => $this->session->userdata('id_user')->id_user,
      'nama_barang' => $this->input->post('nama_barang'),
      'deskripsi_barang'=> $this->input->post('deskripsi_barang'),
      'harga_barang'=>$this->input->post('harga_barang'),
      'foto_barang' => $image

     );
    //var_dump($data);
    $this->db->insert('barang', $data);
  }

 public function getId_vendor($username_ven){
  return $this->db->get_where('vendor',["username_ven" => $username_ven])->row()->id_user;
}

public function getId_penyewa($username_peny){
  return $this->db->get_where('penyewa',["username_peny" => $username_peny])->row()->id_user;
}
public function lihat_vendor(){
  $query = $this->db->query("SELECT * from vendor");
  return $query->result();
}

public function lihat_penyewa(){
  $query = $this->db->query("SELECT * from penyewa");
  return $query->result();
}

// public function getId_cadangan_ven($password_ven)
// {
//   $sql=$this->db->query("");
//   return $sql;
// }

 
  public function simpan_profil_vendor($id_user,$data)
  {
    $this->db->where('id_user', $id_user);
    $this->db->update('vendor', $data);
  }

  public function simpan_profil_penyewa($id_user,$data)
  {
    $this->db->where('id_user', $id_user);
    $this->db->update('penyewa', $data);
  }

  public function update_seslog($id_user,$username)
  {
    $hasil=$this->db->query("UPDATE login_session SET username='$username' where id_user='".$id_user."'");
    return $hasil;
  }

  public function update_status($id_sewa){
    $query = $this->db->query("UPDATE penyewaan SET status='SUDAH DIBAYAR' where id_sewa='".$id_sewa."'");
    return $query;
  }

  public function cairkan_pacmoney($data){
    $this->db->insert('pencairan',$data);
  }
 
  public function update_pacmoney($nominal,$id_user,$role){
    
    $hasil=$this->db->query("UPDATE $role SET pacmoney=pacmoney-'$nominal' where id_user='".$id_user."'");
    return $hasil;
  }

   public function lihat_penyewaan_vendor($id_user){
    $query = $this->db->query("SELECT s.id_sewa,s.waktu_pemesanan,s.id_barang,b.nama_barang,p.nama_peny,v.nama_ven,s.jumlah_barang,s.total_bayar,s.tgl_pinjam,s.tgl_kembali,s.lama_sewa,s.ambil_barang,s.alamat,s.ket,s.status from penyewaan s,vendor v,penyewa p,barang b where s.id_vendor=v.id_user and s.id_barang=b.id_barang and s.id_penyewa=p.id_user and s.id_vendor='$id_user'");
    return ($query->result());
  }

  public function lihat_penyewaan(){
    $query = $this->db->query("SELECT * from penyewaan");
    return ($query->result());
  }

  public function lihat_pencairan(){
    $query = $this->db->query("SELECT * from pencairan");
    return ($query->result());
  }

  public function konfirmasi_sewa($id_sewa){
    $query = $this->db->query("SELECT s.id_sewa,s.waktu_pemesanan,s.id_barang,b.nama_barang,p.nama_peny,v.nama_ven,s.jumlah_barang,s.total_bayar,s.tgl_pinjam,s.tgl_kembali,s.lama_sewa,s.ambil_barang,s.alamat,s.ket,s.status from penyewaan s,vendor v,penyewa p,barang b where s.id_vendor=v.id_user and s.id_penyewa=p.id_user and s.id_sewa='$id_sewa' and b.id_barang=s.id_barang");
    return $query->result();
  }

    public function terima_pesanan($id_sewa){
    $query=$this->db->query("UPDATE penyewaan set status = 'DIKONFIRMASI' where id_sewa='$id_sewa'");
    //var_dump($query);
    return;
  }

   public function vendor_barang(){
    $id=$this->session->userdata('id_user')->id_user;
    $query=$this->db->query("SELECT * from barang join vendor on barang.id_vendor=vendor.id_user where barang.id_vendor='$id'");
      return $query->result();
    }

    public function detail_pencairan($id_cair)
  {
    $query=$this->db->query("SELECT * from pencairan where id_cair='".$id_cair."'");
    return $query->result();
    //var_dump($query);
  }
  
  public function terima_pencairan($id_cair){
    $query=$this->db->query("UPDATE pencairan set status = 'DIKONFIRMASI' where id_cair='$id_cair'");
    //var_dump($query);
    return;
  }

  public function tolak_pencairan($id_cair){
    $query=$this->db->query("UPDATE pencairan set status = 'DITOLAK' where id_cair='$id_cair'");
    //var_dump($query);
    return;
  }

  public function konfirm_transfer($id_cair){
    $query=$this->db->query("UPDATE pencairan set status = 'SELESAI' where id_cair='$id_cair'");
    //var_dump($query);
    return;
  }

  public function getStatusVendor($id_user)
  {
    $query=$this->db->query("SELECT status from vendor where id_user='".$id_user."'");
    return $query->row()->status;
    //var_dump($query->row()->status);
  }

  public function delete_data_ven($id_user)
  {
    $query=$this->db->query("DELETE from vendor where id_user='$id_user'");
    return;
  }

   public function get_rinci_pesanan($id_sewa){
    $this->db->where('id_sewa',$id_sewa);
    // $this->db->where('id_vendor',$id_vendor);
    // $this->db->where('id_barang',$id_penyewa);
    $query=$this->db->get('penyewaan');
    return $query->result();
  }

  public function terima_barang($id_sewa){
    $query = $this->db->query("UPDATE penyewaan SET status='BARANG DITERIMA' where id_sewa='".$id_sewa."'");
    return $query;
  }

  public function kembalikan_barang($id_sewa){
    $query = $this->db->query("UPDATE penyewaan SET status='DIKEMBALIKAN PENYEWA' where id_sewa='".$id_sewa."'");
    return $query;
  }

  public function vendor_terima_barang($id_sewa){
    $query = $this->db->query("UPDATE penyewaan SET status='SELESAI' where id_sewa='".$id_sewa."'");
    return $query;
  }

  public function vendor_kirim_barang($id_sewa){
    $query = $this->db->query("UPDATE penyewaan SET status='BARANG DIKIRIM' where id_sewa='".$id_sewa."'");
    return $query;
  }

  public function upd_pac_ven($id_vendor,$nominal){
    $pac = $nominal*0.8;
    $query = $this->db->query("UPDATE vendor SET pacmoney=$pac where id_user='".$id_vendor."'");
    return $query;
  }
}