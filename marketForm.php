<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?PHP

  $firstName = $address = $province = $email = $phone = $brand = $model = $year =$carpart = $ordertime = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $firstName = test_input($_POST["firstName"]);
            $address = test_input($_POST["address"]);
            $province = $_POST["province"];
            $email = test_input($_POST["email"]);
            $phone = test_input($_POST["phone"]);
            $brand = test_input($_POST["brand"]);
            $model = test_input($_POST["model"]);
            $year = test_input($_POST["year"]);
            $carpart = test_input($_POST["carpart"]);
            $ordertime = date("d-m-y");;
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

$stmt = $conn->prepare("INSERT INTO form_market (`tcustomer_name`,
                                              `tcustomer_address`,
                                              `tcity_area`,
                                              `tcustomer_email`,
                                              `tcustomer_phone`,
                                              `tcar_model`,
                                              `tcar_brand`,
                                              `tcar_year`,
                                              `car_part`,
                                              `sendOrder_date`)
                                      VALUES (:customer_name,
                                              :customer_address,
                                              :city_aria,
                                              :customer_email,
                                              :customer_phone,
                                              :car_model,
                                              :car_brand,
                                              :car_year,
                                              :car_part,
                                              $ordertime)");
$stmt->bindParam(':customer_name', $firstName);
$stmt->bindParam(':customer_address', $address);
$stmt->bindParam(':city_aria', $province);
$stmt->bindParam(':customer_email', $email);
$stmt->bindParam(':customer_phone', $phone);
$stmt->bindParam(':car_model', $brand);
$stmt->bindParam(':car_brand', $model);
$stmt->bindParam(':car_year', $year);
$stmt->bindParam(':car_part', $carpart);

$stmt->execute();

include 'marketConfirm.html';
}

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
