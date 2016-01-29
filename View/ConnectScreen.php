
 <?php
 /*
 * Created by PhpStorm.
 * User: Pierre
 * Date: 24/12/2015
 * Time: 13:18
 */
 ?>
<html>

<head>

    <meta charset="UTF-8">
    <title>Connexion Admin</title>
    <link href="bootstrap-3.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap-3.3.6/docs/examples/signin/signin.css" rel="stylesheet">
</head>
<body>

<div class="container">

        <form class="form-signin" method="POST" action="Index.php?action=connection">
            <h2 class="form-signin-heading">Connexion Membre</h2>
            <label for="inputEmail" class="sr-only">Login</label>
            <input type="text" name="inputLogin" id="inputLogin" class="form-control" placeholder="login" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
        </form>

    </div>
</body>
</html>