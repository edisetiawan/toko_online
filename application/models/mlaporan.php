<?php class Mlaporan extends CI_Model{
	function lap_order(){
		$tgl_awal=$this->input->post('tgl_awal1');
		$tgl_akhir=$this->input->post('tgl_akhir1');
		$status = $this->input->post('status_order');
		$query = $this->db->query("
			SELECT DATE_FORMAT(tbl_order.tgl_order,'%d-%m-%Y')AS tgl_order, 
			tbl_order.no_order, tbl_order.status_order, 
			tbl_pembayaran.tagihan, tbl_member.no_telp, tbl_member.nama_member
			FROM tbl_order
		JOIN tbl_member ON tbl_member.id_member = tbl_order.id_order
		JOIN tbl_pembayaran ON tbl_pembayaran.id_order = tbl_order.id_order
		        
		WHERE tgl_order BETWEEN '$tgl_awal' AND '$tgl_akhir'
		AND tbl_order.status_order = '$status'
		GROUP BY tbl_order.id_order
		ORDER BY tbl_order.id_order
		");
		return $query->result();
	}
	function nota_order($id){
		$query=$this->db->query("
			SELECT 
			DATE_FORMAT(tgl_sewa,'%d-%m-%Y')AS tgl_sewa,
			TIME_FORMAT(tbl_sewa.durasi, '%H')AS durasi,
			tbl_sewa.no_sewa, tbl_sewa.tagihan, tbl_sewa.nama_tim, 
			tbl_pembayaran.jml_bayar, tbl_user.nama_lengkap, tbl_user.no_telp
			FROM tbl_sewa
			
			JOIN tbl_detil_sewa ON tbl_detil_sewa.id_sewa = tbl_sewa.id_sewa
			JOIN tbl_user ON tbl_user.id_user = tbl_sewa.id_user
			JOIN tbl_pembayaran ON tbl_pembayaran.id_sewa = tbl_sewa.id_sewa
			WHERE tbl_sewa.id_sewa = '$id'
			GROUP BY tbl_sewa.id_sewa
		");
		return $query->result();					
	}
	function detil_order($id){
		$durasi= date('H:i:s',strtotime('01:00:00'));
		$query=$this->db->query("
			SELECT 
			TIME_FORMAT( ( SELECT ADDTIME(tbl_detil_sewa.jam_mulai,'01:00:00') ), '%H:%i:%s' ) AS jam_selesai,
			tbl_detil_sewa.jam_mulai, tbl_tarif.harga
			 FROM tbl_sewa
			JOIN tbl_detil_sewa ON tbl_detil_sewa.id_sewa = tbl_sewa.id_sewa
			JOIN tbl_tarif ON tbl_tarif.id_tarif = tbl_detil_sewa.id_tarif
			
			WHERE tbl_sewa.id_sewa = '$id'
			GROUP BY tbl_detil_sewa.id_detil_sewa
		");
		return $query->result();	
	}
	function nota_pembayaran($id){
		$query= $this->db->query("SELECT * FROM tbl_pembayaran
			JOIN tbl_sewa ON tbl_sewa.id_sewa = tbl_pembayaran.id_sewa
			JOIN tbl_user ON tbl_user.id_user = tbl_sewa.id_user
			WHERE tbl_pembayaran.id_sewa = '$id'
		");
		return $query->result();
	}
	
}
?>