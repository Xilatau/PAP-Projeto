<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactos</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Entre em contacto</h1>
        <form action="mail.php" method="POST">
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
            <label for="subject">Assunto:</label>
            <input type="text" name="subject" id="subject">
            <label for="message">Mensagem</label>
            <textarea name="message" cols="30" rows="10"></textarea>
            <input type="submit" value="Enviar">
        </form>
    </div>
</body>
</html>