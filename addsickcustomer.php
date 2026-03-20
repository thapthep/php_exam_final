<?php
require 'connect.php';

$sql_select = "select * from country order by CountryCode";
$stmt_s = $conn->prepare($sql_select);
$stmt_s->execute();
if (isset($_POST['submit'])) {
  if (!empty($_POST['C_ID']) && !empty($_POST['C_Name']))
    $sql = "insert into Customer values(:C_ID, :C_Name, :Birthdate, :Email, :CountryCode, :OutstandingDebt)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':C_ID', $_POST['C_ID']);
  $stmt->bindParam(':C_Name', $_POST['C_Name']);
  $stmt->bindParam(':Birthdate', $_POST['Birthdate']);
  $stmt->bindParam(':Email', $_POST['Email']);
  $stmt->bindParam(':CountryCode', $_POST['CountryCode']);
  $stmt->bindParam(':OutstandingDebt', $_POST['OutstandingDebt']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>Add Customer dorpdown</h1>
  <form action="addcustomerDropdown.php" method="POST">
    <label for="CustomerID">CustomerID:</label>
    <br>
    <input type="text" id="CustomerID" name="CustomerID">
    <br><br>
    <label for="Name">Your fullname:</label>
    <br>
    <input type="text" id="Name" name="Name">
    <br><br>
    <label for="Birthdate">Birthdate:</label>
    <br>
    <input type="date" id="Birthdate" name="Birthdate">
    <br><br>
    <label for="Email">Email:</label>
    <br>
    <input type="email" id="Email" name="Email">
    <br><br>
    <label for="OutstandingDebt">OutstandingDebt:</label>
    <br>
    <input type="number" id="OutstandingDebt" name="OutstandingDebt">
    <br><br>
    <label>Select CountryCode:</label>
    <select name="CountryCode">
      <?php
      require 'connect.php';
      while ($cc = $stmt_s->fetch(PDO::FETCH_ASSOC)) :;
      ?>
        <option value="<?php echo $cc["CountryCode"];   ?>">
          <?php echo $cc["CountryName"]; ?>
        </option>
      <?php
      endwhile;
      ?>
    </select>
    <br>
    <input type="submit" value="Submit" name="submit">

  </form>

</body>

</html>