<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Document extends My_Controller{

  public function __construct(){
    parent::__construct();
  }

  public function index($type = 1){
    $data['content'] = '';
    if($this->user == true){
      $data['type'] = $type;
      $data['content'] = 'documents';
      $data['tab'] = 'documents';
      $data['row'] = $this->dbmodel->getResultArray('tblFiles f ','f.fileID as ID,  f.title as filename, CONCAT(a.firstname," ",a.lastname) AS author', 'f.authorID  = '.$this->user->staffID.' AND f.status = '.$type, 'LEFT JOIN tblaccount a ON a.staffID = f.authorID');

    }
    $this->load->view('includes/template', $data);
  }

  public function create($fallBack = ''){
    $data = $fallBack;
    $data['content'] = 'addDocument';
    $data['tab'] = 'documents';
    $result = $this->dbmodel->getResultArray('tblaccount','staffID, CONCAT(firstname," ",middlename,". ",lastname) AS "name"');
    $data['users'] = array();
    foreach($result as $key => $value){
      array_push($data['users'], [$value['staffID'],$value['name']]);
    }

    $this->load->view('includes/template', $data);
  }

  public function save(){
    $upload_verify = TRUE;
    $data['error'] = NULL;
    $data1['order'] = $this->input->post('order', TRUE);
    $data1['autocomplete'] = $this->input->post('autocomplete', TRUE);

    if($data1['autocomplete'] == ''){
      $data['error']['select'] = 'Please select atleast one recepient.';
      $upload_verify = FALSE;
    }

    // File upload
    if($upload_verify == TRUE){
      $config['upload_path'] = './uploads/profiles/'.$this->user->username;
      $config['allowed_types'] = "pdf";
      // $config['file_name'] =

      $this->load->library('upload', $config);
      print_r($config);
      if( ! $this->upload->do_upload('file')){
        $data['error']['file'] = 'Filetype not allowed. Use PDF only.';
      }else{
        unset($data['error']);
        $data['title'] = $this->upload->data('raw_name');
        $data['size'] = $this->upload->data('file_size');
        $data['authorID'] = $this->user->staffID;

        $this->dbmodel->insertQuery('tblfiles', $data);
        header('location:'.$this->config->base_url().'document/index');
      }
    }

    // Go back to addDocument form with the former data;
    $this->create($data);
  }
}
?>
