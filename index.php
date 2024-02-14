<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./dist/output.css" rel="stylesheet">
    <title>Hackers Poulette</title>
</head>
<body class="bg-gray-200">
    <header class="mb-10 w-full flex-col">
        <nav class="bg-black w-full h-10 text-white flex justify-end px-2">
            <a href="#">Accueil</a>
            <a href="#">Blog</a>
            <a href="#">Contact</a>
        </nav>
        <div class="flex justify-center">
            <h1 class="text-3xl font-bold underline text-gray-800">Contact support</h1>
        </div>
            
    </header>

    <main class="flex justify-center">
   
        <form class="border-double border-4 border-gray-900 p-5" action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="name">Name:</label>
            </div>

            <div>
                <input type="text" name="name" placeholder="Name" required>
            </div>

            <div>
                <label for="firstname">Firstname:</label>
            </div>
            <div>
                <input type="text" name="firstname" placeholder="firstname" required>
            </div>

            <div>
                <label for="email">Email:</label>
            </div>
            <div>
                <input type="email" name="email" placeholder="email" required>
            </div>

    
            <div>
                <!--défini la taille maximale des fichiers pouvant être téléchargés-->
                <input type="hidden" name="MAX_FILE_SIZE" value="2147483648"/> 
                <input type="file" name="img_name" size=50 id="" accept="image/png, image/jpeg, image/gif" required>
            </div>

            <div>
                <label for="description">Description</label>
            </div>
            <div>
                <input type="text" placeholder="description" name="descri" required>
            </div>
            <div>
                <button class="border border-4 border-gray-900 p-1" name="ok">Submit</button>
            </div>
        </form>
    </main>
</body>
</html>

<?php

include "PHP/connexion.php";

if(isset($_POST["ok"])){

    if ($_FILES['img_name']['error'] === UPLOAD_ERR_OK) {

        $tempFilePath = $_FILES['img_name']['tmp_name'];
    
        $imageData = file_get_contents($tempFilePath);

        $name = isset($_POST["name"]) ? $_POST["name"] :null;
        $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $img_name = $imageData;
        $description = isset($_POST['descri']) ? $_POST['descri'] : null;

        $req=$bdd->prepare("INSERT INTO contact_support(name,firstname,email,img_nom,description) VALUES(?,?,?,?,?)");

        $req->execute(array($name, $firstname, $email, $img_name, $description));

        header("location:PHP/add.php");
        exit();
    }

}
?>