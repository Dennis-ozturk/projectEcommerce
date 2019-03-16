<button type="button" class="btn btn-primary alert alert-success" data-toggle="modal" data-target="#addOrder" data-whatever="@mdo">Add order</button>

<div class="modal fade" id="addOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <div class="form-group">
            <label for="username" class="col-form-label">Username:</label>
            <input type="text" class="form-control" name="userName">
          </div>
          <div class="form-group">
            <label for="password" class="col-form-label">Password:</label>
            <input type="password" class="form-control" name="password">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" name="login">Log in!</button>
          </div>
        </form>
      </div>
      <?php 
        if(isset($_POST['login'])){
          $userName = $_POST['userName'];
          $password = $_POST['password'];

          /*  Skapa filtrering  */
          $userName = filter_var($userName, FILTER_SANITIZE_STRING);
          $password = filter_var($password, FILTER_SANITIZE_STRING);
          
          $fields = [$userName, $password];

          $user1 = new User();
          $user1->logIn($fields);
        }

      ?>
    </div>
  </div>
</div>