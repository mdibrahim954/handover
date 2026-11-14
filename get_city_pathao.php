<?php
header("Access-Control-Allow-Origin: http://handoverexpressbd.com");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'GET'|| $_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if(isset($_POST['selectedOptionText'])){
        
        $selectedCityID = $_POST['selectedOptionText'];
        $url= "https://api-hermes.pathao.com/aladdin/api/v1/cities/$selectedCityID/zone-list";
        
        $curl = curl_init();
            
        curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyNjciLCJqdGkiOiIwZDg4NjVjYzZmMGI1NWFkZjdhZmI0NzExNDY5MjAwN2ZjNWM2ZmZiNjU4OTI5MDk2YTg3MTQzOGFhOWExNGQ0MDU2Zjg4NmEzZmZlNDQyZSIsImlhdCI6MTcxNzY1MzM4MS4xNzA2MiwibmJmIjoxNzE3NjUzMzgxLjE3MDYzLCJleHAiOjE3MTgwODUzODEuMDczMTU0LCJzdWIiOiIzNTIiLCJzY29wZXMiOltdfQ.lasITSkYnnaco-MbEAlK6PgIsrbyJefR6K1MBraly2Tz5R5Bbm-4I94XTbK925JrWgpXYhmcBh7EWqpQOBUCGY4s4nMpPAgCCB-kRv8R5gNLUFLOJTk4jnKmQyDs3YMSLLVOA_6IXD15HnPuglNd9lpwGwo_0raRt_sVIVROxUFlhaR_D3st4xr6LGineO36NLj_vEWGwcRn06JobKdRTHcM_yrZ5DuMzpBw9eO99MvNFahV6BTk9A-RF0dgoAISwxtWIbv2YeEsPZsdlWcEGZd8s1XOTmzla5Nan5AXdDwt9JZ6ZYk3v-Fq82ZKJx1fB9X8LNfqFSKgCMe_az8-IdGWV2rMCcsFRKvHqkhLd8eBMqMVUJq1lu14OazozE3jM7AHGfZaUwDcjdkSHSGBnKectbsQ_8OG2Ug4PdDs4W9SbCDL8dlfDI4EI2p__B9lcyftrBnQWmrEt0Z6nF0hqm8hRFEHIys4M9CaWi5RsoZK_Q7OZeksrVwU4agjvD_E1VyFH2xWCqWS8vA1aTBZrgPMyJwTHSd-a_9685-Td1LmTbr6TNRy5DI3JyDqYj7fVqUVZ0gDl6ja58p149JfElW2Rf2PrJig0GgdDiqhmC6rildy_UxIMPLpc71X57Es57GagSQIryJ7jv2S1Fm1uJrHotYmZ_X3dj79ff-Mn48'
          ),
        ));
        
        $response = curl_exec($curl);
        $response=json_decode($response,true);
        if (isset($response['message'])=== 'Unauthorized'){
            print_r('Token Expired');
        }
        $data =$response['data']['data'];
        curl_close($curl);
        //echo $response;

        print_r(json_encode($data));
    }
}
?>
