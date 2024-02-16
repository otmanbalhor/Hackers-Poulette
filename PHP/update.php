<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="../dist/output.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body class="h-full">
    <header>
        <nav class="bg-blue-600">
            <div class="pr-4 mx-auto">
                <div class="flex justify-end items-center py-4 gap-x-8">
                    <a href="http://localhost/Hackers-Poulette/index.php" class="text-white font-bold hover:text-gray-300">Home</a>
                    <a href="http://localhost/Hackers-Poulette/PHP/login.php" class="text-white font-bold hover:text-gray-300">Log In</a>
                </div>
            </div>
        </nav>
    </header>
    <div class='bg-gray-100 flex items-center justify-center h-screen'>
        <div class='bg-white shadow-md rounded px-8 pt-4 pb-4'>
            <h1 class='text-center text-m mb-2 font-roboto'>Made a mistake? No worries! Edit your form entries.</h1>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";

            try {
                $dsn = "mysql:host=$servername;dbname=hackers-poulette";
                $bdd = new PDO($dsn, $username, $password);
                $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Error" . $e->getMessage();
                exit();
            }

            $requetesql = "SELECT * FROM contact_support";
            $requete = $bdd->query($requetesql);
            ?>
        </div>
    </div>
    </div>
</body>

</html>