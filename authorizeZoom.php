<?php
  require_once 'zoom_config.php';
    
  try {
      $client = new GuzzleHttp\Client(['base_uri' => 'https://zoom.us']);
  
      $response = $client->request('POST', '/oauth/token', [
          "headers" => [
              "Authorization" => "Basic ". base64_encode(CLIENT_ID.':'.CLIENT_SECRET),
              "Content-Type" =>	"application/x-www-form-urlencoded"
          ],
          'form_params' => [
              "grant_type" => "authorization_code",
              "code" => $_POST['code'],
              "redirect_uri" => REDIRECT_URI
          ],
      ]);
  
      $token = json_decode($response->getBody()->getContents(), true);
  
      $db = new DatabaseModule();
  
    //   if($db->is_table_empty()) {

        $db->insert_access_token(json_encode($token));
        echo "Access token inserted successfully.";

      //}

  } catch(Exception $e) {
      
    echo $e->getMessage();

  }

?>