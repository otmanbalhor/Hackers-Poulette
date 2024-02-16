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
            <h1 class='text-center text-m mb-2 font-roboto'>Pending messages:</h1>
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
            <div class="rounded overflow-hidden">
                <table class="min-w-full">
                    <thead class='bg-blue-600 p-4'>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Name:</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">First name:</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">E-mail:</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Attachments:</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Description:</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Action:</th>
                        </tr>
                    </thead>
                    <tbody>
            </div>

            <?php
            $rowColor = "bg-gray-100";
            while ($response = $requete->fetch()) {
                echo "<tr class='$rowColor hover:bg-blue-200'>";
                echo "<td class='px-6 py-3 whitespace-nowrap'>" . $response['name'] . "</td>";
                echo "<td class='px-6 py-3 whitespace-nowrap'>" . $response['firstname'] . "</td>";
                echo "<td class='px-6 py-3 whitespace-nowrap'>" . $response['email'] . "</td>";
                echo "<td class='px-6 py-3 whitespace-nowrap'>" . "lorem ipsum" . "</td>";
                echo "<td class='px-6 py-3 whitespace-nowrap'>" . $response['description'] . "</td>";
                echo "<td class='px-6 py-3 whitespace-nowrap'>" . "<form action='delete.php' method='post'><button type='submit' name='id' value='" . $response['id'] . "' class='rounded text-white bg-red-600 hover:bg-red-500 font-bold py-2 px-4'>Delete</button></form></td>";
                echo "</tr>";

                $rowColor = $rowColor === "bg-gray-100" ? "bg-gray-300" : "bg-gray-100";
            }
            ?>

            </tbody>
            </table>
            <button class='mt-4 text-m rounded text-white bg-blue-600 hover:bg-blue-500 font-bold py-2 px-4 justify-center block mx-auto'>Log out</button>
        </div>
    </div>
    </div>
</body>

</html>