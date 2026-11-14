<?php
 $selectedDistrict = $_POST['selected_District'];
        if($selectedDistrict=="Cox"){
            $selectedDistrict="Cox's Bazar";
        }
        //echo"https://openapi.redx.com.bd/v1.0.0-beta/areas?district_name=$selectedDistric";
        echo $selectedDistrict="Cox%27s%20Bazar";
        echo"https://openapi.redx.com.bd/v1.0.0-beta/areas?district_name=$selectedDistrict";
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://openapi.redx.com.bd/v1.0.0-beta/areas?district_name=$selectedDistrict",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'API-ACCESS-TOKEN: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIyNTA0NDgiLCJpYXQiOjE2OTMxMTA5MjAsImlzcyI6ImVYNU5admpudjZPOEdqS0ltZ1c1QnZyUzJYUDNOVVJ6Iiwic2hvcF9pZCI6MjUwNDQ4LCJ1c2VyX2lkIjo2MDk3N30.1N7YfpdcBXII8Gj9vH2cA2KATsXkwSh3XPFhmfercpQ'
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        $data = json_decode($response, true);
        print_r($data);