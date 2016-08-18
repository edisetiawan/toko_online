<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Order_pesanan extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Mbiaya_kirim');
		$this->load->model('Mmember');
		$this->load->model('Muser');
		$this->load->model('Mproduk');
		$this->load->model('Mdorder');
		$this->load->model('Morder');
		$this->load->model('Mkategori');
		$this->load->model('Mpembayaran');
		$this->load->library('cart');
		session_start();
	}
	function index(){
		$this->auth->restrict_member();			//* cek user sudah login /belum
		/*$this->auth->cek_menu(3);*/
		$id_level = $this->session->userdata('id_level');
		$data['menu'] = $this->Muser->get_menu_for_level($id_level);	//* cek user sudah login /belum

		$data['base_url'] = base_url().'order_pesanan/index/';
		$data['total_rows'] = $this->db->count_all('tbl_order');
		$data['per_page'] = 12;
		$data['uri_segment'] = 3;
		$data['num_links']= 3;
		$data['next_link']='<';
		$data['next_link']='>';
		$data['cur_tag_open'] = '<li class="active"><a href="">';
		$data['num_tag_open'] = '<li>';
		
		$this->pagination->initialize($data);
		$data['order']=$this->Morder->getMember($data['per_page'],$this->uri->segment(3,0));
		
		$this->load->view('user/data_order',$data);

	}
	function konfirmasi_order(){
		$data['detil_belanja']=$this->Mdorder->detil_belanja();
		$this->load->view('user/konfirmasi_order',$data);
	}
	function add_order(){
		$this->Morder->insert();
			$kdpesan = $this->Morder->getCode();
		$this->session->set_userdata('id_order', $kdpesan['id_order']);
		$this->Mpembayaran->insert();	
		foreach($this->cart->contents() as $items):
			$this->Mdorder->insert($items['id'], $items['qty']);
		endforeach;		
			/*$this->Mpesan->kurangi_stok($items['id'], $items['qty']);*/
		$this->cart->destroy();
		redirect('order_pesanan/konfirmasi_order');
	}
	function select_validate($selectValue){
		if($selectValue=='none'){
			$this->form_validation->set_message('select_validate','Tidak ada data yang dipilih');
			return false;
		}else{
			return true;
		}
	}
	function detil_order($id){
		$data['order']=$this->Morder->detil_order($id);
		$data['detil']=$this->Mdorder->detil_order($id);
		$this->load->view('user/detil_order',$data);
	}
}
?>