<?php
include 'db.php';
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $username = $_POST["username"];
    $pass = $_POST["pass"];

    $sql = $conn -> prepare("select id, password, role from signup where username =?");
    $sql -> bind_param("s", $username);
    $sql -> execute();
    $sql -> store_result();
    $sql -> bind_result($id, $password, $role);
    if($sql->fetch() && password_verify($pass, $password)){
        $_SESSION["username"]=$username;
        $_SESSION["user_id"]=$id;
        $_SESSION["role"]=$role;
        if($role=="admin"){
            header("Location:admin_dash.php");
        }
        else if($role=="user"){
            header("Location:user_dash.php");
        }
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
                class="container my-5 w-50"
            >
                <center><h2>Login</h2></center> <br>
                <form action="" method="post">
                <div class="form-floating mb-3">
                    <input
                        type="text"
                        class="form-control"
                        name="username"
                        id="formId1"
                        placeholder=""
                    />
                    <label for="formId1">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input
                        type="password"
                        class="form-control"
                        name="pass"
                        id="formId1"
                        placeholder=""
                    />
                    <label for="formId1">Password</label>
                </div>
                <button
                    type="submit"
                    class="btn btn-primary "
                >
                    Login
                </button>
                <a href="signup.php">Don't have an Account? SignUp!</a>
            </form>
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
