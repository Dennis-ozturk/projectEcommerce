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
            <label for="recipient-name" class="col-form-label">Order Number:</label>
            <input type="text" class="form-control" name="orderNumber">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Order Date:</label>
            <input type="text" class="form-control" name="orderDate">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Required Date:</label>
            <input type="text" class="form-control" name="requiredDate">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Shipped Date:</label>
            <input type="text" class="form-control" name="shippedDate">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Status:</label>
            <input type="text" class="form-control" name="status">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Comments:</label>
            <input type="text" class="form-control" name="comments">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Customer Number:</label>
            <textarea type="text" class="form-control" name="customerNumber"></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" name="add">Add order</button>
          </div>
        </form>
      </div>
      <?php 
        if(isset($_POST['add'])){
          $orderNumber = $_POST['orderNumber'];
          $orderDate = $_POST['orderDate'];
          $requiredDate = $_POST['requiredDate'];
          $shippedDate = $_POST['shippedDate'];
          $status = $_POST['status'];
          $comments = $_POST['comments'];
          $customerNumber = $_POST['customerNumber'];

          $fields = [$orderNumber, $orderDate, $requiredDate, $shippedDate, $status, 
          $comments, $customerNumber];

          $editOrder = new Order();
          $editOrder->createOrder($fields);
        }

      ?>
    </div>
  </div>
</div>
