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
    $data['sign_order'] = $this->input->post('order', TRUE);
    $signatories = explode(',', $this->input->post('signatories', TRUE));

    if($signatories == '' OR $signatories == NULL){
      $data['error']['select'] = 'Please select atleast one recepient.';
      $upload_verify = FALSE;
    }

    // File upload
    if($upload_verify == TRUE){
      $config['upload_path'] = './uploads/profiles/'.$this->user->username;
      $config['allowed_types'] = "pdf";
      // $config['file_name'] =

      $this->load->library('upload', $config);
      if( ! $this->upload->do_upload('file')){
        $data['error']['file'] = 'Filetype not allowed. Use PDF only.';
      }else{
        unset($data['error']);
        $data['title'] = $this->upload->data('raw_name');
        $data['size'] = $this->upload->data('file_size');
        $data['authorID'] = $this->user->staffID;

        $fileID = $this->dbmodel->insertQuery('tblfiles', $data);

        $data1['fileID'] = 1;
        // $data1['fileID'] = $fileID;
        foreach($signatories AS $key => $val){
          $data1['signatory'] = $val;
          $this->dbmodel->insertQuery('tblsignatory', $data1);
        }

        header('location:'.$this->config->base_url().'document/index');
      }
    }

    // Go back to addDocument form with the former data;
    $this->create($data);
  }

  public function sign($type = 0){
    $data['tab'] = 'sign';
    $data['content'] = 'tobeSigned';
    $data['type'] = $type;
    $data['row'] = $this->dbmodel->getResultArray('tblsignatory s', 's.sigID AS "ID", s.signatureStatus, f.title AS "filename"', 's.signatory = '.$this->user->staffID.' AND s.signatureStatus = '.$type, 'LEFT JOIN tblfiles f ON s.fileID = f.fileID', 'f.created ASC');
    $this->load->view('includes/template', $data);
  }

  public function applySignature($id = 0){
    $data['tab'] = 'sign';
    $data['content'] = 'applySignature';
    $data['signatoryInfo'] = $this->dbmodel->getSingleResult('tblsignatory s', 's.sigID, f.title, a.username','sigID = '.$id, 'LEFT JOIN tblfiles f ON s.fileID = f.fileID LEFT JOIN tblaccount a ON f.authorID = a.staffID');

    $this->load->view('includes/template', $data);
  }
}
?>
