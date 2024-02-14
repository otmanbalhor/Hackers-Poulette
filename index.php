<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./dist/output.css" rel="stylesheet">
    <title>Hackers Poulette</title>
    <script src="JS/main.js"></script>
</head>

<body class="font-sans bg-gray-100">
    <header class="mb-10 w-full flex-col">
        <nav class="gap-x-8 bg-black w-full h-10 text-white flex justify-end px-2">
            <a href="#">Accueil</a>
            <a href="#">Blog</a>
            <a href="#">Contact</a>
        </nav>
    </header>

    <main class="flex justify-center">

        <form class="shadow-md shadow-gray-500 rounded-lg bg-gray-200 w-2/6 p-8 mb-24" action="" method="post" enctype="multipart/form-data">
            <div class="flex justify-center">
                <h1 class="text-3xl font-bold text-gray-700">CONTACT SUPPORT</h1>
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name:</label>
            </div>

            <div>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="name" id="nameInput" placeholder="Name" required>
            </div>

            <div class='mt-4'>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="firstname">Firstname:</label>
            </div>
            <div>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="firstnameInput" name="firstname" placeholder="Firstname" required>
            </div>

            <div class='mt-4'>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email:</label>
            </div>
            <div>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="email" id="emailInput" name="email" placeholder="Email" required>
            </div>

            <div class="mt-4">

                <input type="hidden" name="MAX_FILE_SIZE" value="2147483648" />
                <label for="img_name" class="block text-sm font-bold text-gray-700 mb-2">Choose a file:</label>
                <div class="flex items-center">
                    <label for="img_upload"class="flex items-center justify-center px-4 py-2 bg-gray-500 text-white rounded-md cursor-pointer hover:bg-gray-700 transition duration-300">Choose a file
                        <input id="img_upload" type="file" name="img_name" accept="image/png, image/jpeg, image/gif" class="hidden" required>
                    </label>
                </div>
            </div>

            <div class='mt-4'>
                <label class="block text-gray-700 ext-smt font-bold mb-2" for="description">Description</label>
            </div>
            <div>
                <textarea class="shadow appearance-none border rounded w-full pb-10 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="descriptionInput" placeholder="Description" name="descri" required></textarea>
            </div>
            <div class="mt-4">
                <img class='mb-4' src="PHP/captcha.php">
                <input placeholder="Captcha" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="captcha" required />
            </div>
            <div class='flex justify-center mt-4'>
                <button class="rounded text-white bg-green-500 hover:bg-green-700 font-bold py-2 px-4" name="ok">Submit</button>
            </div>
        </form>
    </main>
</body>



</html>

<?php

include "PHP/connexion.php";

session_start();

if (isset($_POST["captcha"]) && isset($_POST["ok"])) {

    if ($_POST["captcha"] == $_SESSION['captcha']) {

        if ($_FILES['img_name']['error'] === UPLOAD_ERR_OK) {

            $tempFilePath = $_FILES['img_name']['tmp_name'];

            $imageData = file_get_contents($tempFilePath);

            $name = isset($_POST["name"]) ? $_POST["name"] : null;
            $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : null;
            $email = isset($_POST['email']) ? $_POST['email'] : null;
            $img_name = $imageData;
            $description = isset($_POST['descri']) ? $_POST['descri'] : null;

            $req = $bdd->prepare("INSERT INTO contact_support(name,firstname,email,img_nom,description) VALUES(?,?,?,?,?)");

            $req->execute(array($name, $firstname, $email, $img_name, $description));

            header("location:PHP/add.php");
            exit();
        }
    } else {
        echo "<div class='flex justify-center'><p>captcha invalide !</p></div>";
    }

}

?>