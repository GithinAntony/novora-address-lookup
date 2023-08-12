<?php
    $resultsFlag = 0;
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["serachSubmit"])) {
        $resultsFlag = 1;
        $inputAddress = $_POST["inputAddress"];

    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Address Input</title>
<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<body>
<div class="container">
  <div class="header">
    Novora
  </div>
  <div class="row">
    <div class="column column-left">
      <h1 class="h1-center">Enter your address</h1>
      <form action="" method="post" name="addressLookupForm">
        <label for="address">Address:</label>
        <input type="text" id="inputAddress" name="inputAddress" required>
        <button type="submit" name="serachSubmit">Search</button>
      </form>
    </div>
    <div class="column column-right">
        <?php
        if ($resultsFlag == 1) {
            echo "Results published ";
        }
        ?>
    </div>
  </div>
  <div class="footer">
  ©2023
  </div>
</div>
</body>
</html>
