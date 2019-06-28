<?php
// Source Code by : I Gede Widhi Pratama
// email : widhipratama52@gmail.com
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Webserver extends REST_Controller
{
    public function index_get($val = null)
    {
        $val = str_replace(' ', '', $this->get('value'));

        $awal = 0;
        for ($i=0; $i < (strlen($val)/3); $i++) { 
            $hasil[$i]  = chr(substr($val, $awal, 3));
            $awal = $awal + 3;
        }

        $output = implode($hasil);

        if ($val === null){
            $this->response([
                'status'    => false,
                'data'      => 'No value....'
            ], REST_Controller::HTTP_NOT_FOUND);
        } else {
            $this->response([
                'status'    => true,
                'data'      => $output
            ], REST_Controller::HTTP_OK);
        }
    }
}

?>