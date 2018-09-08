<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Document extends My_Controller{

  public function __construct(){
    parent::__construct();
  }

  public function index($type = 1){
    $data['type'] = $type;
    $data['content'] = 'documents';
    $data['tab'] = 'documents';
    $data['row'] = $this->dbmodel->getResultArray('tblFiles f ','f.fileID as ID,  f.title as filename, CONCAT(a.firstname," ",a.lastname) AS author', 'f.authorID  = '.$this->user->staffID.' AND f.status = '.$type, 'LEFT JOIN tblaccount a ON a.staffID = f.authorID');

    $this->load->view('includes/template', $data);
  }
}
?>
