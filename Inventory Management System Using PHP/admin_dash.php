<?php
include 'db.php';
if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
    header("Location: login.php");
    exit;
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
                <div class="alert alert-info d-flex justify-content-between">
                <h2>Welcome, <?php echo $_SESSION["username"] ?> (admin)</h2>
                <div>
                    <a
                        name=""
                        id=""
                        class="btn btn-primary"
                        href="logout.php"
                        role="button"
                        >Logout</a
                    >
                    
                </div>
            </div>
            </div>
            <div
                class="container my-2"
            >
                <div
                    class="row justify-content-center align-items-center g-2"
                >
                    <div class="col">
                        <div class="card">
                            <div class="card-header bg-primary text-white">Product Management</div>
                            <div class="card-body">
                                <ul>
                                    <li><a href="add_product.php">Add New Product</a></li>
                                    <li><a href="view_products.php">View/Edit/Delete Product</a></li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-header bg-secondary text-white">User Management</div>
                            <div class="card-body">
                                <ul>
                                    <li><a href="view_users.php">View Registered User</a></li>
                                    <li><a href="delete_user.php">Manage User</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div
                class="container my-2"
            >
                <div
                    class="row justify-content-center align-items-center g-2"
                >
                    <div class="col">
                        <div class="card">
                            <div class="card-header bg-success text-white">Inventory Summary</div>
                            <div class="card-body">
                                <ul>
                                    <li><a href="low_stock.php">Low Stock Alert</a></li>
                                    <li><a href="report.php">Inventory Report</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-header bg-warning text-white">Orders</div>
                            <div class="card-body">
                                <ul>
                                    <li><a href="create_order.php">Create New Order</a></li>
                                    <li><a href="view_purchase_orders.php">View Purchase Orders</a></li>
                                    <li><a href="view_sale_orders.php">View Sale Orders</a></li>
                                </ul>
                            </div>
                        </div>
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
