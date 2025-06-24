<?php
include 'db.php';
if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
    header("Location: login.php");
    exit;
}

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $name = $_POST["name"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];
    $category = $_POST["category"];

    $sql = $conn -> prepare("insert into product(name, price, quantity, category) values(?,?,?,?)");
    $sql -> bind_param("siis", $name, $price, $quantity, $category);
    $sql -> execute();
    header("Location:admin_dash.php");
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
                        <center><h2>Add Product</h2></center> <br>
                <form action="" method="post">
                    <div class="form-floating mb-3">
                    <input
                        type="text"
                        class="form-control"
                        name="name"
                        id="formId1"
                        placeholder=""
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
                    />
                    <label for="formId1">Category</label>
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
