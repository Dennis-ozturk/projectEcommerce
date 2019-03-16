<?php include('../includes/header.php'); ?>

<form method="POST">
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </div>
  <button type="submit" name="createUser" class="btn btn-primary">Submit</button>
</form>

<?php 
        if(isset($_POST['createUser'])){
          $userName = $_POST['email'];
          $password = $_POST['password'];

          /*  Skapa filtrering  */
          $userName = filter_var($userName, FILTER_SANITIZE_EMAIL);
          $password = filter_var($password, FILTER_SANITIZE_STRING);
          $password = md5($password);
          
          $fields = [$userName, $password];
          $user1 = new User();
          $user1->createAccount($fields);
        }
      ?>

<?php include('../includes/footer.php'); ?> 