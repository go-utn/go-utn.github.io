<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://developer.api.bk.mufg.jp/btmu/retail/trial/v2/me/accounts/",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "accept: REPLACE_THIS_VALUE",
    "x-btmu-seq-no: REPLACE_THIS_VALUE",
    "x-ibm-client-id: REPLACE_THIS_KEY"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
