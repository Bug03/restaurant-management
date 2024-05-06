<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="./addContacts.php" method="POST">
        <input type="hidden" name="collectionName" value="Contacts"> 
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        
        <label for="email">Email:</label>
        <input type="text" name="email" required>
        
        <label for="phone">Phone:</label>
        <input type="text"  name="number" required>
        
        <button type="submit">Thêm </button>
    </form>
</body>
</html>