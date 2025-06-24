<?php
include 'db.php';
if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
    header("Location: login.php");
    exit;
}

$username = $_SESSION["username"];

$product = $conn->query("select id, name from product");
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $productId = $_POST["productId"];
    $quantity = $_POST["quantity"];
    $orderType = $_POST["orderType"];

    $sql = $conn -> prepare("select quantity from product where id=?");
    $sql -> bind_param("i", $productId);
    $sql -> execute();
    $sql -> store_result();
    $sql -> bind_result($currentQuantity);
    $sql -> fetch();

    if ($orderType === "sale" && $quantity > $currentQuantity) {
        $error = "Insufficient stock for sale.";
    } else {
        $newQuantity = ($orderType === "sale") ? $currentQuantity - $quantity : $currentQuantity + $quantity;
        $upt = $conn -> prepare("update product set quantity=? where id=?");
        $upt -> bind_param("ii", $newQuantity, $productId);
        $upt -> execute();

        $date="current_timestamp";
        $ins = $conn->prepare("INSERT INTO orders (product_id, quantity, order_type, username) VALUES (?, ?, ?, ?)");
        $ins->bind_param("iiss", $productId, $quantity, $orderType, $username);
        $ins->execute();

        header("Location:admin_dash.php");
    }
}
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>
            <div
                class="container mt-5"
            >
                <div class="card mx-auto" style="max-width: 600px;">
                    
                    <div class="card-body">
                        <center><h2>Create New Order</h2></center> <br>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">Select Product</label>
                        <select
                            class="form-select form-select-lg"
                            name="productId"
                            id=""
                        >
                            <?php while($row=$product->fetch_assoc()) {?>
                            <option value="<?php echo $row["id"] ?>"><?php echo $row["name"] ?></option>
                            <?php } ?>
                        </select>
                    </div> 
                    
                <div class="form-floating mb-3">
                    <input
                        type="number"
                        class="form-control"
                        name="quantity"
                        id="formId1"
                        placeholder=""
                    />
                    <label for="formId1">Quantity</label>
                </div>
                
                <div class="mb-3">
                        <label for="" class="form-label">Order Type</label>
                        <select
                            class="form-select form-select-lg"
                            name="orderType"
                            id=""
                        >
                            <option selected value="purchase">Purchase</option>
                            <option value="sale">Sale</option>
                        </select>
                    </div>
            
                <div>
                    <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Submit
                </button>
                <a
                    name=""
                    id=""
                    class="btn btn-secondary"
                    href="admin_dash.php"
                    role="button"
                    >Cancel</a
                >
                
                
                </div>
                </form>
                    </div>
                </div>
                
            </div>
            
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
