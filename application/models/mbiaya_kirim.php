<?php class Mbiaya_kirim extends CI_Model{
	var $table='tbl_biaya_kirim';
	function construct(){
		parent::__construct();
		$this->load->database();
	}

	function get_kota(){
		$query = $this->db->query("SELECT * FROM tbl_biaya_kirim ORDER BY nama_kota ASC");
		return $query->result();	
		
	 }
	function findAll($limit=null, $offset=null, $q=null){
		$this->db->select('tbl_biaya_kirim.*');
		if($q!=null){
			$this->db->like('nama_kota',$q);
		}
		$this->db->limit($limit, $offset);
		$this->db->order_by('nama_kota', 'asc');
		$query = $this->db->get($this->table);
		
		if ($query->num_rows() > 0) {
			 return $query->result_array();
		 }
	}
	function countAll() {
		$query = $this->db->get($this->table);
		return $query->num_rows();
	}
	function tambah_biaya($biaya,$kota){
		$data=array('biaya_kirim'=>$biaya,
					'nama_kota'=>$kota);
		$this->db->insert('tbl_biaya_kirim',$data);
	}
	function ambil_biaya($id){
		$this->db->where('id_biaya',$id);
		return $this->db->get('tbl_biaya_kirim');
	}
	function update_biaya($id,$kota,$biaya){
		$this->db->where('id_biaya',$id,$kota,$biaya);
		$data=array('nama_kota'=>$kota,
					'biaya_kirim'=>$biaya);
		$this->db->update('tbl_biaya_kirim',$data);
	}
	function delete_biaya($id){
		$this->db->delete('tbl_biaya_kirim',array('id_biaya'=>$id));
	}
		// mengambil data biaya pengiriman berdasarkan kode biaya pengiriman
	function biaya_kirim(){
		$data = array();
		$kode = $this->input->post('id_biaya');
		$this->db->where('id_biaya',$kode);
		$hasil = $this->db->get('tbl_biaya_kirim');
			if($hasil->num_rows() > 0){
				return $hasil->row_array();
			}	
	}
	function getAll($limit1='',$limit2=''){
			$data = array();
			$this->db->select('*');
			$this->db->from('tbl_biaya_kirim');
			$this->db->order_by('nama_kota', 'ASC');
			$this->db->limit($limit2, $limit1);
			return $hasil = $this->db->get();
		}		
		function tampilAll($limit1='',$limit2=''){
			$data = array();
			$sql = "SELECT * FROM tbl_biaya_kirim WHERE nama_kota <> '' ORDER BY nama_kota ASC LIMIT ".$limit2;
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
	function tot_kota(){
		$q=$this->db->query("SELECT * FROM tbl_biaya_kirim ORDER BY nama_kota ASC");
		return $q;
	}
	function cari_kota($limit,$offset,$nama_kota){
		$q=$this->db->query("SELECT * FROM tbl_biaya_kirim
			WHERE nama_kota LIKE'%$nama_kota%' 
			LIMIT $offset,$limit");
		return $q;
	}

}
?>