<?php
/**
 * Created by PhpStorm.
 * User: mtaneja
 * Company: Karma Solutions LLC / info@karmasolutionz.com 
 * Date: 6/8/16
 * Time: 2:48 PM
 */

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Search extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$serviceTotal = $this->common->selectRecord("sshd_service","count(ServiceID) as total",array("Status"=>1));
		$data['total'] = $serviceTotal[0]->total;

		$data['times'] = $this->common->selectRecord("sshd_time");

		$sdata = $this->session->get_userdata('data');
		$filter_box = $filter_zc = "";
		if(!empty($sdata['data'])) {
			foreach ($sdata['data'] as $key => $value) {
				if($key == 'filter_box' && !empty($value)) { 
					$filter_box = $value;
					$aaa1 = $this->db->where('(HairColor like "%'.$value.'%")')->get('sshd_haircolor')->result();
					$aaa2=$this->db->where('(HairFor like "%'.$value.'%")')->get('sshd_hairfor')->result();
					$aaa3 = $this->db->where('(HairLength like "%'.$value.'%")')->get('sshd_hairlength')->result();
					$aaa4 = $this->db->where('(HairProfessional like "%'.$value.'%")')->get('sshd_hairprofessional')->result();
					$aaa5 = $this->db->where('(HairType like "%'.$value.'%")')->get('sshd_hairtype')->result();
					$aaa6 = $this->db->where('(ServiceName like "%'.$value.'%")')->get('sshd_servicemaster')->result();
					$aaa7 = $this->db->select("s.*")->from('sshd_service as s')->join("sshd_stylist as sl","s.UserID = sl.UserID")->where('(s.Title like "%'.$value.'%" or sl.StylistName like "%'.$value.'%")')->group_by('s.ServiceID')->get('sshd_servicemaster')->result();
				}
			}

			$this->db->select("s.*,sl.StylistName,sl.EmailID,sl.Slug,sl.ProfilePic,sl.UserID as uid,sl.Latitude,sl.Longitude")->from('sshd_service as s')->join("sshd_stylist as sl","s.UserID = sl.UserID");
			foreach ($sdata['data'] as $key => $value) {
				$q = "";$i = 0;
				if($key == 'search_forprofessional') {
					foreach ($value as $val) {
						if(!empty($q)) {
							$q .= " or ";$i = 1;
						}
						$q .= "FIND_IN_SET(".$val.",sl.HairProfessionalID)";
					}
					if($i == 0) { $this->db->where("".$q." !=",0); }else{ $this->db->where("(".$q.")"); }
				}elseif($key == 'search_fortype') {
					$q = "";$i = 0;
					foreach ($value as $val) {
						if(!empty($q)) {
							$q .= " or ";$i = 1;
						}
						$q .= "FIND_IN_SET(".$val.",s.HairForID)";
					}
					if($i == 0) { $this->db->where("".$q." !=",0); }else{ $this->db->where("(".$q.")"); }
				}elseif($key == 'search_hairtype') {
					$q = "";$i = 0;
					foreach ($value as $val) {
						if(!empty($q)) {
							$q .= " or ";$i = 1;
						}
						$q .= "FIND_IN_SET(".$val.",s.HairTypeID)";
					}
					if($i == 0) { $this->db->where("".$q." !=",0); }else{ $this->db->where("(".$q.")"); }
				}elseif($key == 'search_hairlength') {
					$q = "";$i = 0;
					foreach ($value as $val) {
						if(!empty($q)) {
							$q .= " or ";$i = 1;
						}
						$q .= "FIND_IN_SET(".$val.",s.HairLengthID)";
					}
					if($i == 0) { $this->db->where("".$q." !=",0); }else{ $this->db->where("(".$q.")"); }
				}elseif($key == 'search_haircolor') {
					$q = "";$i = 0;
					foreach ($value as $val) {
						if(!empty($q)) {
							$q .= " or ";$i = 1;
						}
						$q .= "FIND_IN_SET(".$val.",s.HairColorID)";
					}
					if($i == 0) { $this->db->where("".$q." !=",0); }else{ $this->db->where("(".$q.")"); }
				}elseif($key == 'search_services') {
					$q = "";$i = 0;
					foreach ($value as $val) {
						if(!empty($q)) {
							$q .= " or ";$i = 1;
						}
						$q .= "FIND_IN_SET(".$val.",s.ServiceMasterID)";
					}
					if($i == 0) { $this->db->where("".$q." !=",0); }else{ $this->db->where("(".$q.")"); }
				}elseif($key == 'filter_box') {
					$filter_box = $value;
					if(empty($aaa1) && empty($aaa2) && empty($aaa3) && empty($aaa4) && empty($aaa5) && empty($aaa6) && empty($aaa7)) {
						$this->db->where('(s.Title like "%'.$value.'%" or sl.StylistName like "%'.$value.'%")');
					}
					$ii = 0;$q = "";
					if(!empty($aaa7)) {
						$ii = 1;
						$q .= 's.Title like "%'.$value.'%" or sl.StylistName like "%'.$value.'%"';
					}
				// ------------------- Hair Color --------------
					$i = 0;
					if(!empty($aaa1)) {
						foreach ($aaa1 as $value) {
							if(!empty($q)) {
								$q .= " or ";$i = 1;
							}
							$q .= "FIND_IN_SET(".$value->HairColorID.",s.HairColorID)";
						}
					}
				// ------------------- Hair For --------------
					if(!empty($aaa2)) {
						foreach ($aaa2 as $value) {
							if(!empty($q)) {
								$q .= " or ";$i = 1;
							}
							$q .= "FIND_IN_SET(".$value->HairForID.",s.HairForID)";
						}
					}
				// ------------------- Hair Length --------------
					if(!empty($aaa3)) {
						foreach ($aaa3 as $value) {
							if(!empty($q)) {
								$q .= " or ";$i = 1;
							}
							$q .= "FIND_IN_SET(".$value->HairLengthID.",s.HairLengthID)";
						}
					}
				// ------------------- Hair Professional --------------
					if(!empty($aaa4)) {
						foreach ($aaa4 as $value) {
							if(!empty($q)) {
								$q .= " or ";$i = 1;
							}
							$q .= "FIND_IN_SET(".$value->HairProfessionalID.",s.HairProfessionalID)";
						}
					}
				// ------------------- Hair Type --------------
					if(!empty($aaa5)) {
						foreach ($aaa5 as $value) {
							if(!empty($q)) {
								$q .= " or ";$i = 1;
							}
							$q .= "FIND_IN_SET(".$value->HairTypeID.",s.HairTypeID)";
						}
					}
				// ------------------- Hair Services --------------
					if(!empty($aaa6)) {
						foreach ($aaa6 as $value) {
							if(!empty($q)) {
								$q .= " or ";$i = 1;
							}
							$q .= "FIND_IN_SET(".$value->ServiceMasterID.",s.ServiceMasterID)";
						}
					}
					if(!empty($q)) {
						if($i == 0) { 
							if($ii == 1) {
								$this->db->where("(".$q.")"); 
							}else{
								$this->db->where("".$q." !=",0); 
							}
						}else{ 
							$this->db->where("(".$q.")"); 
						}
					}
				}elseif($key == 'filter_zc') {
					$filter_zc = $value;
					$this->db->where('(sl.City like "%'.$value.'%" or sl.FullAddress like "%'.$value.'%")');
				}elseif($key == 'search_pricing') {
					if(count($value) == 2) {
						if($value[0] == 1 && $value[1] == 2) {
							$this->db->where('(s.Price between 00 and 200)');
						}elseif($value[0] == 2 && $value[1] == 3) {
							$this->db->where('(s.Price > 50)');
						}elseif($value[0] == 1 && $value[1] == 3) {
							$this->db->where('(s.Price between  00 and 50 or s.Price > 200)');
						}
					}elseif(count($value) == 1) {
						foreach ($value as $val) {
							if($val == 3) {
								$this->db->where('(s.Price > 200)');
							}elseif($val == 2) {
								$this->db->where('(s.Price between 51 and 200)');
							}elseif($val == 1) {
								$this->db->where('(s.Price between  00 and 50)');
							}
						}
					}
				}
			}
			$services = $this->db->where("s.Status",1)->group_by("s.ServiceID")->order_by('s.ServiceID','desc')->get()->result();

		}elseif(!empty($sdata['ssid1'])) {
			$this->db->select("s.*,sl.StylistName,sl.EmailID,sl.Slug,sl.ProfilePic,sl.UserID as uid,sl.Latitude,sl.Longitude")->from('sshd_service as s')->join("sshd_stylist as sl","s.UserID = sl.UserID");
			$aa = explode("-", $sdata['ssid1']);
			$aa1 = explode("-", $sdata['ssid2']);
			if(!empty($sdata['ssid2']) && !empty($sdata['ssid1'])) {
				if($aa[0] == $aa1[0]) {
					if($aa[0] == "ss") {
						$this->db->where("FIND_IN_SET(".$aa[1].",s.ServiceMasterID) or FIND_IN_SET(".$aa1[1].",s.ServiceMasterID)");
					}elseif($aa[0] == "hl") {
						$this->db->where("FIND_IN_SET(".$aa[1].",s.HairLengthID) or FIND_IN_SET(".$aa1[1].",s.HairLengthID)");
					}elseif($aa[0] == "ht") {
						$this->db->where("FIND_IN_SET(".$aa[1].",s.HairTypeID) or FIND_IN_SET(".$aa1[1].",s.HairTypeID)");
					}elseif($aa[0] == "hc") {
						$this->db->where("FIND_IN_SET(".$aa[1].",s.HairColorID) or FIND_IN_SET(".$aa1[1].",s.HairColorID)");
					}
				}else{
					if($aa[0] == "ss") {
						$this->db->where("FIND_IN_SET(".$aa[1].",s.ServiceMasterID ) !=",0);
					}elseif($aa[0] == "hl") {
						$this->db->where("FIND_IN_SET(".$aa[1].",s.HairLengthID ) !=",0);
					}elseif($aa[0] == "ht") {
						$this->db->where("FIND_IN_SET(".$aa[1].",s.HairTypeID ) !=",0);
					}elseif($aa[0] == "hc") {
						$this->db->where("FIND_IN_SET(".$aa[1].",s.HairColorID ) !=",0);
					}

					if($aa1[0] == "ss") {
						$this->db->where("FIND_IN_SET(".$aa1[1].",s.ServiceMasterID ) !=",0);
					}elseif($aa1[0] == "hl") {
						$this->db->where("FIND_IN_SET(".$aa1[1].",s.HairLengthID ) !=",0);
					}elseif($aa1[0] == "ht") {
						$this->db->where("FIND_IN_SET(".$aa1[1].",s.HairTypeID ) !=",0);
					}elseif($aa1[0] == "hc") {
						$this->db->where("FIND_IN_SET(".$aa1[1].",s.HairColorID ) !=",0);
					}
				}
			}else{
				if($aa[0] == "ss") {
					$this->db->where("FIND_IN_SET(".$aa[1].",s.ServiceMasterID ) !=",0);
				}elseif($aa[0] == "hl") {
					$this->db->where("FIND_IN_SET(".$aa[1].",s.HairLengthID ) !=",0);
				}elseif($aa[0] == "ht") {
					$this->db->where("FIND_IN_SET(".$aa[1].",s.HairTypeID ) !=",0);
				}elseif($aa[0] == "hc") {
					$this->db->where("FIND_IN_SET(".$aa[1].",s.HairColorID ) !=",0);
				}
			}
			$services = $this->db->where("s.Status",1)->group_by("s.ServiceID")->order_by('s.ServiceID','desc')->get()->result();
		}else{
			if(isset($_POST['id']) && !empty($_POST['id'])) {
				// $services = $this->common->selectRecord("sshd_service","ServiceID,ServicePic,Title,Description,Price,HasTag,ServiceMasterID,ServiceTime,thumbnail",array("Status"=>1,'ServiceID'=>$_POST['id']),"ServiceID","desc");
				$services = $this->db->select("s.*,sl.StylistName,sl.EmailID,sl.Slug,sl.ProfilePic,sl.UserID as uid,sl.Latitude,sl.Longitude")->from('sshd_service as s')->join('sshd_stylist as sl','s.UserID = sl.UserID')->where('s.ServiceID',$_POST['id'])->where('s.Status',1)->order_by('s.ServiceID','desc')->get()->result();
			} else {
				// $services = $this->common->selectRecord("sshd_service","ServiceID,ServicePic,Title,Description,Price,HasTag,ServiceMasterID,ServiceTime,thumbnail",array("Status"=>1),"ServiceID","desc");
				$services = $this->db->select("s.*,sl.StylistName,sl.EmailID,sl.Slug,sl.ProfilePic,sl.UserID as uid,sl.Latitude,sl.Longitude")->from('sshd_service as s')->join('sshd_stylist as sl','s.UserID = sl.UserID')->where('s.Status',1)->order_by('s.ServiceID','desc')->get()->result();
			}
		}
