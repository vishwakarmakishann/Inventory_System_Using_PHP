<?php
include 'db.php';
if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "user") {
    header("Location: login.php");
    exit;
}
$username = $_SESSION["username"];
$totalProducts = $conn->query("select count(id) as count from product")->fetch_assoc()["count"];
$totalStock = $conn->query("select sum(quantity) as total from product")->fetch_assoc()["total"];

$sql = $conn -> query("select orders.id, product.name, orders.quantity, orders.date from orders join product on orders.product_id = product.id limit 3");

$lowStock = $conn -> query("select * from product where quantity < 5");
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
                <div class="alert alert-info d-flex justify-content-between">
                <h2>Welcome, <?php echo $_SESSION["username"] ?> (user)</h2>
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
                class="container"
             >
                <div
                    class="row justify-content-center align-items-center g-2"
                >
                    <div class="col">
                        <div class="card border-success">
                            
                            <div class="card-body text-center">
                                <h4 class="card-title">Total Products</h4>
                                <h2><?php echo $totalProducts ?></h2>
                                <a
                                    name=""
                                    id=""
                                    class="btn btn-info"
                                    href="user_view_products.php"
                                    role="button"
                                    >View Products</a
                                >
                                
                            </div>
                        </div>
                        
                    </div>
                    <div class="col">
                        <div class="card border-warning">
                            
                            <div class="card-body text-center">
                                <h4 class="card-title">Total Stock</h4>
                                <h2><?php echo $totalStock ?></h2>
                                <a
                                    name=""
                                    id=""
                                    class="btn btn-info"
                                    href="user_view_products.php"
                                    role="button"
                                    >View Products</a
                                >
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
                
             </div>
             <div
                class="container my-5"
            >
            <h4>Recent orders</h4>
                <div
                    class="table-responsive"
                >
                    <table
                        class="table table-bordered bg-white shadow"
                    >
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                
                                <th scope="col">Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <?php while($row=$sql->fetch_assoc()){ ?>
                        <tbody>
                            <tr class="">
                                <td> <?php echo $row["id"] ?> </td>
                                
                                <td> <?php echo $row["name"] ?> </td>
                                <td> <?php echo $row["quantity"] ?> </td>
                                <td> <?php echo $row["date"] ?> </td>
                            </tr>
                        </tbody>
                        <?php } ?>
                    </table>
                </div>
                <div>
                
                
            </div>

            </div>

            <div
                class="container my-5"
            >
                <h5>Low Stock Products</h5>
                <ul>
                <?php if($lowStock->num_rows > 0) {?>
                    <?php while ($row = $lowStock->fetch_assoc()) {?>
                        
                            <li class="alert alert-danger"><?php echo "Name: ".$row["name"].", Quantity: ".$row["quantity"]; ?></li>
                        
                    <?php } ?>
                <?php } ?>
                </ul>
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
