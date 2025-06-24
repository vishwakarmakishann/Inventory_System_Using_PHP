<?php
include 'db.php';
if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
    header("Location: login.php");
    exit;
}
$totalProduct = $conn -> query("select count(id) as count from product")->fetch_assoc()["count"];
$totalQuantity = $conn->query("select sum(quantity) as total_qty from product")->fetch_assoc()["total_qty"];
$totalValue = $conn->query("select sum(quantity * price) as total_val from product")->fetch_assoc()["total_val"];
$lowStock = $conn->query("select count(id) as low from product where quantity < 5")->fetch_assoc()["low"];
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
                <div class="d-flex justify-content-between">
                <h2>Inventory Summary Report</h2>
                <div>
                    <a
                        name=""
                        id=""
                        class="btn btn-secondary"
                        href="admin_dash.php"
                        role="button"
                        >Back To Dashboard</a
                    >
                    
                </div>
            </div>
            </div>
            <div
                class="container my-3"
            >
                <div
                    class="row justify-content-center align-items-center g-2"
                >
                    <div class="col">
                        <div class="card border-primary">
                    
                    <div class="card-body text-center">
                        <h5 class="text-primary">Total Products</h5>
                        <h2> <?php echo $totalProduct ?> </h2>
                    </div>
                </div>
                    </div>
                    <div class="col">
                        <div class="card border-success">
                    
                    <div class="card-body text-center">
                        <h5 class="text-success">Total Stock</h5>
                        <h2> <?php echo $totalQuantity ?> </h2>
                    </div>
                </div>
                    </div>
                    <div class="col">
                        <div class="card border-warning">
                    
                    <div class="card-body text-center">
                        <h5 class="text-warning">Inventory Value</h5>
                        <h2> Rs.    <?php echo $totalValue ?> </h2>
                    </div>
                </div>
                    </div>
                    <div class="col">
                        <div class="card border-danger">
                    
                    <div class="card-body text-center">
                        <h5 class="text-danger">Low Stock Items</h5>
                        <h2> <?php echo $lowStock ?> </h2>
                    </div>
                </div>
                    </div>
                </div>
                
                <div class="my-5">
                    <a
                    name=""
                    id=""
                    class="btn btn-success"
                    href="excel.php"
                    role="button"
                    >Download Excel</a
                >
                <a
                    name=""
                    id=""
                    class="btn btn-warning"
                    href="pdf.php"
                    role="button"
                    >Download PDF</a
                >
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