// die;
		$data['stylist_location'] = $services;

		$services = $this->db->select("s.*,sl.StylistName,sl.EmailID,sl.Slug,sl.ProfilePic,sl.UserID as uid")->from('sshd_service as s')->join("sshd_stylist as sl","s.UserID = sl.UserID")->where("s.Status",1)->group_by("s.ServiceID")->order_by('s.ServiceID','desc')->get()->result();
		$service = array();
		if(!empty($services)) {
			foreach ($services as $value) {
				$data11 = $this->db->select('ServiceName,ServiceMasterID')->where_in('ServiceMasterID',explode(",",$value->ServiceMasterID))->get('sshd_servicemaster')->result();
				$value->services = $data11;
				$service[] = $value;
			}
		}
		$data['location_services'] = $service;

		$user = $this->session->get_userdata('user');
		if(empty($user['user']['id'])) {
			$data['user'] = "";
		}else{
			$data['user']= $user['user']['id'];
		}
		$menu['searchmenu'] = 'active';
		$ss3 = $this->session->get_userdata('ssid3');
		$data['ssidd1'] = $filter_box;
		if(!empty($ss3['ssid3'])){
			$data['ssidd1'] = $ss3['ssid3'];
		}
		$data['ssidd2'] = $filter_zc;
// die;
		$this->load->view("common/header", $menu);
		$this->load->view("search", $data);
		$this->load->view("common/footer", []);
	}

	public function getServices()
	{
		$sdata = $this->session->get_userdata('data');
		if(!empty($sdata['data'])) {
			foreach ($sdata['data'] as $key => $value) {
				if($key == 'filter_box' && !empty($value)) { 
					$aaa1 = $this->db->where('(HairColor like "%'.$value.'%")')->get('sshd_haircolor')->result();
					$aaa2=$this->db->where('(HairFor like "%'.$value.'%")')->get('sshd_hairfor')->result();
					$aaa3 = $this->db->where('(HairLength like "%'.$value.'%")')->get('sshd_hairlength')->result();
					$aaa4 = $this->db->where('(HairProfessional like "%'.$value.'%")')->get('sshd_hairprofessional')->result();
					$aaa5 = $this->db->where('(HairType like "%'.$value.'%")')->get('sshd_hairtype')->result();
					$aaa6 = $this->db->where('(ServiceName like "%'.$value.'%")')->get('sshd_servicemaster')->result();
					$aaa7 = $this->db->select("s.*")->from('sshd_service as s')->join("sshd_stylist as sl","s.UserID = sl.UserID")->where('(s.Title like "%'.$value.'%" or sl.StylistName like "%'.$value.'%")')->group_by('s.ServiceID')->get('sshd_servicemaster')->result();
				}
			}

			$this->db->select("s.*,sl.StylistName,sl.EmailID,sl.Slug,sl.ProfilePic,sl.UserID as uid,sl.Latitude,sl.Longitude")->from('sshd_service as s')->join("sshd_stylist as sl","s.UserID = sl.UserID");
			foreach ($sdata['data'] as $key => $value) {
				$q = "";$i = 0;
				if($key == 'search_forprofessional') {
					foreach ($value as $val) {
						if(!empty($q)) {
							$q .= " or ";$i = 1;
						}
						$q .= "FIND_IN_SET(".$val.",sl.HairProfessionalID)";
					}
					if($i == 0) { $this->db->where("".$q." !=",0); }else{ $this->db->where("(".$q.")"); }
				}elseif($key == 'search_fortype') {
					$q = "";$i = 0;
					foreach ($value as $val) {
						if(!empty($q)) {
							$q .= " or ";$i = 1;
						}
						$q .= "FIND_IN_SET(".$val.",s.HairForID)";
					}
					if($i == 0) { $this->db->where("".$q." !=",0); }else{ $this->db->where("(".$q.")"); }
				}elseif($key == 'search_hairtype') {
					$q = "";$i = 0;
					foreach ($value as $val) {
						if(!empty($q)) {
							$q .= " or ";$i = 1;
						}
						$q .= "FIND_IN_SET(".$val.",s.HairTypeID)";
					}
					if($i == 0) { $this->db->where("".$q." !=",0); }else{ $this->db->where("(".$q.")"); }
				}elseif($key == 'search_hairlength') {
					$q = "";$i = 0;
					foreach ($value as $val) {
						if(!empty($q)) {
							$q .= " or ";$i = 1;
						}
						$q .= "FIND_IN_SET(".$val.",s.HairLengthID)";
					}
					if($i == 0) { $this->db->where("".$q." !=",0); }else{ $this->db->where("(".$q.")"); }
				}elseif($key == 'search_haircolor') {
					$q = "";$i = 0;
					foreach ($value as $val) {
						if(!empty($q)) {
							$q .= " or ";$i = 1;
						}
						$q .= "FIND_IN_SET(".$val.",s.HairColorID)";
					}
					if($i == 0) { $this->db->where("".$q." !=",0); }else{ $this->db->where("(".$q.")"); }
				}elseif($key == 'search_services') {
					$q = "";$i = 0;
					foreach ($value as $val) {
						if(!empty($q)) {
							$q .= " or ";$i = 1;
						}
						$q .= "FIND_IN_SET(".$val.",s.ServiceMasterID)";
					}
					if($i == 0) { $this->db->where("".$q." !=",0); }else{ $this->db->where("(".$q.")"); }
				}elseif($key == 'filter_box') {
					if(empty($aaa1) && empty($aaa2) && empty($aaa3) && empty($aaa4) && empty($aaa5) && empty($aaa6) && empty($aaa7)) {
						$this->db->where('(s.Title like "%'.$value.'%" or sl.StylistName like "%'.$value.'%")');
					}
					$ii = 0;$q = "";
					if(!empty($aaa7)) {
						$ii = 1;
						$q .= 's.Title like "%'.$value.'%" or sl.StylistName like "%'.$value.'%"';
					}
				// ------------------- Hair Color --------------
					$i = 0;
					if(!empty($aaa1)) {
						foreach ($aaa1 as $value) {
							if(!empty($q)) {
								$q .= " or ";$i = 1;
							}
							$q .= "FIND_IN_SET(".$value->HairColorID.",s.HairColorID)";
						}
					}
				// ------------------- Hair For --------------
					if(!empty($aaa2)) {
						foreach ($aaa2 as $value) {
							if(!empty($q)) {
								$q .= " or ";$i = 1;
							}
							$q .= "FIND_IN_SET(".$value->HairForID.",s.HairForID)";
						}
					}
				// ------------------- Hair Length --------------
					if(!empty($aaa3)) {
						foreach ($aaa3 as $value) {
							if(!empty($q)) {
								$q .= " or ";$i = 1;
							}
							$q .= "FIND_IN_SET(".$value->HairLengthID.",s.HairLengthID)";
						}
					}
				// ------------------- Hair Professional --------------
					if(!empty($aaa4)) {
						foreach ($aaa4 as $value) {
							if(!empty($q)) {
								$q .= " or ";$i = 1;
							}
							$q .= "FIND_IN_SET(".$value->HairProfessionalID.",s.HairProfessionalID)";
						}
					}
				// ------------------- Hair Type --------------
					if(!empty($aaa5)) {
						foreach ($aaa5 as $value) {
							if(!empty($q)) {
								$q .= " or ";$i = 1;
							}
							$q .= "FIND_IN_SET(".$value->HairTypeID.",s.HairTypeID)";
						}
					}
				// ------------------- Hair Services --------------
					if(!empty($aaa6)) {
						foreach ($aaa6 as $value) {
							if(!empty($q)) {
								$q .= " or ";$i = 1;
							}
							$q .= "FIND_IN_SET(".$value->ServiceMasterID.",s.ServiceMasterID)";
						}
					}
					if(!empty($q)) {
						if($i == 0) { 
							if($ii == 1) {
								$this->db->where("(".$q.")"); 
							}else{
								$this->db->where("".$q." !=",0); 
							}
						}else{ 
							$this->db->where("(".$q.")"); 
						}
					}
				}elseif($key == 'filter_zc') {
					$this->db->where('(sl.City like "%'.$value.'%" or sl.FullAddress like "%'.$value.'%")');
				}elseif($key == 'search_pricing') {
					if(count($value) == 2) {
						if($value[0] == 1 && $value[1] == 2) {
							$this->db->where('(s.Price between 00 and 200)');
						}elseif($value[0] == 2 && $value[1] == 3) {
							$this->db->where('(s.Price > 50)');
						}elseif($value[0] == 1 && $value[1] == 3) {
							$this->db->where('(s.Price between  00 and 50 or s.Price > 200)');
						}
					}elseif(count($value) == 1) {
						foreach ($value as $val) {
							if($val == 3) {
								$this->db->where('(s.Price > 200)');
							}elseif($val == 2) {
								$this->db->where('(s.Price between 51 and 200)');
							}elseif($val == 1) {
								$this->db->where('(s.Price between  00 and 50)');
							}
						}
					}
				}
			}
			$services = $this->db->where("s.Status",1)->group_by("s.ServiceID")->order_by('s.ServiceID','desc')->get()->result();

		}elseif(!empty($sdata['ssid1'])) {
			$this->db->select("s.*,sl.StylistName,sl.EmailID,sl.Slug,sl.ProfilePic,sl.UserID as uid,sl.Latitude,sl.Longitude")->from('sshd_service as s')->join("sshd_stylist as sl","s.UserID = sl.UserID");
			$aa = explode("-", $sdata['ssid1']);
			$aa1 = explode("-", $sdata['ssid2']);
			if(!empty($sdata['ssid2']) && !empty($sdata['ssid1'])) {
				if($aa[0] == $aa1[0]) {
					if($aa[0] == "ss") {
						$this->db->where("FIND_IN_SET(".$aa[1].",s.ServiceMasterID) or FIND_IN_SET(".$aa1[1].",s.ServiceMasterID)");
					}elseif($aa[0] == "hl") {
						$this->db->where("FIND_IN_SET(".$aa[1].",s.HairLengthID) or FIND_IN_SET(".$aa1[1].",s.HairLengthID)");
					}elseif($aa[0] == "ht") {
						$this->db->where("FIND_IN_SET(".$aa[1].",s.HairTypeID) or FIND_IN_SET(".$aa1[1].",s.HairTypeID)");
					}elseif($aa[0] == "hc") {
						$this->db->where("FIND_IN_SET(".$aa[1].",s.HairColorID) or FIND_IN_SET(".$aa1[1].",s.HairColorID)");
					}
				}else{
					if($aa[0] == "ss") {
						$this->db->where("FIND_IN_SET(".$aa[1].",s.ServiceMasterID ) !=",0);
					}elseif($aa[0] == "hl") {
						$this->db->where("FIND_IN_SET(".$aa[1].",s.HairLengthID ) !=",0);
					}elseif($aa[0] == "ht") {
						$this->db->where("FIND_IN_SET(".$aa[1].",s.HairTypeID ) !=",0);
					}elseif($aa[0] == "hc") {
						$this->db->where("FIND_IN_SET(".$aa[1].",s.HairColorID ) !=",0);
					}

					if($aa1[0] == "ss") {
						$this->db->where("FIND_IN_SET(".$aa1[1].",s.ServiceMasterID ) !=",0);
					}elseif($aa1[0] == "hl") {
						$this->db->where("FIND_IN_SET(".$aa1[1].",s.HairLengthID ) !=",0);
					}elseif($aa1[0] == "ht") {
						$this->db->where("FIND_IN_SET(".$aa1[1].",s.HairTypeID ) !=",0);
					}elseif($aa1[0] == "hc") {
						$this->db->where("FIND_IN_SET(".$aa1[1].",s.HairColorID ) !=",0);
					}
				}
			}else{
				if($aa[0] == "ss") {
					$this->db->where("FIND_IN_SET(".$aa[1].",s.ServiceMasterID ) !=",0);
				}elseif($aa[0] == "hl") {
					$this->db->where("FIND_IN_SET(".$aa[1].",s.HairLengthID ) !=",0);
				}elseif($aa[0] == "ht") {
					$this->db->where("FIND_IN_SET(".$aa[1].",s.HairTypeID ) !=",0);
				}elseif($aa[0] == "hc") {
					$this->db->where("FIND_IN_SET(".$aa[1].",s.HairColorID ) !=",0);
				}
			}
			$services = $this->db->where("s.Status",1)->group_by("s.ServiceID")->order_by('s.ServiceID','desc')->get()->result();
		}else{
			if(isset($_POST['id']) && !empty($_POST['id'])) {
				// $services = $this->common->selectRecord("sshd_service","ServiceID,ServicePic,Title,Description,Price,HasTag,ServiceMasterID,ServiceTime,thumbnail",array("Status"=>1,'ServiceID'=>$_POST['id']),"ServiceID","desc");
				$services = $this->db->select("s.*,sl.StylistName,sl.EmailID,sl.Slug,sl.ProfilePic,sl.UserID as uid,sl.Latitude,sl.Longitude")->from('sshd_service as s')->join('sshd_stylist as sl','s.UserID = sl.UserID')->where('s.ServiceID',$_POST['id'])->where('s.Status',1)->order_by('s.ServiceID','desc')->get()->result();
			} else {
				// $services = $this->common->selectRecord("sshd_service","ServiceID,ServicePic,Title,Description,Price,HasTag,ServiceMasterID,ServiceTime,thumbnail",array("Status"=>1),"ServiceID","desc");
				$services = $this->db->select("s.*,sl.StylistName,sl.EmailID,sl.Slug,sl.ProfilePic,sl.UserID as uid,sl.Latitude,sl.Longitude")->from('sshd_service as s')->join('sshd_stylist as sl','s.UserID = sl.UserID')->where('s.Status',1)->order_by('s.ServiceID','desc')->get()->result();
			}
		}
		$this->session->set_userdata('data',array());
		$this->session->set_userdata('discoverdata',array());
		$this->session->set_userdata('ssid1',"");
		$this->session->set_userdata('ssid2',"");
		$this->session->set_userdata('ssid3',"");
		$query = $this->db->last_query();
		$service = array();
		if(!empty($services)) {
			foreach ($services as $value) {
				$data = $this->db->select('ServiceName,ServiceMasterID')->where_in('ServiceMasterID',explode(",",$value->ServiceMasterID))->get('sshd_servicemaster')->result();
				$value->services = $data;
				$service[] = $value;
			}
		}
		if($service) {
			$response['total'] = count($service);
			$response['data'] = $service;
			$response['query'] = $query;
			$response['status'] = "true";
			$response['message'] = "Service found successfully.";
		}else{
			$response['status'] = "false";
			$response['query'] = $query;
			$response['message'] = "No Service found!";
		}
		echo json_encode($response);
	}

	public function filterRecord()
	{
		$query = "";
		$this->session->set_userdata('data', array());
		if(isset($_POST['ss']) && $_POST['ss'] != "search1") {
			$this->session->set_userdata('data', $_POST);
		}elseif(isset($_POST['ssid1'])) {
			$this->session->set_userdata('ssid1', $_POST['ssid1']);
			$this->session->set_userdata('ssid2', $_POST['ssid2']);
			$this->session->set_userdata('ssid3', $_POST['ssid3']);
		}else{
			if(isset($_POST['filter_box']) && !empty($_POST['filter_box'])) {
				$aaa1 = $this->db->where('(HairColor like "%'.$_POST['filter_box'].'%")')->get('sshd_haircolor')->result();
				$aaa2 = $this->db->where('(HairFor like "%'.$_POST['filter_box'].'%")')->get('sshd_hairfor')->result();
				$aaa3 = $this->db->where('(HairLength like "%'.$_POST['filter_box'].'%")')->get('sshd_hairlength')->result();
				$aaa4 = $this->db->where('(HairProfessional like "%'.$_POST['filter_box'].'%")')->get('sshd_hairprofessional')->result();
				$aaa5 = $this->db->where('(HairType like "%'.$_POST['filter_box'].'%")')->get('sshd_hairtype')->result();
				$aaa6 = $this->db->where('(ServiceName like "%'.$_POST['filter_box'].'%")')->get('sshd_servicemaster')->result();
				$aaa7 = $this->db->select("s.*,sl.Latitude,sl.Longitude")->from('sshd_service as s')->join("sshd_stylist as sl","s.UserID = sl.UserID")->where('(s.Title like "%'.$_POST['filter_box'].'%" or sl.StylistName like "%'.$_POST['filter_box'].'%")')->group_by('s.ServiceID')->get('sshd_servicemaster')->result();
			}

			$this->db->select("s.*,sl.Latitude,sl.Longitude")->from('sshd_service as s')->join("sshd_stylist as sl","s.UserID = sl.UserID");
			if(isset($_POST['search_forprofessional']) && !empty($_POST['search_forprofessional'])) {
				$q = "";$i = 0;
				foreach ($_POST['search_forprofessional'] as $value) {
					if(!empty($q)) {
						$q .= " or ";$i = 1;
					}
					$q .= "FIND_IN_SET(".$value.",sl.HairProfessionalID)";
				}
				if($i == 0) { $this->db->where("".$q." !=",0); }else{ $this->db->where("(".$q.")"); }	
			}
			if(isset($_POST['search_fortype']) && !empty($_POST['search_fortype'])) {
				$q = "";$i = 0;
				foreach ($_POST['search_fortype'] as $value) {
					if(!empty($q)) {
						$q .= " or ";$i = 1;
					}
					$q .= "FIND_IN_SET(".$value.",s.HairForID)";
				}
				if($i == 0) { $this->db->where("".$q." !=",0); }else{ $this->db->where("(".$q.")"); }
			}
			if(isset($_POST['search_hairtype']) && !empty($_POST['search_hairtype'])) {
				$q = "";$i = 0;
				foreach ($_POST['search_hairtype'] as $value) {
					if(!empty($q)) {
						$q .= " or ";$i = 1;
					}
					$q .= "FIND_IN_SET(".$value.",s.HairTypeID)";
				}
				if($i == 0) { $this->db->where("".$q." !=",0); }else{ $this->db->where("(".$q.")"); }
			}
			if(isset($_POST['search_hairlength']) && !empty($_POST['search_hairlength'])) {
				$q = "";$i = 0;
				foreach ($_POST['search_hairlength'] as $value) {
					if(!empty($q)) {
						$q .= " or ";$i = 1;
					}
					$q .= "FIND_IN_SET(".$value.",s.HairLengthID)";
				}
				if($i == 0) { $this->db->where("".$q." !=",0); }else{ $this->db->where("(".$q.")"); }
			}
			if(isset($_POST['search_haircolor']) && !empty($_POST['search_haircolor'])) {
				$q = "";$i = 0;
				foreach ($_POST['search_haircolor'] as $value) {
					if(!empty($q)) {
						$q .= " or ";$i = 1;
					}
					$q .= "FIND_IN_SET(".$value.",s.HairColorID)";
				}
				if($i == 0) { $this->db->where("".$q." !=",0); }else{ $this->db->where("(".$q.")"); }
			}
			if(isset($_POST['search_services']) && !empty($_POST['search_services'])) {
				$q = "";$i = 0;
				foreach ($_POST['search_services'] as $value) {
					if(!empty($q)) {
						$q .= " or ";$i = 1;
					}
					$q .= "FIND_IN_SET(".$value.",s.ServiceMasterID)";
				}
				if($i == 0) { $this->db->where("".$q." !=",0); }else{ $this->db->where("(".$q.")"); }
			}
			if(isset($_POST['filter_box']) && !empty($_POST['filter_box'])) {
				if(empty($aaa1) && empty($aaa2) && empty($aaa3) && empty($aaa4) && empty($aaa5) && empty($aaa6) && empty($aaa7)) {
					$this->db->where('(s.Title like "%'.$_POST['filter_box'].'%" or sl.StylistName like "%'.$_POST['filter_box'].'%")');
				}
				$ii = 0;
				$q = "";
				if(!empty($aaa7)) {
					$ii = 1;
					$q .= 's.Title like "%'.$_POST['filter_box'].'%" or sl.StylistName like "%'.$_POST['filter_box'].'%"';
				}
				// ------------------- Hair Color --------------
				$i = 0;
				if(!empty($aaa1)) {
					foreach ($aaa1 as $value) {
						if(!empty($q)) {
							$q .= " or ";$i = 1;
						}
						$q .= "FIND_IN_SET(".$value->HairColorID.",s.HairColorID)";
					}
				}
				// ------------------- Hair For --------------
				if(!empty($aaa2)) {
					foreach ($aaa2 as $value) {
						if(!empty($q)) {
							$q .= " or ";$i = 1;
						}
						$q .= "FIND_IN_SET(".$value->HairForID.",s.HairForID)";
					}
				}
				// ------------------- Hair Length --------------
				if(!empty($aaa3)) {
					foreach ($aaa3 as $value) {
						if(!empty($q)) {
							$q .= " or ";$i = 1;
						}
						$q .= "FIND_IN_SET(".$value->HairLengthID.",s.HairLengthID)";
					}
				}
				// ------------------- Hair Professional --------------
				if(!empty($aaa4)) {
					foreach ($aaa4 as $value) {
						if(!empty($q)) {
							$q .= " or ";$i = 1;
						}
						$q .= "FIND_IN_SET(".$value->HairProfessionalID.",s.HairProfessionalID)";
					}
				}
				// ------------------- Hair Type --------------
				if(!empty($aaa5)) {
					foreach ($aaa5 as $value) {
						if(!empty($q)) {
							$q .= " or ";$i = 1;
						}
						$q .= "FIND_IN_SET(".$value->HairTypeID.",s.HairTypeID)";
					}
				}
				// ------------------- Hair Services --------------
				if(!empty($aaa6)) {
					foreach ($aaa6 as $value) {
						if(!empty($q)) {
							$q .= " or ";$i = 1;
						}
						$q .= "FIND_IN_SET(".$value->ServiceMasterID.",s.ServiceMasterID)";
					}
				}
				if(!empty($q)) {
					if($i == 0) { 
						if($ii == 1) {
							$this->db->where("(".$q.")"); 
						}else{
							$this->db->where("".$q." !=",0); 
						}
					}else{ 
						$this->db->where("(".$q.")"); 
					}
				}
				// -----------------------------------------
			}
			if(isset($_POST['filter_zc']) && !empty($_POST['filter_zc'])) {
				$this->db->where('(sl.City like "%'.$_POST['filter_zc'].'%" or sl.FullAddress like "%'.$_POST['filter_zc'].'%")');
			}
			if(isset($_POST['search_pricing']) && !empty($_POST['search_pricing'])) {
				if(count($_POST['search_pricing']) == 2) {
					if($_POST['search_pricing'][0] == 1 && $_POST['search_pricing'][1] == 2) {
						$this->db->where('(s.Price between 00 and 200)');
					}elseif($_POST['search_pricing'][0] == 2 && $_POST['search_pricing'][1] == 3) {
						$this->db->where('(s.Price > 50)');
					}elseif($_POST['search_pricing'][0] == 1 && $_POST['search_pricing'][1] == 3) {
						$this->db->where('(s.Price between  00 and 50 or s.Price > 200)');
					}
				}elseif(count($_POST['search_pricing']) == 1) {
					foreach ($_POST['search_pricing'] as $val) {
						if($val == 3) {
							$this->db->where('(s.Price > 200)');
						}elseif($val == 2) {
							$this->db->where('(s.Price between 51 and 200)');
						}elseif($val == 1) {
							$this->db->where('(s.Price between  00 and 50)');
						}
					}
				}
			}

			$services = $this->db->where("s.Status",1)->group_by("s.ServiceID")->get()->result();
			$query = $this->db->last_query();
		}

		$service = array();
		if(!empty($services)) {
			foreach ($services as $value) {
				$data = $this->db->select('ServiceName')->where_in('ServiceMasterID',explode(",", $value->ServiceMasterID))->get('sshd_servicemaster')->result();
				$value->services = $data;
				$service[] = $value;
			}
		}
		if($service) {
			$response['total'] = count($service);
			$response['data'] = $service;
			$response['query'] = $query;
			$response['status'] = "true";
			$response['message'] = "Service found successfully.";
		}else{
			$response['total'] = 1;
			$response['query'] = $query;
			$response['status'] = "false";
			$response['message'] = "No Service found!";
		}
		echo json_encode($response);
	}

}

