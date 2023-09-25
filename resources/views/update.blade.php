<!DOCTYPE html>
<html>
<head>
    <title>Form Input</title>
</head>
<body>
    <form method="POST" action="{{ route('post-data') }}">
        @csrf
        <label for="original_sku">Original SKU:</label>
        <input type="text" name="original_sku" id="original_sku"><br>

        <label for="product_id">Product ID:</label>
        <input type="text" name="product_id" id="product_id"><br>

        <label for="price">Price:</label>
        <input type="text" name="price" id="price"><br>

        <label for="active">Active:</label>
        <input type="text" name="active" id="active"><br>

        <label for="seller_warehouse">Seller Warehouse:</label>
        <input type="text" name="seller_warehouse" id="seller_warehouse"><br>

        <label for="warehouse_quantities">Warehouse Quantities:</label>
        <input type="text" name="warehouse_quantities" id="warehouse_quantities"><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
