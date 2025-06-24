<?php
include 'db.php';
if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
    header("Location: login.php");
    exit;
}
$sql = $conn -> query("select orders.id, product.name, orders.quantity, orders.date from orders join product on orders.product_id = product.id where orders.order_type='sale'");
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
                <h2>Sale Orders</h2>
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
                class="container my-2"
            >
                <div
                    class="table-responsive"
                >
                    <table
                        class="table table-bordered table-primary"
                    >
                        <thead class="table-dark">
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
