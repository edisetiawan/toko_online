<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Muser extends CI_Model
{
	function cek_user_login($username, $password){
	
		$this->db->select('*');
		$this->db->where('username', $username);
		/*$this->db->where('password=MD5("'.$password.'")','',false);*/
		$this->db->where('password', $password);
		$this->db->where('status',1);
		$query = $this->db->get('tbl_user',1);
		
		if ($query->num_rows()==1){
			return $query->row_array();
		}
	}

	public function get_menu_for_level($level){
		$this->db->from('tbl_menu');
		$this->db->where_not_in('menu_nama','Peta Lokasi');
		$this->db->like('menu_allowed','+'.$level.'+');
		$this->db->order_by('menu_nama','asc');
		$result = $this->db->get();
		return $result;
	}
	function get_array_menu($id){
		$this->db->select('menu_allowed');
		$this->db->from('tbl_menu');
		$this->db->where('id_menu',$id);
		$data = $this->db->get();
		if($data->num_rows() > 0)
		{
			$row = $data->row();
			$level = $row->menu_allowed;
			$arr = explode('+',$level);
			return $arr;
		}
		else
		{
			die();
		}
	}
	function getLevel(){
		$q=$this->db->get('tbl_level');
		return $q->result();
	}
	function tot_pengguna(){
		$q=$this->db->query("SELECT * FROM tbl_user ORDER BY nama_lengkap ASC");
		return $q;
	}
	function countAll() {
	$query = $this->db->get('tbl_user');
		return $query->num_rows();
	}
	function getAll( $limit1='',$limit2=''){
		$data = array();
		$sql = "SELECT * FROM tbl_user 
		JOIN tbl_level ON tbl_level.id_level = tbl_user.id_level
		WHERE nama_lengkap <> '' ORDER BY id_user DESC LIMIT ".$limit2;
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
	function insert_member(){
		$data =array(
			
			'nama_member'=>$this->input->post('nama_lengkap'),
			'alamat'=>$this->input->post('alamat'),
			'no_telp'=>$this->input->post('no_telp'),
			'email' =>$this->input->post('email'),
			'tgl_registrasi' => date('y-m-d')
			);
		$this->db->insert('tbl_member',$data);
	}
	function insert_user(){
		$data = array(
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'id_level' => $this->input->post('id_level'),			
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			/*'email' => $this->input->post('email'),*/
			'status' => $this->input->post('status'),
			'id_member' => $this->session->userdata('id_member')
		);
		$data2=array(
			'DestinationNumber'=>$this->session->userdata('no_telp'),
			'TextDecoded'=>$pesan
		);
		
		$input = $this->db->insert('tbl_user', $data);
		$input = $this->db->insert('outbox',$data2);
		if($input){
			return true;
		}else{
			return false;
		}
	}
	function select_pengguna($id){
		$this->db->join('tbl_member','tbl_member.id_member = tbl_user.id_member');
		return $this->db->get_where('tbl_user', array('id_user'=>$id))->row();
	}
	function update_pengguna($id){
		$data = array(
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'id_level' => $this->input->post('id_level'),			
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			/*'email' => $this->input->post('email'),*/
			'status' => $this->input->post('status'),
			
		);
		$id_member=$this->input->post('id_member');
		$data1=array('nama_member' => $this->input->post('nama_lengkap'),
				'no_telp' => $this->input->post('no_telp'),
				'email' => $this->input->post('email'),
				'alamat' => $this->input->post('alamat'),
				
		);
		$this->db->where('id_member',$id_member)->update('tbl_member',$data1);
		$this->db->where('id_user',$id)->update('tbl_user',$data);
	}
	function select_akun($id){
		return $this->db->get_where('tbl_member', array('id_member'=>$id))->row();
	}
	function update_akun($id){
		
		$data1=array('nama_member' => $this->input->post('nama_lengkap'),
				'no_telp' => $this->input->post('no_telp'),
				'email' => $this->input->post('email'),
				'alamat' => $this->input->post('alamat'),
				
		);
		$this->db->where('id_member',$id)->update('tbl_member',$data1);
	}
	function select_password($id){
		return $this->db->get_where('tbl_user', array('id_user'=>$id))->row();
	}
	function update_password($id){
		$data = array(
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'id_level' => $this->input->post('id_level'),			
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			/*'email' => $this->input->post('email'),*/
			'status' => $this->input->post('status'),
			
		);
		$this->db->where('id_user',$id)->update('tbl_user',$data);
	}
	function delete($id){
		$this->db->delete('tbl_user', array('id_user'=>$id));
		
	}
	function cari_pengguna($limit,$offset,$nama_lengkap){
		$q=$this->db->query("SELECT * FROM tbl_user 
			JOIN tbl_level ON tbl_level.id_level = tbl_user.id_level
			WHERE nama_lengkap LIKE'%$nama_lengkap%'
			OR username LIKE'%$nama_lengkap%'
			OR password LIKE'%$nama_lengkap%'
			LIMIT $offset,$limit");
		return $q;
	}
	function edit_akun(){
		$id_user=$this->input->post('id_user');

		$data = array(
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'id_level' => $this->input->post('id_level'),			
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);
		$this->db->where('id_user',$id_user);
		$this->db->update('tbl_user',$data);
	}
	function ganti_password(){
		$id_user=$this->input->post('id_user');
		$data=array(			
			'username'=>$this->input->post('username'),
			'password'=>$this->input->post('password')
		);
		$this->db->where('id_user',$id_user);
		$this->db->update('tbl_user',$data);
	}

}