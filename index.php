<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Address Input</title>
<style>
  body {
    font-family: 'Arial', sans-serif;
    background-color: #f0f2f5;
    margin: 0;
    display: flex;
    min-height: 100vh;
  }

  .container {
    display: flex;
    flex-direction: column;
    width: 100%;
  }

  .header, .footer {
    background-color: #343541;
    color: white;
    text-align: center;
    padding: 15px 0;
    font-size: 24px;
  }

  .footer {
    font-size: 18px;
  }

  .row {
    flex: 1;
    display: flex;
    padding: 20px;
  }

  .column {
    flex: 1;
    background-color: #ffffff;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    padding: 40px;
  }

  .column-left {
    flex: 1;
    width: 25%;
    margin-right: 20px;
  }

  .column-right {
    flex: 3;
    width: 75%;
    margin-left:20px;
  }

  .h1-center {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
  }

  label {
    display: block;
    font-size: 18px;
    margin-bottom: 10px;
  }

  input[type="text"] {
    width: 100%;
    padding: 10px;
    border: 1px solid grey;
    border-radius: 5px;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    font-size: 16px;
  }

  button[type="submit"] {
    background-color: #33b249;
    color: #ffffff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
  }

  button[type="submit"]:hover {
    background-color: #0056b3;
  }
</style>
</head>
<body>
<div class="container">
  <div class="header">
    Novora
  </div>
  <div class="row">
    <div class="column column-left">
      <h1 class="h1-center">Enter your address</h1>
      <form action="" method="post">
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>
        <button type="submit">Search</button>
      </form>
    </div>
    <div class="column column-right">
      results here
    </div>
  </div>
  <div class="footer">
  ©2023
  </div>
</div>
</body>
</html>
