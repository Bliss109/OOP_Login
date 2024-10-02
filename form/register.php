<?php
   DEFINE('HOST','localhost');
   DEFINE('USERNAME', 'root');
   DEFINE('PASSWORD', '');
   DEFINE('DATABASE','authentication');

   // Set up DSN (Data Source Name) for PDO with MySQL
   $dsn = 'mysql:host='.HOST . ';dbname='.DATABASE;

   try {
       // Create a new PDO instance for database connection
       $conn = new PDO($dsn, USERNAME, PASSWORD);
       // Set the PDO error mode to exception
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); //for LIMITS
   } catch (PDOException $e) {
       // Handle the exception and print error message
       echo 'Connection failed: ' . $e->getMessage();
   }
?>


<?php include '../includes/header.php'?>

<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <form action="" method="POST">
                <h1>Register Here</h1>
                <div class="form-group">
                    <label for="firstname">Firstname</label>
                    <input type="text" name="firstname" id="firstname" clas="form-control">
                </div>
                <div class="form-group">
                    <label for="lastname">Lastname</label>
                    <input type="text" name="firstname" id="lastname" clas="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" clas="form-control">
                </div>
                <div class="form-group">
                    <label for="password1">Password</label>
                    <input type="password" name="password1" id="password1" clas="form-control">
                </div>
                <div class="form-group">
                    <label for="password2">Confirm Password</label>
                    <input type="password" name="password2" id="password2" clas="form-control">
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-info" name="Register">Register</button>
                </div>
            </form>

        </div>
    </div>
</div>
<?php include '../includes/footer.php' ?>
