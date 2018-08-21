<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff extends My_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index($type = 1){
        $data['content'] = '';
        if($this->user == true){
            $data['content'] = 'documents';
            $data['tab'] = 'documents';
            $data['record'] = $this->dbmodel->getResultArray('tblFiles f ','f.fileID as ID,  f.title as filename, CONCAT(a.firstname," ",a.lastname) AS author', 'f.authorID  = '.$this->user->staffID, 'LEFT JOIN tblaccount a ON a.staffID = f.authorID');
        }

        $this->load->view('includes/template', $data);

        // $type = ($type == 1 ? $type : 0);
        // $data['results'] = $this->dbmodel->getResultArray('tblfiles','fileId, title, authorID', 'status = '.$type.' AND ');
        // print_r($data['results']);
    }

    public function login(){
        $data = array();
        if($this->user!=false){
            header("Location:".$this->config->base_url());
        }else if(!empty($_POST)){
            // This must be sanitize
            // STUDY ABOUT XSS Sanitation
            $username = $this->input->post('uname', TRUE);
            $password = $this->input->post('pword', TRUE);
            if(empty($username) || empty($password)){
                $data['error'] = 'All fields are required';
            }else{
                $query = $this->dbmodel->dbQuery('SELECT staffID, username, password, status FROM tblaccount WHERE username = "'.$username.'" AND password = "'.md5('jnq'.$password).'" LIMIT 1');
                $row = $query->row();

                if($query->num_rows() == 0){
                    $data['error'] = 'Unable to login. Check username and password';
                }else if($row->status==0){
                    $data['error'] = 'This account has been disabled. Please contact administrator';
                }else{
                    $this->session->set_userdata('uid', $row->staffID);
                    $this->session->set_userdata('u',md5($row->username.'jef'));
                    $this->session->set_userdata('popupnotification', true);
                    $data['content'] = 'index';

                    $_SESSION['u'] = $row->username;

                    $dataLog['type'] = 1; //1-login; 0-logout;

                    $dataLog['userid'] = $row->staffID;
                    $dataLog['timestamp'] = date('Y-m-d H:i:s');
                    $this->dbmodel->insertQuery('tblLogAccess', $dataLog);

                    if(md5('jnq'.$row->username) == $row->password){
                        header('Location:'.$this->config->base_url().'staff/changepass');
                    }else{
                        header('Location:'.$this->config->base_url());
                    }
                }
            }
        }
        // echo md5('jnqabcd1234');
        $this->load->view('includes/template',$data);
    }

    public function logout(){
        // insert logout details
        if(!empty($_SESSION['u'])){
            $dataLog['type'] = 0; //1-login; 0-logout;
            $dataLog['userid'] = $_SESSION['uid'];
            $dataLog['timestamp'] = date('Y-m-d H:i:s');
            $this->dbmodel->insertQuery('tblLogAccess', $dataLog);
        }

        $this->session->sess_destroy();
        session_unset();
        session_destroy();
        header('Location:'.$this->config->base_url());
        exit;
    }

    public function changepass(){
        $data['content'] = 'changepassword';
        $data['tab'] = 'profile';
        $this->load->view('includes/template', $data);
    }

    public function saveNewPass(){
        $password = $this->input->post('newPass1', true);
        $this->dbmodel->updateQuery('tblaccount', ['staffID'=>$this->user->staffID], ['password' => md5('jnq'.$password)]);

        header('LOCATION:'.$this->config->base_url().'staff/profile');
    }

    public function profile(){
        $data['content'] = 'profile';
        $data['tab'] = 'profile';

        $this->load->view('includes/template', $data);
    }


    public function users($type=1, $id=0){
        $data['content'] = 'users';
        $data['tab'] = 'users';
        $data['access'] = ($this->access->accessFull == true OR $this->access->accessUsers == true ? true : false);
        $data['type'] = $type;
        $data['id'] = $id;

        $data['results'] = $this->dbmodel->getQueryResults('tblaccount','staffID as ID, concat(firstname," ",lastname) AS name', "status = ".$type);

        $this->load->view('includes/template', $data);
    }

    public function userRegister(){
        $data['options']['office'] = $this->dbmodel->getResultArray('tbloffice','*');
        $data['options']['designation'] = $this->dbmodel->getResultArray('tbldesignation','*');
        $data['usernames'] = $this->dbmodel->getSingleColumnResult('tblaccount','username');
        $data['permission'] = $this->dbmodel->getSingleColumnResult('tblaccess','access');
        $data['tab'] = 'user';
        $data['content'] = 'userRegistration';
        $data['access'] = ($this->access->accessFull == TRUE OR $this->access->accessUsers == TRUE ? true : false);

        $this->load->view('includes/template', $data);

    }

    public function userSave(){
      $data['firstname'] = $this->input->post('firstname', TRUE);
      $data['middlename'] = $this->input->post('middlename', TRUE);
      $data['lastname'] = $this->input->post('lastname', TRUE);
      $data['username'] = $this->input->post('username', TRUE);
      $data['password'] = md5('jnqEVSUCCdefault');
      $data['office'] = $this->input->post('office');
      $data['designation'] = $this->input->post('designation');
      $data['access'] = $this->input->post('accessArr');
      $data['created'] = date('Y-m-d');

      #$this->dbmodel->insertQuery('tblaccount', $data);
      header('Location:'.$this->config->base_url().'users');
    }

    public function addDocument(){
        $data['content'] = 'addDocument';
        $data['tab'] = 'document';
        $data['names'] = $this->dbmodel->getResultArray('tblaccount', 'CONCAT(firstname," ",middlename," ",lastname) AS "name"',1 ,'LEFT JOIN tbldesignation d ON desigID = designation LEFT JOIN tbloffice o ON offID = office');
        $data['id'] = $this->dbmodel->getResultArray('tblaccount','staffID as "ID"');

        $this->load->view('includes/template', $data);
    }

    public function documents($type = 1){

    }

    public function settings($type=0, $id=0, $create=0){
        $data['create'] = $create;
        $data['content'] = 'settings';
        $data['access'] = ($this->access->accessFull == TRUE OR $this->access->accessSettings == TRUE ? TRUE : FALSE);
        $data['tab'] = 'settings';
        $data['type'] = $type;
        $data['id'] = $id;
        // $table[ [tablename, col name in DB, Field name]];
        $table = [
          0 => ['tbloffice','offID','Office'],
          1 => ['tblDesignation', 'desigID','Designation']
        ];

        // For editing
        if(NULL !== $this->input->post('create')){
          $tableName = $table[$this->input->post('type')][0];
          $field['title'] = $this->input->post('field', TRUE);

          // Create variable value 0 = false, 1 = true
          // This one is for updating
          if($this->input->post('create') == 0){
            // HAHA F*** this S***
            $where[ $table[ $this->input->post('type')][1]] = $this->input->post('id', TRUE);
            $this->dbmodel->updateQuery($tableName, $where, $field);
          }

          if($this->input->post('create') == 1){
            $this->dbmodel->insertQuery($tableName, $field);
          }

          echo '<script type="text/javascript">alertNotification("Operation Succesful");</script>';
        }

        $data['field'] = $table[$type][2];
        if($id==0){
          $data['results'] = $this->dbmodel->getResultArray($table[$type][0], $table[$type][1].' AS ID, title', 1, '', 'title');
        }

        if($id > 0){
          $data['results'] = $this->dbmodel->getSingleResult($table[$type][0], $table[$type][1].' AS ID, title', $table[$type][1].' = '.$id);
        }

        $this->load->view('includes/template', $data);
   }

   public function editSetting(){
     $data['content'] = 'editSetting';
     $data['tab'] = 'settings';

     $this->load->view('includes/template', $data);
   }
}
?>
