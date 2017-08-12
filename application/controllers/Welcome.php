<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->endpointUri = "http://burgertahumalang.com/dev/api/";
		$this->admin = $this->user_auth->loginAuth();
		$this->sessionAdmin = $this->session->userdata('adminKey');
		$this->sessionOutlet = $this->session->userdata('outletKey');
	}
	
	public function index()
	{
		self::hasLogin();
		self::indexRoute();
	}

	private function indexRoute()
	{
		$data['title'] = "Beranda";
		$data['order'] = $this->sessionAdmin ? 
				$this->AdminInterface->getOrder($this->sessionAdmin) :
				$this->OutletInterface->getOrder($this->sessionOutlet);
		$data['menu'] = $this->sessionAdmin ? 
				$this->AdminInterface->getMenu($this->sessionAdmin) :
				$this->OutletInterface->getMenu($this->sessionOutlet); 
		$data['kurir'] = $this->KurirInterface->getList();
		$data['userdata'] = $this->UserInterface->getList();
		$data['outlet'] = $this->OutletInterface->getList();

		self::isTemplate('beranda',$data);
	}

	private function isTemplate($content , $data = NULL)
	{
		$data['admindata'] = $this->admin->data[0];	
		$this->load->view('templates/header' , $data);
		$this->load->view('templates/sidebar' , $data);
		$this->load->view('templates/top_navigation' , $data);
		$this->load->view($content, $data);
		$this->load->view('templates/footer', $data);
	}

	private function hasLogin()
	{
		if ( $this->user_auth->loginAuth())
		{
			return $this->user_auth->loginAuth();
		}
		else
		{
			redirect('/login');
		}
	}

	public function halaman($view = '')
	{
		$view = trimLower($view);
		$getAction = trimLower(@$_REQUEST['action']);
		switch($view)
		{
			case 'beranda':
				self::hasLogin();
				self::indexRoute();
			break;

			case 'pesanan':
				self::hasLogin();
				if ( $getAction && $_REQUEST['id_order'])
				{
					switch($getAction) 
					{
						case 'detail':
							$data['order'] = $this->AdminInterface->getOrderDetail($_REQUEST['id_order']);
							$data['title'] = 'Detail Order';
							self::isTemplate('detail_order' , $data);
						break;


						case 'accept-order':
							$data['title'] = 'Terima Pesanan';
							$data['order'] = $this->AdminInterface->getOrderDetail($_REQUEST['id_order']);
							$data['kurir'] = $this->KurirInterface->getList();
							self::isTemplate('accept_order' , $data);
						break;
						
						default:
							show_404();
						break;
					}
				}
				else
				{
					$data['title'] = "Pesanan";
					$data['uri'] = $this->uri->segment(1);
					$data['order'] = $this->sessionAdmin ? 
					$this->AdminInterface->getOrder($this->sessionAdmin) :
					$this->OutletInterface->getOrder($this->sessionOutlet);
					self::isTemplate('pesanan' ,$data);
				}
			break;

			case 'menu':
				self::hasLogin();
				if ( ! $getAction)
				{
					show_404();
				}
				else
				{
					switch($getAction)
					{
						case 'show':
							$data['title'] = "Kelola Menu";
							$data['menu'] = $this->sessionAdmin ? 
							$this->AdminInterface->getMenu($this->sessionAdmin) :
							$this->OutletInterface->getMenu($this->sessionOutlet); 
							self::isTemplate('kelola_menu', $data);
						break;

						case 'add':
							$data['title'] = "Tambah Menu";
							$data['action'] = $this->uri->segment(1);
							self::isTemplate('add_menu', $data);
						break;

						case 'detail':
							if ( ! $_REQUEST['sha'])
							{
								show_404();
							}
							else
							{
								$data['title'] = "Detail: ";
								self::isTemplate('example',$data);
							}
						break;

						default:
							show_404();
						break;
					}
				}
			break;

			case 'user':
				self::hasLogin();
				if ( ! $getAction)
				{
					show_404();
				}
				else
				{
					switch($getAction)
					{
						case 'show':
							$data['title'] = "Kelola Pengguna";
							$data['userdata'] = $this->UserInterface->getList();
							self::isTemplate('kelola_user', $data);
						break;

						case 'add':
							$data['title'] = "Tambah Pengguna";
							$data['action'] = $this->uri->segment(1);
							self::isTemplate('add_user', $data);
						break;

						case 'detail':
							$getToken = @$_REQUEST['token'];
							if ( ! $getToken)
							{
								show_404();
							}

							$result = $this->UserInterface->getUserDetail($getToken);

							if ( ! $result)
							{
								redirect('/user?action=show');
							}
							else
							{
								$data = $result->data;

								print_r($data);
							}
						break;

						default:
							show_404();
						break;
					}
				}
			break;

			case 'kurir':
				self::hasLogin();
				if ( ! $getAction)
				{
					show_404();
				}
				else
				{
					switch($getAction)
					{
						case 'show':
							$data['title'] = "Kelola Kurir";
							$data['kurir'] = $this->KurirInterface->getList();
							self::isTemplate('kelola_kurir', $data);
						break;

						case 'add':
							$data['title'] = "Tambah Kurir";
							$data['action'] = $this->uri->segment(1);
							self::isTemplate('add_kurir', $data);
						break;

						case 'detail':
							if ( ! $_REQUEST['token'])
							{
								show_404();
							}
							else
							{
								$data['title'] = "Detail: ";
								self::isTemplate('example',$data);
							}
						break;

						default:
							show_404();
						break;
					}
				}
			break;

			case 'outlet':
				self::hasLogin();
				if ( ! $getAction)
				{
					show_404();
				}
				else
				{
					switch($getAction)
					{
						case 'show':
							$data['title'] = "Kelola Outlet";
							$data['outletdata'] = $this->OutletInterface->getList();
							self::isTemplate('kelola_outlet', $data);
						break;

						case 'add':
							$data['title'] = "Tambah Outlet";
							$data['action'] = $this->uri->segment(1);
							$data['resto'] = $this->AdminInterface->getListResto();
							self::isTemplate('add_outlet', $data);
						break;

						case 'add_outlet':
								$data = array(
									'token' => $this->sessionAdmin,
									'method' => 'add_outlet',
									'id_resto' => $_POST['resto'],
									'nama_outlet' => $_POST['outlet'],
									'alamat' => $_POST['alamat'],
 									'username' => $_POST['username'],
									'password' => $_POST['password']
								);

							$result = $this->AdminInterface->postAddOutlet($data);

							if ( $result->return )
							{
								redirect('/outlet?action=add');
							}
							else
							{
								$_SESSION['error_add'] = 'Gagal: '.$result->error_message;
								redirect('/outlet?action=add');
							}
						break;

						case 'detail':
							if ( ! $_REQUEST['token'])
							{
								show_404();
							}
							else
							{
								$data['title'] = "Detail: ";
								self::isTemplate('example',$data);
							}
						break;

						default:
							show_404();
						break;
					}
				}
			break;

			case 'banner':
				self::hasLogin();
				if ( ! $getAction)
				{
					show_404();
				}
				else
				{
					switch($getAction)
					{
						case 'show':
							$data['title'] = "Lihat Banner";
							self::isTemplate('example' , $data);
						break;

						case 'add':
							$data['title'] = "Tambah Banner";
							self::isTemplate('example' , $data);
						break;
					}
				}
			break;

			case 'profile':
				self::hasLogin();
				$data['title'] = 'Profil';
				self::isTemplate('example' , $data);
			break;

			case 'settings':
				self::hasLogin();
				$data['title'] = 'Pengaturan';
				$data['getKm'] = $this->AdminInterface->getToolsValue('km')->data[0];
				self::isTemplate('settings',$data);
			break;

			case 'login':
				$this->load->view('login');
			break;

			case 'do_action';
				$method = trimLower($_REQUEST['method']);

				$data = array(
						'username' => @$_POST['username'],
						'password' => @$_POST['password']
					);

				if ( ! $method)
				{
					show_404();
				}
				else
				{
					switch($method)
					{
						case 'login':
							$rsadmin = $this->curl->simple_post($this->endpointUri.'/admin/login' , $data);
							$result = json_decode($rsadmin);

							if ( $result->return)
							{
								$_SESSION['userAuth'] = TRUE;
								if ( $result->data->id_outlet == 0 
									|| $result->data->id_outlet == null)
								{
									$_SESSION['adminKey'] = $result->data->key;
								}
								else
								{
									$_SESSION['outletKey'] = $result->data->key;
								}
								redirect('/beranda');
							}
							else
							{
								redirect('/login');
							}
						break;

						case 'accept_order':
							if ( ! $this->input->post())
							{
								redirect('/');
							}

							$data = array(
									'token' => ( $this->sessionAdmin ) ? 
									$this->sessionAdmin : $this->sessionOutlet,
									'method' => 'send_order',
									'id_order' => $this->input->post('order'),
									'id_kurir' => $this->input->post('kurir')
								);

							$this->AdminInterface->postOrderToCourier($data);
							
							redirect('/pesanan');
						break;

						case 'cancel_order':
							// todo
						break;

						case 'setting':
							if ( ! $this->input->post())
							{
								redirect('/');
							}

							$data = array(
									'token' => ( $this->sessionAdmin ) ? 
									$this->sessionAdmin : $this->sessionOutlet,
									'km' => $this->input->post('km')
								);

							$rs = $this->AdminInterface->postSettings($data);
							
							$this->session->set_userdata(array(
									'return_settings' => $rs->return,
									'message_settings' => ($rs->return) ? 
									'text-success|'.$rs->message : 'text-danger|'.$rs->error_message
								));

							redirect('/settings');
						break;

						default:
							show_404();
						break;
					}
				}
			break;

			case 'logout':
				session_destroy();
				redirect('/login');
			break;

			default:
				show_404();
			break;
		}
	}
}
