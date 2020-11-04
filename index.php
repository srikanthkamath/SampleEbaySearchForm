<!DOCTYPE html>
<html lang="en">

<head>
  <title>Agreefy</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<style type="text/css">
  .form-control {
    width: 300px;
    display: inline-block;
    margin-right: 30px;
  }
</style>

<body>
  <div class="container">
    <h2>Search Ebay Product</h2>
    <form class="formClass" action="search.php" method="POST">
      <div class="form-group">
        <label for="itemNumber">Item Number:</label>
        <input type="text" class="form-control" id="itemNumber" placeholder="Enter Item Number" name="itemNumber"
          required>
        <button type="submit" id="submitButton" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</body>

</html>