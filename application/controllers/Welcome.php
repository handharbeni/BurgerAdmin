<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->endpointUri = endpoint_url();
		$this->admin = $this->user_auth->loginAuth();
		$this->sessionAdmin = $this->session->userdata('adminKey');
		$this->sessionOutlet = $this->session->userdata('outletKey');
		$this->token = $this->sessionOutlet ? $this->sessionOutlet : $this->sessionAdmin;
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
							$data['order'] = $this->sessionAdmin ? 
							$this->AdminInterface->getOrderDetail($_REQUEST['id_order'], $this->token) :
							$this->OutletInterface->getOrderDetail($_REQUEST['id_order'], $this->token);
							$data['title'] = 'Detail Order';
							self::isTemplate('detail_order' , $data);
						break;

						// case 'accept-order':
						// 	$data['title'] = 'Terima Pesanan';
						// 	$data['order'] = $this->AdminInterface->getOrderDetail($_REQUEST['id_order'], $this->token);
						// 	$data['kurir'] = $this->KurirInterface->getList();
						// 	self::isTemplate('accept_order' , $data);
						// break;

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
							$data['menu'] = $this->AdminInterface->getMenu($this->token);
							self::isTemplate('kelola_menu', $data);
						break;

						case 'add':
							$data['title'] = "Tambah Menu";
							$data['action'] = $this->uri->segment(1);
							self::isTemplate('add_menu', $data);
						break;

						case 'add_stok':
							$data['title'] = "Tambah Stok";
							$data['action'] = $this->uri->segment(1);
							$data['menuList'] = $this->AdminInterface->getMenu($this->token);
							self::isTemplate('add_stok', $data);
						break;

						case 'hapus':
							$sha = $this->input->get('sha');
							$undo = $this->input->get('undo');

							if ( ! $sha)
							{
								redirect('/');
							}

							$data = array(
									'token' => $this->sessionAdmin ? 
									$this->sessionAdmin : $this->sessionOutlet,
									'method' => $undo ? 'undo' : 'delete',
									'sha' => $sha
								);
							$rs = $this->AdminInterface->postMenu($data);

							if ( ! $undo)
								$this->session->set_userdata( array('hapus_menu' => $rs->new_sha));

							redirect('/menu?action=show');
						break;

						case 'ubah':
							if ( ! $this->input->get('sha'))
							{
								redirect('/');
							}

							$data['title'] = "Ubah Menu";
							$data['menu'] = $this->AdminInterface->getMenuDetail($this->token,$_REQUEST['sha']);
							$data['action'] = $this->uri->segment(1);
							self::isTemplate('update_menu', $data);
						break;

						case 'detail':
							if ( ! $_REQUEST['sha'])
							{
								show_404();
							}
							else
							{
								$data['title'] = "Detail: ";
								$data['menu'] = $this->AdminInterface->getMenuDetail($this->token,$_REQUEST['sha']);
								self::isTemplate('detail_menu',$data);
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
							$getToken = $_REQUEST['token'];
							if ( ! $getToken)
							{
								show_404();
							}

							$result = $this->UserInterface->getUserDetail($getToken);

							if ( ! $result->return)
							{
								redirect('/user?action=show');
							}
							else
							{
								// $data = $result->data;

								// print_r($data);
								$data['title'] = "Detail Pengguna";
								$data['user'] = $result;
								self::isTemplate('detail_user', $data);
							}
						break;

						case 'hapus':
							$getdata = $this->input->get();

							if ( ! $getdata['token'])
							{
								show_404();
							}

							$data = array(
									'token' => $this->token,
									'method' => $getdata['undo'] ? 'undo' : 'delete_user',
									'user_token' => $getdata['token']
								);

							$result = $this->UserInterface->postHapusUser($data);

							if ( ! $getdata['undo'])
								$this->session->set_userdata( array('hapus_user' => $getdata['token']));

							redirect('/user?action=show');
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
								$data['title'] = "Detail Kurir";
								$data['kurir'] = $this->KurirInterface->getKurirDetail($this->input->get('token'));
								self::isTemplate('detail_kurir',$data);
							}
						break;

						case 'edit':
							if ( ! $_REQUEST['token'])
							{
								show_404();
							}
							else
							{
								$data['title'] = "Ubah Kurir";
								$data['kurir'] = $this->KurirInterface->getKurirDetail($this->input->get('token'));
								self::isTemplate('update_kurir', $data);
							}
						break;

						case 'hapus':
							$getdata = $this->input->get();

							if ( ! $getdata['token'])
							{
								show_404();
							}

							$data = array(
									'token' => $this->token,
									'method' => $getdata['undo'] ? 'undo' : 'delete_kurir',
									'token_kurir' => $getdata['token']
								);

							$result = $this->KurirInterface->postHapusKurir($data);

							if ( ! $getdata['undo'])
								$this->session->set_userdata( array('hapus_kurir' => $getdata['token']));

							redirect('/kurir?action=show');
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
									'latitude' => $_POST['lat'],
									'longitude' => $_POST['long'],
									'alamat' => $_POST['alamat'],
 									'username' => $_POST['username'],
									'password' => $_POST['password']
								);

							$result = $this->AdminInterface->postOutlet($data);

							if ( $result->return )
							{
								redirect('/outlet?action=show');
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
								$data['outlet'] = $this->OutletInterface->getOutletDetail($_REQUEST['token']);
								$data['title'] = ($data['outlet']->return) ? 
								'Detail: '. $data['outlet']->data[0]->outlet->nama_outlet: 'Outlet not found';
								self::isTemplate('detail_outlet',$data);
							}
						break;

						case 'hapus':
							$sha = $this->input->get('token');
							$undo = $this->input->get('undo');

							if ( ! $sha)
							{
								redirect('/');
							}

							$data = array(
									'token' => $sha,
									'method' => $undo ? 'undo' : 'delete_outlet',
								);
							
							$this->AdminInterface->postOutlet($data);

							if ( ! $undo)
								$this->session->set_userdata( array('hapus_outlet' => $sha));

							redirect('/outlet?action=show');
						break;

						case 'edit':
							$getdata = $this->input->get();

							if ( ! $getdata['token'])
							{
								redirect(base_url());
							}

							$data['title'] = "Edit Outlet";
							$data['action'] = $this->uri->segment(1);
							$data['outlet'] = $this->OutletInterface->getOutletDetail($getdata['token']);
							$data['resto'] = $this->AdminInterface->getListResto();
							self::isTemplate('update_outlet', $data);
						break;

						case 'update_outlet':
								$data = array(
									'token' => $_POST['token'],
									'method' => 'update_outlet',
									'nama_outlet' => $_POST['outlet'],
									'latitude' => $_POST['lat'],
									'longitude' => $_POST['long'],
									'alamat' => $_POST['alamat'],
 									'username' => $_POST['username']
 										? $_POST['username'] : $_POST['x'],
									'password' => $_POST['password']
								);

							$result = $this->AdminInterface->postOutlet($data);

							if ( $result->return )
							{
								redirect('/outlet?action=show');
							}
							else
							{

								$_SESSION['outlet_update'] = 'Gagal: '.$result->error_message;
								redirect('/outlet?action=edit&token='.$_POST['token']);
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
							$data['banner'] = $this->AdminInterface->getBanner();
							self::isTemplate('kelola_banner' , $data);
						break;

						case 'add':
							$data['title'] = "Tambah Banner";
							$data['action'] = $this->uri->segment(1);
							self::isTemplate('add_banner' , $data);
						break;
					}
				}
			break;

			case 'profile':
				if ( ! $this->sessionAdmin)
				{
					// not authorized!
					redirect();
				}
				self::hasLogin();

				$data['title'] = 'Profile Admin';
				$data['action'] = $this->uri->segment(1);
				$data['admin'] = $this->AdminInterface->getDetailWithPassword($this->token);
				$this->adminpwd = null;

				if ( $data['admin']->return)
				{
					$this->adminpwd = $data['admin']->data[0]->password;
				}

				if ( $this->input->get('method'))
				{
					$postdata = array(
							'username' => $this->input->post('username'),
							'new_pwd' => $this->input->post('pwd'),
							'old_pwd' => md5($this->input->post('now_pwd')),
							'old_pwd_conf' => md5($this->input->post('now_pwd_conf'))
						);

					if ( $postdata['old_pwd'] != $postdata['old_pwd_conf'])
					{
						$this->session->set_userdata( array('error_profile' => 'Password tidak sama!'));
					}
					elseif ( $postdata['old_pwd'] != $this->adminpwd)
					{
						$this->session->set_userdata( array('error_profile' => 'Password salah!'));
					}
					else
					{
						$this->session->set_userdata( array('error_profile' => 'Berhasil mengubah profil!'));
						$data = array(
								'token' => $this->sessionAdmin,
								'method' => 'update',
								'username' => $postdata['username'],
								'password' => $postdata['new_pwd']
							);

						$this->AdminInterface->postUpdateProfile($data);
					}

					redirect(base_url().'profile');
				}

				self::isTemplate('profile' , $data);
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
								$_SESSION['adminpwd'] = $_POST['password'];
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

							$this->AdminInterface->postKurir($data);
							
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

						case 'add_menu':
							$nama_menu = $this->input->post('name');
							$gambar = $this->input->post('gambar');
							$harga = $this->input->post('harga');
							$kategori = $this->input->post('kategori');

							if ( ! $nama_menu || ! $gambar || ! $harga)
							{
								redirect('/');
							}

							$data = array(
									'token' => $this->sessionAdmin 
									? $this->sessionAdmin : $this->sessionOutlet,
									'method' => 'add',
									'nama' => $nama_menu,
									'gambar' => $gambar,
									'harga' => $harga,
									'kategori' => $kategori
								);

							$this->AdminInterface->postMenu($data);

							redirect('/menu?action=show');
						break;

						case 'update_menu':
							$nama_menu = $this->input->post('nama');
							$gambar = $this->input->post('gambar');
							$harga = $this->input->post('harga');
							$kategori = $this->input->post('kategori');

							if ( ! $nama_menu || ! $gambar || ! $harga)
							{
								redirect('/');
							}

							$data = array(
									'token' => $this->sessionAdmin 
									? $this->sessionAdmin : $this->sessionOutlet,
									'method' => 'update',
									'nama' => $nama_menu,
									'gambar' => $gambar,
									'harga' => $harga,
									'sha' => $this->input->post('sha'),
									'kategori' => $kategori
								);

							$this->AdminInterface->postMenu($data);

							redirect('/menu?action=show');
						break;

						case 'add_kurir':
							if ( ! $this->input->post())
							{
								redirect('/');
							}

							$data = array(
									'token' => $this->token,
									'method' => 'add_kurir',
									'nama' => $this->input->post('nama'),
									'username' => $this->input->post('username'),
									'password' => md5($this->input->post('password')),
									'foto' => $this->input->post('gambar'),
									'no_hp' => $this->input->post('no_hp'),
									'no_plat' => $this->input->post('no_plat')
								);

							$this->AdminInterface->postKurir($data);
							
							redirect('/kurir?action=show');
						break;

						case 'update_kurir':
							if ( ! $this->input->post())
							{
								redirect('/');
							}

							$postdata = $this->input->post();

							$data = array(
									'token' => $this->token,
									'method' => 'update_kurir',
									'token_kurir' => $postdata['kurir_token'],
									'nama' => $postdata['nama'] ? $postdata['nama'] : null,
									'username' =>$postdata['username'] ? $postdata['username'] : null,
									'password' => $postdata['password'] ? md5($postdata['password']) : null,
									'foto' => $postdata['gambar'] ? $postdata['gambar'] : null,
									'no_hp' => $postdata['no_hp'] ? $postdata['no_hp'] : null,
									'no_plat' => $postdata['no_plat'] ? $postdata['no_plat'] : null
								);

							$this->AdminInterface->postKurir($data);
							
							redirect('/kurir?action=show');
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
