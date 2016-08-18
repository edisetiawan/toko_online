<?php class Pembayaran extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
		$this->load->model('Muser');
		$this->load->model('Mpembayaran');
		
	}
	function index(){
		$this->auth->restrict();
		/*$this->auth->cek_menu(2);*/
		$id_level = $this->session->userdata('id_level');
		$data['menu'] = $this->Muser->get_menu_for_level($id_level);

		$data['base_url'] = base_url().'admin/pembayaran/index/';
		$data['total_rows'] = $this->db->count_all('tbl_pembayaran');
		$data['per_page'] = 10;
		$data['uri_segment'] = 4;
		$data['num_links']= 3;
		$data['first_link']='First';
		$data['last_link']='Last';
		$data['next_link']='<';
		$data['next_link']='>';
		$this->pagination->initialize($data);
		$data['pembayaran']=$this->Mpembayaran->getAll($data['per_page'],$this->uri->segment(4,0));
		$data['content']='pembayaran/data_pembayaran';
		$this->load->view('admin/template',$data);
	}
	function edit_pembayaran($id){
		$this->auth->restrict();
		/*$this->auth->cek_menu(2);*/
		$this->form_validation->set_rules('tgl_bayar','tgl_bayar','required');
		$this->form_validation->set_message('required','* Harus diisi');
		$this->form_validation->set_message('numeric','* Hanya boleh diisi angka');
		$this->form_validation->set_message('min_length[6]','* Minimal diisi 6 karakter');
		$this->form_validation->set_message('alpha_numeric','* Harus diisi kombinasi huruf dan angka');
		$this->form_validation->set_error_delimiters('', '</br>');
		
		if($this->form_validation->run()==FALSE){
			$level = $this->session->userdata('id_level');
			$data['menu'] = $this->Muser->get_menu_for_level($level);
			$data['pembayaran']=$this->Mpembayaran->select_bayar($id);
			$data['content']='pembayaran/edit_pembayaran';
			$this->load->view('admin/template',$data);
		}else{
			$this->Mpembayaran->update_bayar_sewa($id);
			$this->session->set_flashdata('success','Data pembayaran berhasil diperbarui !');
			redirect('admin/pembayaran/index');
		}
	}
	function cari_pembayaran(){
		$this->auth->restrict();
		$this->auth->cek_menu(1);
		$id_level = $this->session->userdata('id_level');
		$data['menu'] = $this->Muser->get_menu_for_level($id_level);
		
		$this->form_validation->set_rules('nama_kategori','nama_kategori','required');
		$this->form_validation->set_message('required','Anda belum mengisi data');
		$this->form_validation->set_error_delimiters('', '</br>');
		
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error','Anda belum memasukkan kata kunci pencarian !');
			redirect('admin/kategori');
		}else{
			$page=$this->uri->segment(4);
				$batas=10;
			if(!$page):
				$offset=0;
			else:
				$offset=$page;
			endif;
			
			$data['nama_kategori']="";
			$postkata=$this->input->post('nama_kategori');
			if(!empty($postkata)){
				$data['nama_kategori']=$this->input->post('nama_kategori');
				$this->session->set_userdata('cari_kategori',$data['nama_kategori']);
			}else{
				$data['nama_kategori']=$this->session->userdata('cari_kategori');
			}
			
			$data['nama_kategori']=$this->Mkategori->cari_kategori($batas,$offset,$data['nama_kategori']);
			$tot_hal=$this->Mkategori->tot_kategori('tbl_kategori','nama_kategori',$data['nama_kategori']);
			
			$config['base_url']=base_url().'admin/kategori/cari_kategori/';
			$config['per_page']=$batas;
			$config['total_rows']=$tot_hal->num_rows();
			$config['uri_segment']=4;
			$config['first_link']='First';
			$config['last_link']='Last';
			$config['next_link']='<';
			$config['next_link']='>';
			$this->pagination->initialize($config);
			$data["pagination"]=$this->pagination->create_links();
			$data['content']='kategori/cari_kategori';
			$this->load->view('admin/template',$data);
		}
	}
}
?>