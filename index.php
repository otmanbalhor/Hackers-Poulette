<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple Tailwind CSS</title>
    <link href="./src/output.css" rel="stylesheet">
    <title>Hackers Poulette</title>
</head>
<body>
    <header class="flex justify-center">
        <h1 class="text-3xl font-bold underline">Contact support</h1>
    </header>

    <main class="flex justify-center" >
   
        <form action="add.php" method="post">
            <div>
                <label for="name">Name:</label>
            </div>

            <div>
                <input type="text" placeholder="Name">
            </div>

            <div>
                <label for="firstname">Firstname:</label>
            </div>
            <div>
                <input type="text" placeholder="firstname">
            </div>

            <div>
                <label for="email">Email:</label>
            </div>
            <div>
                <input type="email" placeholder="email">
            </div>

    
            <div>
                <input type="file" name="file" id="" accept="image/png, image/jpeg, image/gif">
            </div>

            <div>
                <label for="">Description</label>
            </div>
            <div>
                <input type="text" placeholder="description">
            </div>
            <div>
                <button name="ok">Submit</button>
            </div>
        </form>
    </main>
</body>
</html>