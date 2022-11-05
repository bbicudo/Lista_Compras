<?php

require "../vendor/autoload.php";

$login = NULL;
$password = NULL;
$message = NULL;

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["login"]) && !empty($_POST["password"])) {
    $login = test_input($_POST["login"]);
    $password = test_input($_POST["password"]);

    check_login($login, $password);
    if (check_login($login, $password)) {
        //@TODO start session and redirect user to another page.
    } else {
        $message = '<p class="text-white">Usuário e/ou senha incorretos!</p>';
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function check_login($login, $password) {
    $conn = new ListaCompras\database\DBOperations();

    $sql = "SELECT * FROM users WHERE user_login = ?";
    $params = ["$login"];

    $result = $conn->select($sql, $params);

    if (!empty($result)) {
        foreach ($result as $auth)
        if ($auth->user_password === $password) {
            return TRUE;
        }

        return FALSE;
    }

    return FALSE;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Lista de Requisições | Eiras</title>
        <!-- Custom styles -->
        <link href="/assets/css/signin.css" rel="stylesheet">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </head>
    <body class="text-center bg-dark">
        <main class="form-signin">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <img class="mb-4" src="/assets/images/logo-site.jpg" alt="" width="200" height="100">
                <h1 class="h3 mb-4 fw-normal text-white">Por favor faça Login:</h1>
            
                <div class="form-floating mb-4">
                    <input  name="login" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Login</label>
                </div>
                <div class="form-floating mb-4">
                    <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" >
                    <label for="floatingPassword">Senha</label>
                </div>

                <?php echo $message; ?>
            
                <button class="w-100 btn btn-lg btn btn-warning mb-5" type="submit">Entrar</button>
                <p class="mb-3 text-muted">© Eiras Engenharia 2022</p>
            </form>
        </main>
    </body>
</html>
