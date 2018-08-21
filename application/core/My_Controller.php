<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_Controller extends CI_Controller{
    public function __construct(){
        parent::__construct();

        $this->load->helper('form');
        $this->load->library('session');

        // Load Models
         $this->load->model('Databasemodel','dbmodel');
         $this->load->model('Textmodel','textM');

        $this->db = $this->load->database('default', TRUE);


        $this->user = $this->getLoggedUser();
        $this->access = $this->getUserAccess();
        $this->load->driver('cache', ['adapter' => 'file']);

    }

    public function getLoggedUser(){
        $uName = '';
        if(isset($_SESSION['u'])) $uName = $_SESSION['u'];

        if(!empty($uName)){
            $query = $this->dbmodel->dbQuery('SELECT s.*, CONCAT(firstname," ",lastname) AS name, o.title as office , d.title AS designation FROM tblaccount s LEFT JOIN tbloffice o ON o.offID = s.office LEFT JOIN tbldesignation d ON d.desigID = s.designation WHERE s.username = "'.$uName.'" ');
            $row = $query->row();

            if(count($row)>0)
                return $row;
            else
                return false;

        }else{
            return false;
        }
    }

    public function getUserAccess(){
        $access = new stdClass;
        $access->accessFull = false;
        $access->accessUsers = false;
        $access->accessOrganization = false;
        $access->accessDocument = false;
        $access->accessSettings = false;

        if($this->user != false){
            $access->myAccess = explode(',',$this->user->access);
            if(in_array('full', $access->myAccess)) $access->accessFull = true;
            if(in_array('users', $access->myAccess)) $access->accessUsers = true;
            if(in_array('organization', $access->myAccess)) $access->accessOrganization = true;
            if(in_array('document', $access->myAccess)) $access->accessDocument = true;
            if(in_array('settings',  $access->myAccess)) $access->accessSettings = true;
        }
        return $access;
    }
}
?>
