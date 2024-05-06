<?php
require_once '../functions.php';
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $collection = new Database("Lab10");
    $result = $collection->findById("Contacts", $id);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="./updateContacts.php" method="POST">
    <?php
        foreach($result as $rs) 
            ?>
            <input type="hidden" name="collectionName" value="Contacts"> 
            <input type="hidden" name="_id" value = "<?=$rs['_id']?>">
            <label for="name">Name:</label>
            <input type="text" name="name" value = "<?=$rs['name']?>" required>
            <label for="email">Email:</label>
            <input type="text" name="email" value = "<?=$rs['email']?>" required>
            <label for="phone">Phone:</label>
            <input type="text" name="number" value = "<?=$rs['number']?>" required>
             <button type="submit">Cập nhật </button>
</form>
</body>
</html>