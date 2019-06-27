<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Webserver extends REST_Controller
{
    public function index_get($val = null)
    {
        $val = trim($this->get('value'));
        
        $ascii = explode(" ", $val);

        for ($i=0; $i < count($ascii); $i++) { 
            $hasil[$i]  = chr($ascii[$i]);
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