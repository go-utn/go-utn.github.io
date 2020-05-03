<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Progate</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
  <div class="header">
    <div class="header-left">Progate</div>
    <div class="header-right">
      <ul>
        <li>会社概要</li>
        <li>採用</li>
        <li class="selected">お問い合わせ</li>
      </ul>
    </div>
  </div>


  <div class="main">
    <div class="thanks-message">お問い合わせいただきありがとうございます。</div>
    <div class="display-contact">
      <div class="form-title">入力内容</div>

<!-- add from date2020/05/01 -->
<?php

$curl = curl_init();

/*ufj
if($_POST['nextKeyword'] == NULL){
    $access = "https://developer.api.bk.mufg.jp/btmu/retail/trial/v2/me/accounts/".$_POST['accountId']."/transactions?inquiryDateFrom=".$_POST['inquiryDateFrom']."&inquiryDateTo=".$_POST['inquiryDateTo'];
}elseif{
    $access = "https://developer.api.bk.mufg.jp/btmu/retail/trial/v2/me/accounts/".$_POST['accountId']."/transactions?inquiryDateFrom=".$_POST['inquiryDateFrom']."&inquiryDateTo=".$_POST['inquiryDateTo']."&nextKeyword=".$_POST['nextKeyword'];
}
*/

/*ufj
$access = "https://developer.api.bk.mufg.jp/btmu/retail/trial/v2/me/accounts/".$_POST['accountId']."/transactions?inquiryDateFrom=".$_POST['inquiryDateFrom']."&inquiryDateTo=".$_POST['inquiryDateTo']
*/

//ufj
// $access = "https://developer.api.bk.mufg.jp/btmu/retail/trial/v2/me/accounts/001001110001/transactions?inquiryDateFrom=2010-01-01&inquiryDateTo=2020-01-01";

//gmo
//$access = "https://api.gmo-aozora.com/ganb/api/simulator/personal/v1/accounts";

//gmo
$access = "https://api.gmo-aozora.com/ganb/api/simulator/personal/v1/accounts/balances?accountId=".$_POST['accountId'];

curl_setopt_array($curl,array(
CURLOPT_URL => $access,
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "GET",
CURLOPT_HTTPHEADER => array(
//ufj
//"accept: 4ff77129-27db-4394-9c95-e78c1cf92e3c",
//"x-btmu-seq-no: application/json",
//"x-ibm-client-id: 12345"

//gmo
"accept: application/json;charset=UTF-8",
"x-access-token: your access token"

)));

//mod from 2020/05/03
//$response = curl_exec($curl);
$result = curl_exec($curl);
//$result = mb_convert_encoding($result, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
//$response = json_decode($result,true);
$response = json_decode($result);
//mod to 2020/05/03

//$err = curl_error($curl);
$err = curl_errno($curl);

curl_close($curl);

//echo $err;
if ($err != 0) {
    echo "err_code:".$err;
//    print_r($response);
//        echo htmlspecialchars($response);
} else {
/*
  echo $result."<br>"."<br>";
  var_dump($result);
  echo "<br>"."<br>";
  var_dump($response);
  */
}
echo "<br>"."口座情報"."<br>";
$arr = array("口座ID" => "accountId",
        "科目コード" => "accountTypeCode",
        "現在残高" => "balance");
foreach ($response->balances as $item) {
       //var_dump($item->accountId);
    echo "<table>";
        foreach ($arr as $key => $value) {
            echo "<tr>";
            echo "<th>".$key."</th>";
            echo "<td>".$item->$value."<//td>";
            echo "</tr>";
        }
    echo "</table>";
}
echo "<br>";
//preg_match('/¥"accountId¥": ¥"\d{12}¥"/', $str_grep, $date_match);
//preg_match('/301011234567/', $str_grep, $date_match);
//var_dump($date_match);

?>

<!-- add to date2020/05/03 -->
<!--
<table>
  <tr>
    <th>見出し</th>
    <td><?php echo $responce['balances:']; ?></td>
  </tr>
  <tr>
    <th>見出し</th>
    <td>データ</td>
  </tr>
  <tr>
    <th>見出し</th>
    <td>データ</td>
  </tr>
  <tr>
    <th>見出し</th>
    <td>データ</td>
  </tr>
</table>
-->
<!-- add to date2020/05/03 -->

<!-- add to date2020/05/01 -->
<!--
      <div class='form-item'>■ 口座ID(12桁)</div>
      <?php echo $_POST['accountId']; ?>

      <div class='form-item'>■ 照会期間(FROM)</div>
      <?php echo $_POST['inquiryDateFrom']; ?>

      <div class='form-item'>■ 照会期間(TO)</div>
      <?php echo $_POST['inquiryDateTo']; ?>
-->
<!-- add from date2020/05/01 -->
        <!--
      <div class='form-item'>■ 次明細取得キーワード</div>
      <?php echo $_POST['nextKeyword']; ?>
      -->
<!-- add to date2020/05/01 -->

    </div>
  </div>
  <div class="footer">
    <div class="footer-left">
      <ul>
        <li>会社概要</li>
        <li>採用</li>
        <li>お問い合わせ</li>
      </ul>
    </div>
    <div class="like-box">
      <iframe src="https://www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FProgate%2F742679992421539&amp;show_faces=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:300px;" allowTransparency="true"></iframe>
    </div>
  </div>
</body>
</html>
