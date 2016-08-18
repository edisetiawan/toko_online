<?php class Mpembayaran extends CI_Model{
	function getAll($limit1='',$limit2=''){
		$data = array();
		$sql = "SELECT * FROM tbl_pembayaran
		JOIN tbl_order ON tbl_order.id_order = tbl_pembayaran.id_order
		WHERE id_bayar <> '' 
		ORDER BY tbl_pembayaran.id_bayar DESC LIMIT ".$limit2;
		if($limit1){
			$sql .= ",".$limit1;
		}
		$hasil = $this->db->query($sql);
		if($hasil->num_rows() > 0){
			$data = $hasil->result();
		}
		$hasil->free_result();
		return $data;
	}
	
	function insert(){
		$data = array(
			'id_order' => $this->session->userdata('id_order'),
			'tagihan' => $this->input->post('tagihan'),
			'status_bayar' => "Kurang",
			'metode' => $this->input->post('metode'),
		);
		$this->db->insert('tbl_pembayaran',$data);
	}
	function select($id){
		
	}
	function findById($id) {
		$this->db->select('tbl_pembayaran.*');
		$this->db->where('id_bayar', $id);
		$query = $this->db->get('tbl_pembayaran', 1);
		
		if ($query->num_rows() == 1) {
			return $query->row_array();
		}
	 }
	function update($id, $data) {
		if (empty($data)) {
			$tagihan = $this->input->post('tagihan');
			$jml_bayar = $this->input->post('jml_bayar');
			if($jml_bayar == $tagihan){
				$data = array(
					'no_transfer' => $this->input->post('no_transfer'),
					'tgl_bayar' => $this->input->post('tgl_bayar'),
					'permalink' => url_title($this->input->post('no_transfer')),
					'status_bayar' => "Lunas",
					'jml_bayar' => $this->input->post('jml_bayar'),
				);
			}else{
				$data = array(
					'no_transfer' => $this->input->post('no_transfer'),
					'tgl_bayar' => $this->input->post('tgl_bayar'),
					'permalink' => url_title($this->input->post('no_transfer')),
					'status_bayar' => "Kurang",
					'jml_bayar' => $this->input->post('jml_bayar'),
				);
			}
			$this->db->where('id_order', $id);
			$this->db->update('tbl_pembayaran', $data);
		} else {
			$this->db->where('id_order', $id);
			$this->db->update('tbl_pembayaran', $data);
		}
	}
	function select_bayar($id){
		$this->db->join('tbl_order','tbl_order.id_order = tbl_pembayaran.id_order');
		return $this->db->get_where('tbl_pembayaran', array('tbl_pembayaran.id_bayar'=>$id))->row();
	}
	function update_bayar_sewa($id){
		$tagihan = $this->input->post('tagihan');
		$pelunasan = $this->input->post('pelunasan');
		$jml_bayar = $this->input->post('jml_bayar');
		$tot_bayar = $jml_bayar + $pelunasan;
		if($tot_bayar == $tagihan){
			$data=array(
				'tagihan' => $tagihan,
				'jml_bayar' => $jml_bayar,
				'pelunasan' => $pelunasan,
				'status_bayar' => "Lunas",
				'no_transfer' => $this->input->post('no_transfer'),
				'tgl_bayar' => $this->input->post('tgl_bayar'),
				'id_sewa' => $this->input->post('id_sewa'),
			);
		}else{
			$data=array(
			'tagihan' => $tagihan,
				'jml_bayar' => $jml_bayar,
				'pelunasan' => $pelunasan,
				'status_bayar' => "Kurang",
				'no_transfer' => $this->input->post('no_transfer'),
				'tgl_bayar' => $this->input->post('tgl_bayar'),
				'id_sewa' => $this->input->post('id_sewa'),
			);
		}
		$this->db->where('id_sewa',$id)->update('tbl_pembayaran',$data);
	}
	function bayar_pendaftaran(){
		$data = array(
			'id_pendaftar' => $this->session->userdata('id_pendaftar'),
			'tagihan' => $this->session->userdata('tagihan'),
			'status_bayar' => "Kurang",
			'id_user' => $this->session->userdata('id_user'),
		);
		$this->db->insert('tbl_pembayaran',$data);
		
	}
}
?>