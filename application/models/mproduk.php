<?php class Mproduk extends CI_Model{
	function construct(){
		parent::__construct();
		$this->load->database();
	}
	function produk_terbaru(){
		$this->db->order_by('id_produk','desc');
		$this->db->where('id_kategori',2);
		$q=$this->db->get('tbl_produk','3');
		return $q->result();
	}
	function perkategori($id, $limit1='',$limit2=''){
		$data = array();
		$sql = "SELECT * FROM tbl_produk
		JOIN tbl_kategori ON tbl_kategori.id_kategori = tbl_produk.id_kategori
		WHERE nama_produk <> '' 
		AND tbl_produk.id_kategori = $id
		ORDER BY tbl_produk.id_produk DESC LIMIT ".$limit2;
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
	function getAll($limit1='',$limit2=''){
		$data = array();
		$sql = "SELECT * FROM tbl_produk
		JOIN tbl_kategori ON tbl_kategori.id_kategori = tbl_produk.id_kategori
		WHERE nama_produk <> '' 
		
		ORDER BY tbl_produk.id_produk DESC LIMIT ".$limit2;
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
	
	function insert($params = array()){
	
		if (empty($params)) {
				$data = array(
				'nama_produk' => $this->input->post('nama_produk'),
				'produk_sku' => $this->input->post('produk_sku'),
				'permalink' => url_title($this->input->post('nama_produk')),
				'id_kategori' => $this->input->post('id_kategori'),
				'jml' => $this->input->post('jml'),
				'harga' => $this->input->post('harga'),
				'manufaktur' => $this->input->post('manufaktur'),
				'keterangan' => $this->input->post('keterangan')
			);
			$this->db->insert('tbl_produk', $data);
		} else {
			$this->db->insert('tbl_produk', $params);
		}
	}
	function findById($id) {
		$this->db->select('tbl_produk.*');
		$this->db->where('id_produk', $id);
		$query = $this->db->get('tbl_produk', 1);
		
		if ($query->num_rows() == 1) {
			return $query->row_array();
		}
	 }
	function detil_produk(){
		$id=$this->input->post('id_produk');
	 	$this->db->where('id_produk',$id);
		$query=$this->db->get('tbl_produk');
		return $query->result();
	}
	function update($id, $data) {
		if (empty($data)) {
			$data = array(
				'nama_produk' => $this->input->post('nama_produk'),
				'produk_sku' => $this->input->post('produk_sku'),
				'permalink' => url_title($this->input->post('nama_produk')),
				'id_kategori' => $this->input->post('id_kategori'),
				'jml' => $this->input->post('jml'),
				'harga' => $this->input->post('harga'),
				'manufaktur' => $this->input->post('manufaktur'),
				'keterangan' => $this->input->post('keterangan')
			);
			$this->db->where('id_produk', $id);
			$this->db->update('tbl_produk', $data);
		} else {
			$this->db->where('id_produk', $id);
			$this->db->update('tbl_produk', $data);
		}
	}
	function delete($id){
		$this->db->where('id_produk', $id);
		$this->db->delete('tbl_produk');	
	}
	function destroy($id) {
		$this->db->where('id_produk', $id);
		$this->db->delete('tbl_produk');
	}
	function cari_produk($limit,$offset,$nama_produk){
		$q=$this->db->query("SELECT * FROM tbl_produk 
			WHERE id_kategori = '2'
			AND nama_produk LIKE'%$nama_produk%'
			OR manufaktur LIKE'%$nama_produk%'
			LIMIT $offset,$limit");
		return $q;
	}
	function tot_produk(){
		$q=$this->db->query("SELECT * FROM tbl_produk WHERE id_kategori = '2' ORDER BY nama_produk ASC");
		return $q;
	}
	function cari_produk_user($perPage,$uri,$nama_produk){
		$this->db->select('*');
		$this->db->from('tbl_produk');
		$this->db->join('tbl_kategori','tbl_kategori.id_kategori = tbl_produk.id_kategori');
		if (!empty($nama_produk)) {
			$this->db->like('nama_produk', $nama_produk);
			$this->db->or_like('manufaktur',$nama_produk);
		}
		$this->db->order_by('id_produk','desc');
		$getData = $this->db->get('', $perPage, $uri);

		if ($getData->num_rows() > 0)
			return $getData;
		else
			return null;
	}
	function tot_produk_user(){
		$nama_produk=$this->session->userdata('cari_produk');
		$q=$this->db->query("SELECT * FROM tbl_produk WHERE nama_produk LIKE'%$nama_produk%' ORDER BY nama_produk ASC");
		return $q;
	}
	function rekap_penjualan(){
		$q=$this->db->query("SELECT MAX(tgl_psn)AS tgl_psn ,
			tbl_produk.nama_produk, tbl_produk.image, tbl_produk.harga, 
			order_pesanan.id_produk, order_pesanan.jml_order, pesan.no_psn, 
			bukti_pembayaran.no_psn, bukti_pembayaran.jml_transfer, bukti_pembayaran.tgl_transfer,
			
		Sum(IF(tgl_psn LIKE '%-01-%',1,0)) AS Jan, 
		Sum(IF(tgl_psn LIKE '%-02-%',1,0)) AS Feb,
		Sum(IF(tgl_psn LIKE '%-03-%',1,0)) AS Mar, 
		Sum(IF(tgl_psn LIKE '%-04-%',1,0)) AS Apr, 
		Sum(IF(tgl_psn LIKE '%-05-%',1,0)) AS Mei, 
		Sum(IF(tgl_psn LIKE '%-06-%',1,0)) AS Jun,
		Sum(IF(tgl_psn LIKE '%-07-%',1,0)) AS Jul,
		Sum(IF(tgl_psn LIKE '%-08-%',1,0)) AS Agst, 
		Sum(IF(tgl_psn LIKE '%-09-%',1,0)) AS Sept,
		Sum(IF(tgl_psn LIKE '%-10-%',1,0)) AS Okt,
		Sum(IF(tgl_psn LIKE '%-11-%',1,0)) AS Nov,
		Sum(IF(tgl_psn LIKE '%-12-%',1,0)) AS Des,
		Count(*) AS Total
		
		FROM (pesan 
			INNER JOIN order_pesanan ON pesan.no_psn = order_pesanan.no_psn
			INNER JOIN tbl_produk ON order_pesanan.id_produk = tbl_produk.id_produk)
			INNER JOIN bukti_pembayaran ON bukti_pembayaran.no_psn = pesan.no_psn
			WHERE YEAR(tgl_psn) = YEAR(NOW())
			GROUP BY order_pesanan.id_produk;");
		return $q->result();
	}
	function tahun(){
		$q=$this->db->query("SELECT MAX(YEAR(tgl_psn)) AS tgl_psn FROM pesan ");
		return $q->result();
	}
}
?>