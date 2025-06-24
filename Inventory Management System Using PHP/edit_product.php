<?php
include 'db.php';
if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
    header("Location: login.php");
    exit;
}
$id = isset($_GET["id"]) ? $_GET["id"] : null;
if(isset($_GET["id"])){
    $result = $conn -> prepare("select * from product where id = ?");
    $result -> bind_param("i", $_GET["id"]);
    $result -> execute();
    $user = $result -> get_result() -> fetch_assoc();
}

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $name = $_POST["name"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];
    $category = $_POST["category"];

    $sql = $conn -> prepare("update product set name=?, price=?, quantity=?, category=? where id=?");
    $sql -> bind_param("siisi", $name, $price, $quantity, $category, $_GET["id"]);
    $sql -> execute();
    header("Location:view_products.php");
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
                class="container my-5"
            >
                <div class="card mx-auto" style="max-width: 600px;">
                    
                    <div class="card-body">
                        <center><h2>Update Product</h2></center>
                <form action="" method="post">
                    <div class="form-floating mb-3">
                    <input
                        type="text"
                        class="form-control"
                        name="name"
                        id="formId1"
                        placeholder=""
                        value="<?php echo $user["name"] ?>"
                    />
                    <label for="formId1">Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input
                        type="text"
                        class="form-control"
                        name="price"
                        id="formId1"
                        placeholder=""
                        value="<?php echo $user["price"] ?>"
                    />
                    <label for="formId1">Price</label>
                </div>
                <div class="form-floating mb-3">
                    <input
                        type="text"
                        class="form-control"
                        name="quantity"
                        id="formId1"
                        placeholder=""
                        value="<?php echo $user["quantity"] ?>"
                    />
                    <label for="formId1">Quantity</label>
                </div>
                <div class="form-floating mb-3">
                    <input
                        type="text"
                        class="form-control"
                        name="category"
                        id="formId1"
                        placeholder=""
                        value="<?php echo $user["category"] ?>"
                    />
                    <label for="formId1">Category</label>
                </div>
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
                    href="view_products.php"
                    role="button"
                    >Cancel</a
                >
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
