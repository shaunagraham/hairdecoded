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
class Services extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}
	public function getServices($page = 0)
	{
		$user = $this->session->get_userdata('user');
		if(isset($_POST['uid']) && !empty($_POST['uid'])) {
			$user_id = $_POST['uid'];
		}else{
			$user_id = $user['user']['id'];
		}
		if(isset($_POST['id']) && !empty($_POST['id'])) {
			$service = $this->common->selectRecord("sshd_service","",array("UserID"=>$user_id,"ServiceID"=>$_POST['id'],"Status"=>1));
		}else{
			if($page == 0) {
				$service = $this->common->selectRecord("sshd_service","ServiceID,ServicePic,Title,Description,Price,HasTag",array("UserID"=>$user_id,"Status"=>1),"ServiceID","desc",4);
			}else{
				$service = $this->common->selectRecord("sshd_service","ServiceID,ServicePic,Title,Description,Price,HasTag",array("UserID"=>$user_id,"Status"=>1),"ServiceID","desc",4,($page * 4));
			}
		}
		
		if($service) {
			$serviceTotal = $this->common->selectRecord("sshd_service","count(ServiceID) as total",array("UserID"=>$user_id,"Status"=>1));
			$response['total'] = $serviceTotal[0]->total;
			$response['data'] = $service;
			$response['status'] = "true";
			$response['message'] = "Service found successfully.";
		}else{
			$response['status'] = "false";
			$response['message'] = "No Service found!";
		}
		echo json_encode($response);
	}

	public function addServices()
	{
		$user = $this->session->get_userdata('user');
		$user_id = $user['user']['id'];
		$data['UserID'] = $user_id;
		$data['CreatedBy'] = $user_id;
		if( (isset($_POST['title']) && isset($_POST['photo'])) && (!empty($_POST['title']) && !empty($_POST['photo'])) ) {
			$imgpath = "";
			$data11 = $_POST['photo'];
			$allowed = array('png', 'jpg', 'gif', 'jpeg');

			$image_array_1 = explode(";", $data11);
			$extension = explode("/", $image_array_1[0]);

			$image_array_2 = explode(",", $image_array_1[1]);

			$data11 = base64_decode($image_array_2[1]);
            // $extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
			$imagename = md5("hairdecoded") . time() . rand(10, 100) . "." . $extension[1];

			if (!in_array(strtolower($extension[1]), $allowed)) {
				$response['status'] = "false";
				$response['message'] = "Image photo was not supported.";
				echo json_encode($response);
				die;
			} else{
				if (file_put_contents("images/".$imagename, $data11)) {
					// if(move_uploaded_file($_FILES['photo']['tmp_name'], 'images/services/'.$imagename)) {
					$imgpath = 'images/'.$imagename;
					$add = $imgpath;
					$tsrc = "";
					$n_width=$n_height= 330;

					if($extension[1]=="jpeg"){
						$tsrc="images/services/thumbnail/".$imagename;
						$im=ImageCreateFromJPEG($add); 
						$width=ImageSx($im);
						$height=ImageSy($im);
						// $n_height=($n_width/$width) * $height; 
						$newimage=imagecreatetruecolor($n_width,$n_height);                 
						imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
						ImageJpeg($newimage,$tsrc);
						chmod("$tsrc",0777);
					}
					elseif($extension[1]=="jpg"){
						$tsrc="images/services/thumbnail/".$imagename;
						$im=ImageCreateFromJPG($add); 
						$width=ImageSx($im);
						$height=ImageSy($im);
						// $n_height=($n_width/$width) * $height; 
						$newimage=imagecreatetruecolor($n_width,$n_height);                 
						imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
						ImageJpg($newimage,$tsrc);
						chmod("$tsrc",0777);
					}elseif($extension[1]=="png"){
						$tsrc="images/services/thumbnail/".$imagename;
						$im=ImageCreateFromPNG($add); 
						$width=ImageSx($im);
						$height=ImageSy($im);
						// $n_height=($n_width/$width) * $height; 
						$newimage=imagecreatetruecolor($n_width,$n_height); 
						imagealphablending($newimage, false);
						imagecopyresampled($newimage, $im, 0, 0, 0, 0,$n_width,$n_height,$width,$height);
						imagesavealpha($newimage, true);
						ImagePng($newimage,$tsrc);
						chmod("$tsrc",0777);
					}elseif($extension[1]=="gif"){
						$tsrc="images/services/thumbnail/".$imagename;
						$im=ImageCreateFromGIF($add); 
						$width=ImageSx($im);
						$height=ImageSy($im);
						// $n_height=($n_width/$width) * $height; 
						$newimage=imagecreatetruecolor($n_width,$n_height);                 
						imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
						ImageGif($newimage,$tsrc);
						chmod("$tsrc",0777);
					}
				}else{
					$response['status'] = "false";
					$response['message'] = "Failed to upload photo. Please try again later.";
					echo json_encode($response);die;
				}
			}
			$data['ServicePic'] = $imgpath;
			$data['Title'] = $_POST['title'];
			$data['Description'] = $_POST['description'];
			$data['HasTag'] = $_POST['tags'];
			$data['Price'] = $_POST['price'];
			$data['ServiceTime'] = $_POST['time'];
			if(!empty($tsrc)) {
				$data['thumbnail'] = $tsrc;
			}
			if(isset($_POST['fortype']) && !empty($_POST['fortype'])) {
				$data['HairForID'] = implode(",", $_POST['fortype']);
				// $data['HairForID'] = json_encode($_POST['fortype']);
			}
			if(isset($_POST['hairlength']) && !empty($_POST['hairlength'])) {
				$data['HairLengthID'] = implode(",", $_POST['hairlength']);
				// $data['HairLengthID'] = json_encode($_POST['hairlength']);
			}
			if(isset($_POST['hairtype']) && !empty($_POST['hairtype'])) {
				$data['HairTypeID'] = implode(",", $_POST['hairtype']);
				// $data['HairTypeID'] = json_encode($_POST['hairtype']);
			}
			if(isset($_POST['haircolor']) && !empty($_POST['haircolor'])) {
				$data['HairColorID'] = implode(",", $_POST['haircolor']);
				// $data['HairColorID'] = json_encode($_POST['haircolor']);
			}
			if(isset($_POST['services']) && !empty($_POST['services'])) {
				$data['ServiceMasterID'] = implode(",", $_POST['services']);
				// $data['ServiceMasterID'] = json_encode($_POST['services']);
			}

			if($this->common->insertRecord('sshd_service',$data)) {
				$response['status'] = "true";
				$response['message'] = "Service Added successfully.";
			}else{
				$response['status'] = "false";
				$response['message'] = "Something went wrong. Please after sometine.";
			}
		}else{
			$response['status'] = "false";
			$response['message'] = "Please fill Images,Title field.";
		}
		echo json_encode($response);
	}

	public function editServices()
	{
		$user = $this->session->get_userdata('user');
		$user_id = $user['user']['id'];
		$data['UserID'] = $user_id;
		$data['CreatedBy'] = $user_id;
		$imgpath = "";
		if( isset($_POST['title']) && !empty($_POST['title']) ) {
			if(  isset($_POST['photo']) && !empty($_POST['photo']) ) {
				$data11 = $_POST['photo'];
				$allowed = array('png', 'jpg', 'gif', 'jpeg');

				$image_array_1 = explode(";", $data11);
				$extension = explode("/", $image_array_1[0]);

				$image_array_2 = explode(",", $image_array_1[1]);

				$data11 = base64_decode($image_array_2[1]);
            	// $extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
				$imagename = md5("hairdecoded") . time() . rand(10, 100) . "." . $extension[1];

				if (!in_array(strtolower($extension[1]), $allowed)) {
					$response['status'] = "false";
					$response['message'] = "Image photo was not supported.";
					echo json_encode($response);
					die;
				} else{
					if (file_put_contents("images/services/".$imagename, $data11)) {
						// if(move_uploaded_file($_FILES['photo']['tmp_name'], 'images/services/'.$imagename)) {
						$imgpath = 'images/services/'.$imagename;
						$add = $imgpath;
						$tsrc = "";
						$n_width=$n_height= 330;
						if($extension[1]=="jpeg"){
							$tsrc="images/services/thumbnail/".$imagename;
							$im=ImageCreateFromJPEG($add); 
							$width=ImageSx($im);
							$height=ImageSy($im);
							// $n_height=($n_width/$width) * $height; 
							$newimage=imagecreatetruecolor($n_width,$n_height);                 
							imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
							ImageJpeg($newimage,$tsrc);
							chmod("$tsrc",0777);
						}
						elseif($extension[1]=="jpg"){
							$tsrc="images/services/thumbnail/".$imagename;
							$im=ImageCreateFromJPG($add); 
							$width=ImageSx($im);
							$height=ImageSy($im);
							// $n_height=($n_width/$width) * $height; 
							$newimage=imagecreatetruecolor($n_width,$n_height);                 
							imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
							ImageJpg($newimage,$tsrc);
							chmod("$tsrc",0777);
						}elseif($extension[1]=="png"){
							$tsrc="images/services/thumbnail/".$imagename;
							$im=ImageCreateFromPNG($add); 
							$width=ImageSx($im);
							$height=ImageSy($im);
							// $n_height=($n_width/$width) * $height; 
							$newimage=imagecreatetruecolor($n_width,$n_height); 
							imagealphablending($newimage, false);
							imagecopyresampled($newimage, $im, 0, 0, 0, 0,$n_width,$n_height,$width,$height);
							imagesavealpha($newimage, true);
							ImagePng($newimage,$tsrc);
							chmod("$tsrc",0777);
						}elseif($extension[1]=="gif"){
							$tsrc="images/services/thumbnail/".$imagename;
							$im=ImageCreateFromGIF($add); 
							$width=ImageSx($im);
							$height=ImageSy($im);
							// $n_height=($n_width/$width) * $height; 
							$newimage=imagecreatetruecolor($n_width,$n_height);                 
							imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
							ImageGif($newimage,$tsrc);
							chmod("$tsrc",0777);
						}
					}else{
						$response['status'] = "false";
						$response['message'] = "Failed to upload photo. Please try again later.";
						echo json_encode($response);die;
					}
				}
			}
			if(!empty($imgpath)) {
				$data['ServicePic'] = $imgpath;
			}
			$data['Title'] = $_POST['title'];
			$data['Description'] = $_POST['description'];
			$data['HasTag'] = $_POST['tags'];
			$data['Price'] = $_POST['price'];
			$data['ServiceTime'] = $_POST['time'];
			if(!empty($tsrc)) {
				$data['thumbnail'] = $tsrc;
			}
			if(isset($_POST['fortype']) && !empty($_POST['fortype'])) {
				$data['HairForID'] = implode(",", $_POST['fortype']);
				// $data['HairForID'] = json_encode($_POST['fortype']);
			}else{
				$data['HairForID'] = "";
			}
			if(isset($_POST['hairlength']) && !empty($_POST['hairlength'])) {
				$data['HairLengthID'] = implode(",", $_POST['hairlength']);
				// $data['HairLengthID'] = json_encode($_POST['hairlength']);
			}else{
				$data['HairLengthID'] = "";
			}
			if(isset($_POST['hairtype']) && !empty($_POST['hairtype'])) {
				$data['HairTypeID'] = implode(",", $_POST['hairtype']);
				// $data['HairTypeID'] = json_encode($_POST['hairtype']);
			}else{
				$data['HairTypeID'] = "";
			}
			if(isset($_POST['haircolor']) && !empty($_POST['haircolor'])) {
				$data['HairColorID'] = implode(",", $_POST['haircolor']);
				// $data['HairColorID'] = json_encode($_POST['haircolor']);
			}else{
				$data['HairColorID'] = "";
			}
			if(isset($_POST['services']) && !empty($_POST['services'])) {
				$data['ServiceMasterID'] = implode(",", $_POST['services']);
				// $data['ServiceMasterID'] = json_encode($_POST['services']);
			}else{
				$data['ServiceMasterID'] = "";
			}

			if($this->common->updateRecord('sshd_service',$data,array('ServiceID'=>$_POST['id']))) {
				$response['qq'] = $this->db->last_query();
				$response['status'] = "true";
				$response['message'] = "Service Edited successfully.";
			}else{
				$response['status'] = "false";
				$response['message'] = "Something went wrong. Please after sometine.";
			}
		}else{
			$response['status'] = "false";
			$response['message'] = "Please fill Title field.";
		}
		echo json_encode($response);
	}

	public function deleteService($ServiceID) {
		$gcheck = $this->common->selectRecord("sshd_service","",array('ServiceID' => $ServiceID));
		if(!empty($gcheck)) {
			$delete = $gcheck[0]->ServicePic;
		}
		if ($this->common->deleteRecord('sshd_service',array('ServiceID'=>$ServiceID))) {
			if(!empty($delete))
				unlink($delete);
			$response['status'] = "true";
			$response['message'] = "Service deleted successfully.";
		} else {
			$response['status'] = "false";
			$response['message'] = "Something went wrong. Please after sometine.";
		}
		echo json_encode($response);
	}

}
