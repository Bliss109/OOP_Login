<?php 
require_once '../config/config.php';

// Initialize errors array and form input variables
$errors = [
    'firstname' => '',
    'lastname' => '',
    'email' => '',
    'password1' => '',
    'password2' => ''
];
$firstname = $lastname = $email = $password1 = $password2 = '';

// Check if the form is submitted
if (isset($_POST['Register'])) {
    // Validate Firstname
    if (empty($_POST['firstname'])) {
        $errors['firstname'] = 'First Name should not be empty';
    } else {
        $firstname = htmlspecialchars($_POST['firstname']);
    }
    
    // Validate Lastname
    if (empty($_POST['lastname'])) {
        $errors['lastname'] = 'Last Name should not be empty';
    } else {
        $lastname = htmlspecialchars($_POST['lastname']);
    }
    
    // Validate Email
    if (empty($_POST['email'])) {
        $errors['email'] = 'Email should not be empty';
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format';
    } else {
        $email = htmlspecialchars($_POST['email']);
    }
    
    // Validate Password
    if (empty($_POST['password1'])) {
        $errors['password1'] = 'Password should not be empty';
    } elseif (strlen($_POST['password1']) < 6) {
        $errors['password1'] = 'Password must be at least 6 characters long';
    } else {
        $password1 = $_POST['password1'];
    }

    if (empty($_POST['password2'])) {
        $errors['password2'] = 'Confirm Password should not be empty';
    } else {
        $password2 = $_POST['password2'];
    }

    // Check if passwords match
    if (!empty($password1) && !empty($password2) && $password1 !== $password2) {
        $errors['password1'] = 'Passwords do not match';
        $errors['password2'] = 'Passwords do not match';
    }

    // Check if there are no errors before processing
    if (!array_filter($errors)) {
        // Process registration (e.g., save to database)
        // Redirect or show success message
        echo 'Form submitted successfully';
    }
}
?>

<?php include '../includes/header.php' ?>
<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <h1>Register Here</h1>
                
                <!-- Firstname Field -->
                <div class="form-group">
                    <label for="firstname">Firstname</label>
                    <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo htmlspecialchars($firstname); ?>">
                    <small class="text-danger"><?php echo $errors['firstname']; ?></small>
                </div>
                
                <!-- Lastname Field -->
                <div class="form-group">
                    <label for="lastname">Lastname</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo htmlspecialchars($lastname); ?>">
                    <small class="text-danger"><?php echo $errors['lastname']; ?></small>
                </div>
                
                <!-- Email Field -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>">
                    <small class="text-danger"><?php echo $errors['email']; ?></small>
                </div>
                
                <!-- Password Field -->
                <div class="form-group">
                    <label for="password1">Password</label>
                    <input type="password" name="password1" id="password1" class="form-control">
                    <small class="text-danger"><?php echo $errors['password1']; ?></small>
                </div>
                
                <!-- Confirm Password Field -->
                <div class="form-group">
                    <label for="password2">Confirm Password</label>
                    <input type="password" name="password2" id="password2" class="form-control">
                    <small class="text-danger"><?php echo $errors['password2']; ?></small>
                </div>
                
                <!-- Submit Button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-info" name="Register">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include '../includes/footer.php' ?>
