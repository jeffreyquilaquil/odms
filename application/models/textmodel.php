<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Textmodel extends CI_Model{

    function __construct(){
        // Call the Model constructor
        parent::__construct();
    }

    public function renderTable($headers, $col_options, $data_query, $buttons = ['']){
        $btn_list = [
            // button name => [color, icon];
            'edit' => ['warning', 'edit', 'Modify'],
            'delete' => ['danger', 'trash', 'Delete'],
            'disable' => ['danger', 'ban', 'Disable'],
            'enable' => ['info', 'ban', 'Enable'],
            'view' => ['primary', 'eye', 'View'],
        ];

        $table = '<table class="table table-bordered datatable1" width="100%" cellspacing="0">';
        // thead
        $table .= '<thead><tr>';
            foreach($headers as $val){
                $table .= '<td class="header-'.$val.'">'.ucwords($val).'</td>';
            }
        $table .= '</tr></thead>';
        // tbody
        $table .= '<tbody>';

        $action = (in_array('action', $headers) ? true : false);
        if( isset($data_query) AND !empty($data_query)){
            unset($data_query['headers']);
            foreach($data_query as $val){
                if( is_object($val)) $id = $val->ID;
                if( is_array($val)) $id = $val['ID'];
                $table .= '<tr class="row-'.$id.'">';
                    foreach($headers as $key => $val_){
                        if($action == true AND $val_ == 'action'){
                            $table .= '<td>';
                            foreach($buttons as $btn){
                                $table .= '<button class=" btn btn-'.$btn_list[$btn][0].' '.$btn_list[$btn][1].'" data-row="'.$id.'" style="margin-right:3px;">
                                    <i class="fa fa-'.$btn_list[$btn][1].'"></i>
                                    </button>';
                            }

                            $table .='</td>';
                        }else{
                            if( is_object($val))
                                $table .= '<td>'.$val->$val_.'</td>';

                            if( is_array($val))
                                $table .= '<td>'.$val[$val_].'</td>';
                        }
                    }
                $table .= '</tr>';
            }            
        }else{
            $table .= '<tr><td colspan="30" style="text-align:center">No data available</td></tr>';
        }
        $table .= '</tbody>';

        $table .= '</table>';
        echo $table;
    }

    public function autoComplete(array $id, array $value){
        // Fetch the keys of the array
        $index = array_keys($value[0]);

        $t = '<input type="text" class="form-control autoSelect">';
        $t .= '<div class="hidden autoselectDiv">';
        foreach($id AS $key => $val){
            var_dump($value[$key]);
            #$t .= '<span class="autoSelectSpan" data-id="'.$val.'">'.$value[$val][ $index[0]].'</span>';
        }
        $t .= '</span>';
        return $t;
    }
}

?>
