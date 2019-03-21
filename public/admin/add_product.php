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
                <form action="" method="post">
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Product Name:</label>
                        <input type="text" class="form-control" name="productName">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Product Line:</label>
                        <select class="form-control" name="productLine">
                            <option value="Classic Cars">Classic Cars</option>
                            <option value="Motorcycles">Motorcycles</option>
                            <option value="Planes">Planes</option>
                            <option value="Ships">Ships</option>
                            <option value="Trains">Trains</option>
                            <option value="Trucks and Buses">Trucks and Buses</option>
                            <option value="Vintage Cars">Vintage Cars</option>
                        </select>
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
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Product image:</label>
                        <input type="file" class="form-control" name="product_img">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" name="add">Add product</button>
                    </div>
                </form>
            </div>
            <?php 
            if (isset($_POST['add'])) {

                echo $_POST['product_img'];

                $fields = [
                    ':productName' => filter_input(INPUT_POST, 'productName', FILTER_SANITIZE_STRING),
                    ':productLine' => filter_input(INPUT_POST, 'productLine', FILTER_SANITIZE_STRING),
                    ':productScale' => filter_input(INPUT_POST, 'productScale', FILTER_SANITIZE_STRING),
                    ':productVendor' => filter_input(INPUT_POST, 'productVendor', FILTER_SANITIZE_STRING),
                    ':productDescription' => filter_input(INPUT_POST, 'productDescription', FILTER_SANITIZE_STRING),
                    ':quantityInStock' => filter_input(INPUT_POST, 'quantityInStock', FILTER_SANITIZE_NUMBER_INT),
                    ':buyPrice' => filter_input(INPUT_POST, 'buyPrice', FILTER_SANITIZE_NUMBER_FLOAT),
                    ':MSRP' => filter_input(INPUT_POST, 'MSRP', FILTER_SANITIZE_NUMBER_FLOAT),
                    ':product_img' => filter_input(INPUT_POST, 'product_img', FILTER_SANITIZE_STRING),
                ];

                $editProduct = new Product();
                $editProduct->createProduct($fields);
            }

            ?>
        </div>
    </div>
</div> 