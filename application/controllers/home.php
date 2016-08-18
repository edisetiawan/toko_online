<?php class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Mproduk');
		$this->load->model('Muser');
		$this->load->model('Mkomentar');
		session_start();
	}
	function index(){
		$data['base_url'] = base_url().'home/index/';
		$data['total_rows'] = $this->db->count_all('tbl_produk');
		$data['per_page'] = 12;
		$data['uri_segment'] = 3;
		$data['num_links']= 3;
		$data['next_link']='<';
		$data['next_link']='>';
		$data['cur_tag_open'] = '<li class="active"><a href="">';
		$data['num_tag_open'] = '<li>';
		
		$this->pagination->initialize($data);
		$data['produk']=$this->Mproduk->getAll($data['per_page'],$this->uri->segment(3,0));
		$data['terbaru']=$this->Mproduk->produk_terbaru();
		$data['content']='user/content';
		$this->load->view('user/template',$data);
	}
	function detil_produk(){
		$data['detil']=$this->Mproduk->detil_produk();
		$data['terbaru']=$this->Mproduk->produk_terbaru();
		$data['content']='user/detil_produk';
		$this->load->view('user/template',$data);
	}
	function perkategori($id){
		$data['base_url'] = base_url().'home/perkategori/';
		$data['total_rows'] = $this->db->count_all('tbl_produk');
		$data['per_page'] = 12;
		$data['uri_segment'] = 3;
		$data['num_links']= 3;
		$data['next_link']='<';
		$data['next_link']='>';
		$data['cur_tag_open'] = '<li class="active"><a href="">';
		$data['num_tag_open'] = '<li>';
		
		$this->pagination->initialize($data);
		$data['perkategori']=$this->Mproduk->perkategori($id, $data['per_page'],$this->uri->segment(3,0));
		
		$data['terbaru']=$this->Mproduk->produk_terbaru();
		$data['content']='user/perkategori';
		$this->load->view('user/template',$data);
	}
	function cari_produk(){
		$page=$this->uri->segment(4);
			$batas=12;
		if(!$page):
			$offset=0;
		else:
			$offset=$page;
		endif;
		if(isset($_POST['btn'])){
			$data['nama_produk']=$this->input->post('nama_produk');
			$this->session->set_userdata('cari_produk',$data['nama_produk']);
		}else{
			$data['nama_produk']=$this->session->userdata('cari_produk');
		}
			
		$tot_hal=$this->Mproduk->tot_produk_user();
						
		$config['base_url']=base_url().'home/cari_produk/';
		$config['per_page']=$batas;
		$config['num_links']= 3;
		$config['total_rows']=$tot_hal->num_rows();
		$config['uri_segment']=4;
		$config['next_link']='<';
		$config['next_link']='>';
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['num_tag_open'] = '<li>';
		$this->pagination->initialize($config);
			
		$data['hasil_cari'] = $this->Mproduk->cari_produk_user($config['per_page'],$this->uri->segment(4,0),$data['nama_produk']);
		$data['terbaru']=$this->Mproduk->produk_terbaru();
		$data['content']='user/cari_produk';
		$this->load->view('user/template',$data);
	}
	function add_komentar(){
		$this->form_validation->set_rules('nama_lengkap','nama_lengkap','required');
		$this->form_validation->set_rules('email','email','required|valid_emails');
		$this->form_validation->set_message('required','* Harus diisi');
		$this->form_validation->set_message('numeric','* Hanya boleh diisi angka');
		$this->form_validation->set_message('valid_emails','* Format email tidak valid');
		$this->form_validation->set_error_delimiters('', '</br>');
		if ($this->form_validation->run() == FALSE) {
			$data['detil']=$this->Mproduk->detil_produk();
			$data['terbaru']=$this->Mproduk->produk_terbaru();
			$data['content']='user/detil_produk';
			$this->load->view('user/template',$data);
		}else{
			$this->Mkomentar->insert();
			redirect('home/detil_produk');
		}

	}
	function tampil_komen(){
		$data['komentar']=$this->Mkomentar->tampil_komen();
	}

}
?>