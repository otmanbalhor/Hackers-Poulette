<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../dist/output.css" rel="stylesheet">
    <title>login</title>
</head>

<body class="font-sans bg-gray-100">
    <header class="mb-10 w-full flex-col">
        <nav class="bg-blue-600 w-full">
            <div class="pr-4 mx-auto w-full">
                <div class="flex justify-end items-center py-4 gap-x-8">
                    <a href="http://localhost/Hackers-Poulette/index.php"
                        class="text-white font-bold hover:text-gray-300">Home</a>
                    <a href="#" class="text-white font-bold hover:text-gray-300">Log Out</a>
                </div>
            </div>
        </nav>
    </header>

    <main class="flex justify-center">

        <form class="shadow-md shadow-gray-500 rounded-lg bg-gray-200 w-2/6 p-8 mb-24" method="post">
            <div class="flex justify-center">
                <h1 class="text-3xl font-bold text-gray-700">LOG IN</h1>
            </div>

            <?php
            session_start();
            include "connexion.php";

            if (isset($_POST["connect"])) {
                if (isset($_POST["username"]) && isset($_POST["password"])) {

                    $usernam = htmlspecialchars($_POST["username"]);
                    $pwd = sha1($_POST["password"]);

                    $recupUse = $bdd->prepare('SELECT * FROM login WHERE username = :username AND password = :password');
                    $recupUse->execute(array('username' => $_POST['username'], 'password' => $_POST['password']));
                    $count = $recupUse->rowCount();
                    if ($count > 0) {

                        $_SESSION['username'] = $_POST['username'];
                        header('location:dashboard.php');
                    } else { ?>
                        <div class='bg-red-200 p-2 w-full rounded my-5'>
                            <p class='text-red-700'>
                                <?php echo 'Username or password is wrong'; ?>
                            </p>
                        </div>
                    <?php }
                }
            } ?>


            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Username:</label>
            </div>

            <div>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text" name="username" id="usernameInput" placeholder="Userame">
            </div>

            <div class='mt-4'>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="firstname">Password:</label>
            </div>

            <div>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="password" id="pwdInput" name="password" placeholder="Password">
            </div>

            <div class='flex justify-center mt-4'>
                <button class="rounded text-white bg-blue-600 hover:bg-blue-800 font-bold py-2 px-4"
                    name="connect">Connect</button>
            </div>

        </form>
    </main>
</body>

</html>