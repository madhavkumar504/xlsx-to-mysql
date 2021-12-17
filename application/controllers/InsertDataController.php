<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class InsertDataController extends CI_Controller {



    function uploadExcel(){
        $this->load->database();
        $inputFile = "/opt/lampp/htdocs/Dashboard/MEDICINE LIST.xlsx";
        log_message("error",$inputFile);
        $this->load->library('excel_reader');
        $this->excel_reader->read($inputFile);
        $worksheet = $this->excel_reader->sheets[0];
        $numRows = $worksheet['numRows'];
        $numCols = $worksheet['numCols'];
        log_message("error","numRows");
        log_message("error",$numRows);
        $cells = $worksheet['cells'];
        $data = array(); 
        for($i=1;$i<=$numRows;$i++)
        {					
            $data['MedicineId'] = $cells[$i][1];
            $data['medicine_name'] = $cells[$i][2];
            $data['company'] = $cells[$i][3]  ;
            $data['Threshold'] = $cells[$i][4];
            $data['mrp'] = $cells[$i][5];
            $data['procurementprice'] = $cells[$i][6];
            $data['karmaprice'] = $cells[$i][7];
            $data['Distributor'] = $cells[$i][8];
            $data['FastRetrieval'] = $cells[$i][9];
            $data['IsOTC'] = $cells[$i][10];
            $this->db->insert('csv_query',$data);
        }
    }
}


// ===========================/=
// public	function uploadExcel(){

//     $inputFile =  '/opt/lampp/htdocs/CodeIgniter-2.2.0/application/uploads'.$file_data['/opt/lampp/htdocs/Dashboard/MEDICINE LIST.xlsx'];
    

//         log_message("error",$inputFile);
//         $this->load->library('excel_reader');
//         $this->excel_reader->read($inputFile);
//         $worksheet = $this->excel_reader->sheets[0];
//         $numRows = $worksheet['numRows'];
//         $numCols = $worksheet['numCols'];
//         log_message("error","numRows");
//         log_message("error",$numRows);
//         $cells = $worksheet['cells'];
//         $data = array(); 
//         for($i=1;$i<=$numRows;$i++)
//         {					
//             $data['MedicineId'] = $cells[$i][1];
//             $data['medicine_name'] = $cells[$i][2];
//             $data['company'] = $cells[$i][3]  ;
//             $data['Threshold'] = $cells[$i][4];
//             $data['mrp'] = $cells[$i][5];
//             $data['procurementprice'] = $cells[$i][6];
//             $data['karmaprice'] = $cells[$i][7];
//             $data['Distributor'] = $cells[$i][8];
//             $data['FastRetrieval'] = $cells[$i][9];
//             $data['IsOTC'] = $cells[$i][10];
//             $this->db->insert('csv_query',$data);
//         }
//         // foreach( $data as $items ){
//         // 	echo $items;
//         // }
// }