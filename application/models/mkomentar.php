<?php class Mkomentar extends CI_Model{
	function insert(){
		$data=array(
			'nama_lengkap'=>$this->input->post('nama_lengkap'),
			'tgl_komen'=> date('Y-m-d'),
			'email'=> $this->input->post('email'),
			'isi_komentar'=>$this->input->post('isi_komentar'),
			'id_produk' => $this->input->post('id_produk')
		);
		$this->db->insert('tbl_komentar',$data);
	}
	function tampil_komen(){
		$tgl=date('Y-m-d');
		$query= $this->db->query("SELECT * FROM tbl_komentar WHERE tgl_komen LIKE'%$tgl%' 
			GROUP BY id_produk
			ORDER BY id_komentar DESC
		");
	}
}
?>