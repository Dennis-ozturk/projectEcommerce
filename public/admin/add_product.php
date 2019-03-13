<button type="button" class="btn btn-primary alert alert-success" data-toggle="modal" data-target="#addProduct" data-whatever="@mdo">Add product</button>

<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">product Code:</label>
            <input type="text" class="form-control" name="productCode">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Product Name:</label>
            <input type="text" class="form-control" name="productName">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Product Line:</label>
            <input type="text" class="form-control" name="productLine">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Product Scale:</label>
            <input type="text" class="form-control" name="productScale">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Product Vendor:</label>
            <input type="text" class="form-control" name="productVendor">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Product Description:</label>
            <textarea type="text" class="form-control" name="productDescription"></textarea>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Quantity:</label>
            <input type="text" class="form-control" name="quantityInStock">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Price:</label>
            <input type="text" class="form-control" name="buyPrice">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">MSRP:</label>
            <input type="text" class="form-control" name="MSRP">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" name="add">Add product</button>
          </div>
        </form>
      </div>
      <?php 
        if(isset($_POST['add'])){
          $productCode = $_POST['productCode'];
          $productName = $_POST['productName'];
          $productLine = $_POST['productLine'];
          $productScale = $_POST['productScale'];
          $productVendor = $_POST['productVendor'];
          $productDescription = $_POST['productDescription'];
          $quantityInStock = $_POST['quantityInStock'];
          $buyPrice = $_POST['buyPrice'];
          $MSRP = $_POST['MSRP'];

          $fields = [$productCode, $productName, $productLine, $productScale, 
          $productVendor, $productDescription, $quantityInStock, $buyPrice, $MSRP];

          $editProduct = new Product();
          $editProduct->createProduct($fields);
        }

      ?>
    </div>
  </div>
</div>
