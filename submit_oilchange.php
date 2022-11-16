<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?PHP
// Show all information, defaults to INFO_ALL
// phpinfo();
//
// // Show just the module information.
// // phpinfo(8) yields identical results.
// phpinfo(INFO_MODULES);


  $firstName = $address = $aria = $email = $phone = $brand = $model = $year = $oil_check = $tire_check = $detailing_check =$pad_rotor_check =$codereader_check = $other_check = $ordertime = $send= "";
  if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $firstName = test_input($_POST["firstName"]);
            $address = test_input($_POST["address"]);
            $aria = test_input($_POST["aria"]);
            $email = test_input($_POST["email"]);
            $phone = test_input($_POST["phone"]);
            $brand = test_input($_POST["brand"]);
            $model = test_input($_POST["model"]);
            $year = test_input($_POST["year"]);
            //  $oil_check = test_input($_POST["oil_check"]);
            // $tire_check = test_input($_POST["tire_check"]);
            // $detailing_check = test_input($_POST["detailing_check"]);
            //  $pad_rotor_check = test_input($_POST["pad_rotor_check"]);
          //  $codereader_check = test_input($_POST["codereader_check"]);
            $other_check = test_input($_POST["other_check"]);
            $ordertime = test_input($_POST["ordertime"]);
          //  $send = test_input($_POST["send"]);
          }

          //SEND EMAIL______________________________________________________________________________________________________________________
          // $email = "vsherr2016@gmail.com ";
          // $to = "polina.sherriuble@gmail.com";
          // $subject = "VLAD!!!!!!!!!!!!!!!!!!!";
          // $headers = "From: $email\n";
          // $message = "Thank YouZZZZZZZZZZZ";
          // if(mail($to,$subject,$message,$headers)){
          //   echo "Email was sent";
          // }





$hostIn = "localhost";
$dbIn = "vlad";
$userIn = "root";
$passIn = "";

try{
  $conn = new PDO("mysql:host=" .$hostIn . ";dbname=" . $dbIn, $userIn, $passIn);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // $agree = (filter_has_var(INPUT_POST,'checktodo', FILTER_SANITIZE_STRING)) {
  //   if( $agree) echo 'ZZZZZZZZZZZZZZZZZZZZZZZZZZZZZ';
  //   else 'XXXXXXXXXXXXXXXXXXXXXXXXXXX';
    // if(isset($_POST['checktodo']){
    //  if(!empty($_POST['checktodo'])){
    //  foreach($_POST['checktodo'] as $va){
    //   echo $va;
    // }}

$stmt = $conn->prepare("INSERT INTO oil_form (`customer_name`,
                                              `customer_address`,
                                              `city_aria`,
                                              `customer_email`,
                                              `customer_phone`,
                                              `car_model`,
                                              `car_brand`,
                                              `car_year`,
                                              `todoelse`,
                                             `oilchange_date`)
                                      VALUES (:customer_name,
                                              :customer_address,
                                              :city_aria,
                                              :customer_email,
                                              :customer_phone,
                                              :car_model,
                                              :car_brand,
                                              :car_year,
                                              :todoelse,
                                              :oilchange_date)");
$stmt->bindParam(':customer_name', $firstName);
$stmt->bindParam(':customer_address', $address);
$stmt->bindParam(':city_aria', $aria);
$stmt->bindParam(':customer_email', $email);
$stmt->bindParam(':customer_phone', $phone);
$stmt->bindParam(':car_model', $brand);
$stmt->bindParam(':car_brand', $model);
$stmt->bindParam(':car_year', $year);
$stmt->bindParam(':todoelse', $other_check);
$stmt->bindParam(':oilchange_date', $ordertime);
$stmt->execute();

include 'orderConfirm.html';
}
//If ($_POST["tire_check"] === 'on' || $_POST["detailing_check"] === 'on' || $_POST["pad_rotor_check"] === 'on'|| $_POST["codereader_check"] === 'on' ||  $_POST["other_check"] === 'on'){
// if($_POST["tire_check"] == 'off') {
//    $stmt = $conn->prepare("INSERT INTO tierchange_form (`tcustomer_name`,
//                                                 `tcustomer_address`,
//                                                 `tcity_aria`,
//                                                 `tcustomer_email`,
//                                                 `tcustomer_phone`,
//                                                 `tcar_model`,
//                                                 `tcar_brand`,
//                                                 `tcar_year`,
//                                                 `todo`,
//                                                `ttierchange_date`)
//                                         VALUES (:customer_name,
//                                                 :customer_address,
//                                                 :city_aria,
//                                                 :customer_email,
//                                                 :customer_phone,
//                                                 :car_model,
//                                                 :car_brand,
//                                                 :car_year,
//                                                 :todo,
//                                                 :oilchange_date)");
//   $stmt->bindParam(':tcustomer_name', $firstName);
//   $stmt->bindParam(':tcustomer_address', $address);
//   $stmt->bindParam(':tcity_aria', $aria);
//   $stmt->bindParam(':tcustomer_email', $email);
//   $stmt->bindParam(':tcustomer_phone', $phone);
//   $stmt->bindParam(':tcar_model', $brand);
//   $stmt->bindParam(':tcar_brand', $model);
//   $stmt->bindParam(':tcar_year', $year);
//   $stmt->bindParam(':todo', $other_check);
//   $stmt->bindParam(':ttierchange_date', $ordertime);
//   $stmt->execute();
//
//   include 'orderConfirm.html';
//
// }
//  createConfirmationmbox($firstName,$address,$aria, $email, $phone, $brand, $model, $year, $ordertime);

//echo "New record created successfully";
 //}

catch (PDOException $e){
  echo '<h3><br />Catch Connect Error ....' . $e->getMessage() . '<br/></h3>';

}//end try catch


      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      // function  createConfirmationmbox($a,$b,$c,$d,$e, $f, $g,$h, $i ) {
      //
      //    echo '<script> alert("'.$a.' \n '.$b.'\n '.$c.' \n '.$d.' \n '.$e.' \n '.$f.' \n '.$g.' \n '.$h.' \n '.$i.'")</script>';}


          // echo '<script type="text/javascript"> ';
          // echo 'var inputname = prompt("Please enter your name", "");';
          // echo 'alert(inputname);';
          // echo '</script>';


      // echo "<h2>Your Input:</h2>";
      // echo $firstName;
      // echo "<br>";
      // echo $address;
      // echo "<br>";
      // echo $aria;
      // echo "<br>";
      // echo $email;
      // echo "<br>";
      // echo $phone;
      // echo "<br>";
      // echo $brand;
      // echo "<br>";
      // echo $model;
      // echo "<br>";
      // echo $year;
      // echo "<br>";
      // echo $ordertime;
      // echo "<br>";
      // echo $send;
      // echo "<br>";
      // echo "Today is " . date("Y-m-d") . "<br>";
  ?>

      </body>
      </html>
