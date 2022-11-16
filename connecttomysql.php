<?PHP
include 'submit_oilchange.php';
function connectToMySQL($hostIn, $dbIn, $userIn, $passIn){
try{
  $conn = new PDO("mysql:host=" .$hostIn . ";dbname=" . $dbIn, $userIn, $passIn);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // prepare sql and bind parameters
$stmt = $conn->prepare("INSERT INTO oil_form (`customer_name`,
                                              `customer_address`,
                                              `city_aria`,
                                              `customer_email`,
                                              `customer_phone`,
                                              `car_model`,
                                              `car_brand`,
                                              `car_year`,
                                             `oilchange_date`)
                                      VALUES (:customer_name,
                                              :customer_address,
                                              :city_aria,
                                              :customer_email,
                                              :customer_phone,
                                              :car_model,
                                              :car_brand,
                                              :car_year,
                                              :oilchange_date)");
$stmt->bindParam(':customer_name', $firstName);
$stmt->bindParam(':customer_name', $address);
$stmt->bindParam(':customer_name', $aria);
$stmt->bindParam(':customer_name', $email);
$stmt->bindParam(':customer_name', $phone);
$stmt->bindParam(':customer_name', $brand);
$stmt->bindParam(':customer_name', $model);
$stmt->bindParam(':customer_name', $year);
$stmt->bindParam(':customer_name', $ordertime);
$stmt->execute();

echo "New record created successfully";
}catch (PDOException $e){
  echo '<h3><br />Catch Connect Error ....' . $e->getMessage() . '<br/></h3>';

}//end try catch
}//end connectToMySQL

    ?>
