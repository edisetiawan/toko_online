<?php class Laporan extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
		
		$this->load->model('Muser');
		$this->load->helper(array('form','url'));
		$this->load->model('Mlaporan');
	}
	function index(){
		$this->auth->restrict();
		/*$this->auth->cek_menu(2);*/

		$id_level = $this->session->userdata('id_level');
		$data['menu'] = $this->Muser->get_menu_for_level($id_level);
			
		$data['content']='laporan/menu_laporan';
		$this->load->view('admin/template',$data);
	}
	function lap_order(){
		$this->auth->restrict();
		/*$this->auth->cek_menu(2);*/

			$id_level = $this->session->userdata('id_level');
			$data['menu'] = $this->Muser->get_menu_for_level($id_level);
			
		$data['order']=$this->Mlaporan->lap_order();
		if($data['order']==null){
			$this->session->set_flashdata('error','Data masih kosong ');
			redirect('admin/laporan');
		}else{
			$this->load->view('laporan/lap_order',$data);
		}
	}
	function nota_order($id){
		$this->auth->restrict();
		/*$this->auth->cek_menu(3);*/

			$id_level = $this->session->userdata('id_level');
			$data['menu'] = $this->Muser->get_menu_for_level($id_level);
			$data['nota_order']= $this->Mlaporan->nota_order($id);
			$data['detil_order']=$this->Mlaporan->detil_order($id);
			$this->load->view('laporan/nota_order',$data);
	}
	function nota_pembayaran($id){
		$this->auth->restrict();
		/*$this->auth->cek_menu(3);*/

			$id_level = $this->session->userdata('id_level');
			$data['menu'] = $this->Muser->get_menu_for_level($id_level);
			$data['nota_order']= $this->Mlaporan->nota_order($id);
			$data['detil_order']=$this->Mlaporan->detil_order($id);
			$data['nota_pembayaran']= $this->Mlaporan->nota_pembayaran($id);
			$this->load->view('laporan/nota_pembayaran',$data);
	}
}
?>