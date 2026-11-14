<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Delivery_charge extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('user_id') && $this->session->userdata('user_type_id') != 1) {
            redirect(base_url());
        }
//        $this->load->model('user_model');
    }

    public function index() {
        $this->load->library('form_validation');
        $data = array();
        $data['menu'] = 'web';
        $user_id = $this->session->userdata('user_id');

        $data['result'] = $this->db
                ->select('*')
                ->where('id',2)
                ->get('delivery_charge')
                ->row();
        $data['area']=json_decode($data['result']->area);
        $data['delivery_name']=json_decode($data['result']->delivery_name);
        $data['timing']=json_decode($data['result']->timing);
        $data['bdt_kg']=(array)json_decode($data['result']->bdt_kg);
        $data['additional']=json_decode($data['result']->additional_perkg);
//        echo '<pre>';
//        print_r($data['area']);
//        print_r($data['delivery_name']);
////        print_r($data['timing']);
//        print_r($data['bdt_kg']);
//        print_r($data['additional']);
////        print_r($data);
//        echo '</pre>';
//        exit();

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/deliver-charge/delivery-charge-view', $data);
    }
    
    public function update_delivery_charge(){
        $t24_hours_000=$this->input->post('24_hours_000');
        $t24_hours_001=$this->input->post('24_hours_001');
        $t24_hours_002=$this->input->post('24_hours_002');
        $t24_hours_003=$this->input->post('24_hours_003');
        
        $t24_hours_100=$this->input->post('24_hours_100');
        $t24_hours_101=$this->input->post('24_hours_101');
        $t24_hours_102=$this->input->post('24_hours_102');
        $t24_hours_103=$this->input->post('24_hours_103');
        
        $t24_hours_200=$this->input->post('24_hours_200');
        $t24_hours_201=$this->input->post('24_hours_201');
        $t24_hours_202=$this->input->post('24_hours_202');
        $t24_hours_203=$this->input->post('24_hours_203');
        
        $t48_hours_000=$this->input->post('48_hours_000');
        $t48_hours_001=$this->input->post('48_hours_001');
        $t48_hours_002=$this->input->post('48_hours_002');
        $t48_hours_003=$this->input->post('48_hours_003');
        
        $t48_hours_100=$this->input->post('48_hours_100');
        $t48_hours_101=$this->input->post('48_hours_101');
        $t48_hours_102=$this->input->post('48_hours_102');
        $t48_hours_103=$this->input->post('48_hours_103');
        
        $t48_hours_200=$this->input->post('48_hours_200');
        $t48_hours_201=$this->input->post('48_hours_201');
        $t48_hours_202=$this->input->post('48_hours_202');
        $t48_hours_203=$this->input->post('48_hours_203');
        
        $t8_hours_000=$this->input->post('8_hours_000');
        $t8_hours_001=$this->input->post('8_hours_001');
        $t8_hours_002=$this->input->post('8_hours_002');
        $t8_hours_003=$this->input->post('8_hours_003');
        
        $t8_hours_100=$this->input->post('8_hours_100');
        $t8_hours_101=$this->input->post('8_hours_101');
        $t8_hours_102=$this->input->post('8_hours_102');
        $t8_hours_103=$this->input->post('8_hours_103');
        
        $t8_hours_200=$this->input->post('8_hours_200');
        $t8_hours_201=$this->input->post('8_hours_201');
        $t8_hours_202=$this->input->post('8_hours_202');
        $t8_hours_203=$this->input->post('8_hours_203');
        
        $delivery_name0=$this->input->post('delivery_name0');
        $delivery_name1=$this->input->post('delivery_name1');
        $delivery_name2=$this->input->post('delivery_name2');
        
        $timing0=$this->input->post('timing0');
        $timing1=$this->input->post('timing1');
        $timing2=$this->input->post('timing2');
        
        $additional_00=$this->input->post('additional_00');
        $additional_01=$this->input->post('additional_01');
        
        $additional_10=$this->input->post('additional_10');
        $additional_11=$this->input->post('additional_11');
        
        $additional_20=$this->input->post('additional_20');
        $additional_21=$this->input->post('additional_21');
        
        $area0=$this->input->post('area0');
//        echo '<pre>';
//        print_r($_POST);
//        echo '</pre>';
        
         $data = array();
        
        $area=array(
            0=>$area0
        );
        $delivery_name=array(
            0=>$delivery_name0,
            1=>$delivery_name1,
            2=>$delivery_name2
        );
        $timing=array(
            0=>$timing0,
            1=>$timing1,
            2=>$timing2,
        );
        $bdt_kg=array(
                '24_hours'=>array(
                    0=>array(
                        0=>array(
                            0=>$t24_hours_000,
                            1=>$t24_hours_001,
                            2=>$t24_hours_002,
                            3=>$t24_hours_003,
                        ),
                    ),
                    1=>array(
                        0=>array(
                            0=>$t24_hours_100,
                            1=>$t24_hours_101,
                            2=>$t24_hours_102,
                            3=>$t24_hours_103,
                        ),
                    ),
                    2=>array(
                        0=>array(
                            0=>$t24_hours_200,
                            1=>$t24_hours_201,
                            2=>$t24_hours_202,
                            3=>$t24_hours_203,
                        ),
                    )
                    
                ),
                '48_hours'=>array(
                    0=>array(
                        0=>array(
                            0=>$t48_hours_000,
                            1=>$t48_hours_001,
                            2=>$t48_hours_002,
                            3=>$t48_hours_003,
                        ),
                    ),
                    1=>array(
                        0=>array(
                            0=>$t48_hours_100,
                            1=>$t48_hours_101,
                            2=>$t48_hours_102,
                            3=>$t48_hours_103,
                        ),
                    ),
                    2=>array(
                        0=>array(
                            0=>$t48_hours_200,
                            1=>$t48_hours_201,
                            2=>$t48_hours_202,
                            3=>$t48_hours_203,
                        ),
                    )
                    
                ),
                '8_hours'=>array(
                    0=>array(
                        0=>array(
                            0=>$t8_hours_000,
                            1=>$t8_hours_001,
                            2=>$t8_hours_002,
                            3=>$t8_hours_003,
                        ),
                    ),
                    1=>array(
                        0=>array(
                            0=>$t8_hours_100,
                            1=>$t8_hours_101,
                            2=>$t8_hours_102,
                            3=>$t8_hours_103,
                        ),
                    ),
                    2=>array(
                        0=>array(
                            0=>$t8_hours_200,
                            1=>$t8_hours_201,
                            2=>$t8_hours_202,
                            3=>$t8_hours_203,
                        ),
                    )
                    )
                     
        );
        $additional=array(
            0=>array(
                0=>$additional_00,
                1=>$additional_01
            ),
            1=>array(
                0=>$additional_10,
                1=>$additional_11
            ),
            2=>array(
                0=>$additional_20,
                1=>$additional_21
            ),
        );
        
        
        $full_array=array(
            'area'=>json_encode($area),
            'delivery_name'=>json_encode($delivery_name),
            'timing'=>json_encode($timing),
            'bdt_kg'=>json_encode($bdt_kg),
            'additional_perkg'=>json_encode($additional),
            'updated_at'=>date('Y-m-d H:i:s'),
        );
        
        $response=$this->db
                ->where('id',2)
                ->update('delivery_charge',$full_array);
        
        if ($response == 1) {
            $sess['success'] = 'Success!';
            $this->session->set_userdata($sess);
            redirect('admin/delivery_charge');
        }
        
//        echo '<pre>';
//        print_r($full_array);
//        echo '</pre>';
    }
    
        public function regular_price() {
        $this->load->library('form_validation');
        $data = array();
        $data['menu'] = 'web';
        $user_id = $this->session->userdata('user_id');

        $data['result'] = $this->db
                ->select('*')
                ->where('id',2)
                ->get('regular_price')
                ->row();
        $data['area']=json_decode($data['result']->area);
        $data['delivery_name']=json_decode($data['result']->delivery_name);
        $data['timing']=json_decode($data['result']->timing);
        $data['bdt_kg']=(array)json_decode($data['result']->bdt_kg);
        $data['additional']=json_decode($data['result']->additional_perkg);
//        echo '<pre>';
//        print_r($data['area']);
//        print_r($data['delivery_name']);
//        print_r($data['timing']);
//        print_r($data['bdt_kg']);
//        print_r($data['additional']);
////        print_r($data);
//        echo '</pre>';
//        exit();

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/deliver-charge/regular-price-list', $data);
    }
    public function update_regular_price(){
        
        $area0=$this->input->post('area0');
        $area1=$this->input->post('area1');
        
        $delivery_name0=$this->input->post('delivery_name0');
        $delivery_name1=$this->input->post('delivery_name1');
        $delivery_name2=$this->input->post('delivery_name2');
        $delivery_name3=$this->input->post('delivery_name3');
        
        $timing0=$this->input->post('timing0');
        $timing1=$this->input->post('timing1');
        $timing2=$this->input->post('timing2');
        $timing3=$this->input->post('timing3');
        $timing4=$this->input->post('timing4');
        
        $bdt_kg0=$this->input->post('bdt_kg0');
        $bdt_kg1=$this->input->post('bdt_kg1');
        $bdt_kg2=$this->input->post('bdt_kg2');
        $bdt_kg3=$this->input->post('bdt_kg3');
        $bdt_kg4=$this->input->post('bdt_kg4');

        
        
        
        $additional_00=$this->input->post('additional_00');
        $additional_01=$this->input->post('additional_01');
        
        $additional_10=$this->input->post('additional_10');
        $additional_11=$this->input->post('additional_11');
        
        $additional_20=$this->input->post('additional_20');
        $additional_21=$this->input->post('additional_21');
        
        $additional_30=$this->input->post('additional_30');
        $additional_31=$this->input->post('additional_31');
        
        $additional_40=$this->input->post('additional_40');
        $additional_41=$this->input->post('additional_41');
        

//        echo '<pre>';
//        print_r($_POST);
//        echo '</pre>';
        
         $data = array();
        
        $area=array(
            0=>$area0,
            1=>$area1,
        );
        $delivery_name=array(
            0=>$delivery_name0,
            1=>$delivery_name1,
            2=>$delivery_name2,
            3=>$delivery_name3
        );
        $timing=array(
            0=>$timing0,
            1=>$timing1,
            2=>$timing2,
            3=>$timing3,
            4=>$timing4,
        );
        $bdt_kg=array(
            0=>$bdt_kg0,
            1=>$bdt_kg1,
            2=>$bdt_kg2,
            3=>$bdt_kg3,
            4=>$bdt_kg4,
        );
        
        $additional=array(
            0=>array(
                0=>$additional_00,
                1=>$additional_01
            ),
            1=>array(
                0=>$additional_10,
                1=>$additional_11
            ),
            2=>array(
                0=>$additional_20,
                1=>$additional_21
            ),
            3=>array(
                0=>$additional_30,
                1=>$additional_31
            ),
            4=>array(
                0=>$additional_40,
                1=>$additional_41
            ),
        );
        
        
        $full_array=array(
            'area'=>json_encode($area),
            'delivery_name'=>json_encode($delivery_name),
            'timing'=>json_encode($timing),
            'bdt_kg'=>json_encode($bdt_kg),
            'additional_perkg'=>json_encode($additional),
            'updated_at'=>date('Y-m-d H:i:s'),
        );
        
        $response=$this->db
                ->where('id',2)
                ->update('regular_price',$full_array);
        
        if ($response == 1) {
            $sess['success'] = 'Success!';
            $this->session->set_userdata($sess);
            redirect('admin/delivery_charge/regular_price');
        }
        
//        echo '<pre>';
//        print_r($full_array);
//        echo '</pre>';
    }

   

    public function delivery_save() {
        $data = array();
        
        $area=array(
            0=>'INSIDE DHAKA'
        );
        $delivery_name=array(
            0=>'NEXT DAY',
            1=>'DAY AFTER TOMORROW',
            2=>'SAME DAY',
        );
        $timing=array(
            0=>'24 HOURS',
            1=>'48 HOURS',
            2=>'8 HOURS',
        );
        $bdt_kg=array(
                '24_hours'=>array(
                    0=>array(
                        0=>array(
                            0=>'70 TK',
                            1=>'30*25*20 cm',
                            2=>'40*40*20 CM',
                            3=>'100',
                        ),
                    ),
                    1=>array(
                        0=>array(
                            0=>'80 TK',
                            1=>'60*40*30 cm',
                            2=>'60*40*40 cm',
                            3=>'150',
                        ),
                    ),
                    2=>array(
                        0=>array(
                            0=>'100 TK',
                            1=>'90*60*40 cm',
                            2=>'100*60*40 cm',
                            3=>'200',
                        ),
                    )
                    
                ),
                '48_hours'=>array(
                    0=>array(
                        0=>array(
                            0=>'50 TK',
                            1=>'30*25*20 cm',
                            2=>'40*40*20 CM',
                            3=>'85',
                        ),
                    ),
                    1=>array(
                        0=>array(
                            0=>'60 TK',
                            1=>'60*40*30 cm',
                            2=>'60*40*40 cm',
                            3=>'100',
                        ),
                    ),
                    2=>array(
                        0=>array(
                            0=>'80 TK',
                            1=>'90*60*40 cm',
                            2=>'100*60*40 cm',
                            3=>'80',
                        ),
                    )
                    
                ),
                '8_hours'=>array(
                    0=>array(
                        0=>array(
                            0=>'100 TK',
                            1=>'30*25*20 cm',
                            2=>'40*40*20 CM',
                            3=>'150',
                        ),
                    ),
                    1=>array(
                        0=>array(
                            0=>'120 TK',
                            1=>'60*40*30 cm',
                            2=>'60*40*40 cm',
                            3=>'200',
                        ),
                    ),
                    2=>array(
                        0=>array(
                            0=>'150 TK',
                            1=>'90*60*40 cm',
                            2=>'100*60*40 cm',
                            3=>'250',
                        ),
                    )
                    
                )
                     
        );
        $additional=array(
            0=>array(
                0=>'Inside Dhaka',
                1=>'25'
            ),
            1=>array(
                0=>'Inside Dhaka',
                1=>'15'
            ),
            2=>array(
                0=>'Inside Dhaka',
                1=>'50'
            ),
        );
        
        
        $full_array=array(
            'area'=>json_encode($area),
            'delivery_name'=>json_encode($delivery_name),
            'timing'=>json_encode($timing),
            'bdt_kg'=>json_encode($bdt_kg),
            'additional_perkg'=>json_encode($additional),
            'created_at'=>date('Y-m-d H:i:s'),
        );
        
        $this->db->insert('delivery_charge',$full_array);
        echo '<pre>';
        print_r($full_array);
        echo '</pre>';
        
//        echo json_encode($full_array);

        
    }
    public function regular_price_save() {
        $data = array();
        
        $area=array(
            0=>'Inside Dhaka',
            1=>'Outside Dhaka'
        );
        $delivery_name=array(
            0=>'NEXT DAY',
            1=>'NEXT DAY',
            2=>'SAME DAY',
            3=>'Express',
        );
        $timing=array(
            0=>'48 HOURS',
            1=>'24 HOURS',
            2=>'8 HOURS',
            3=>'4 HOURS',
            4=>'36-48 HOURS',
        );
        $bdt_kg=array(
            0=>'45',
            1=>'60',
            2=>'80',
            3=>'130',
            4=>'130',
        );
        
        $additional=array(
            0=>array(
                0=>'Inside Dhaka',
                1=>'15'
            ),
            1=>array(
                0=>'Inside Dhaka',
                1=>'15'
            ),
            2=>array(
                0=>'Inside Dhaka',
                1=>'25'
            ),
            3=>array(
                0=>'Inside Dhaka',
                1=>'30'
            ),
            4=>array(
                0=>'Outside Dhaka',
                1=>'50'
            ),
        );
        
        
//        $full_array=array(
//            'area'=>$area,
//            'delivery_name'=>$delivery_name,
//            'timing'=>$timing,
//            'bdt_kg'=>$bdt_kg,
//            'additional_perkg'=>$additional,
//            'created_at'=>date('Y-m-d H:i:s'),
//            'updated_at'=>date('Y-m-d H:i:s'),
//        );
        $full_array=array(
            'area'=>json_encode($area),
            'delivery_name'=>json_encode($delivery_name),
            'timing'=>json_encode($timing),
            'bdt_kg'=>json_encode($bdt_kg),
            'additional_perkg'=>json_encode($additional),
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        );
        
        $this->db
                ->where('id',2)
                ->update('regular_price',$full_array);
        echo '<pre>';
        print_r($full_array);
        echo '</pre>';
        
//        echo json_encode($full_array);

        
    }

   

}
