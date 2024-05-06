<?php
require_once '../functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        input {
            height: 5px;
            width: 100px;
            padding: 2px;
        }
    </style>
</head>
<body>
    <?php
    $collection = new Database("Lab10");
    $contacts = $collection->findAll("Contacts");
    $id = "65702b933e856804210a4703";
    $result = $collection->findById("Contacts", $id);
    ?>
    <div class="row">
        <div  class="col-6">
            <form>
                <?php
                foreach ($result as $rs)
                ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name:</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value="<?=$rs['name']?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" value="<?=$rs['email']?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Number</label>
                    <input type="text" class="form-control" id="exampleInputPassword2" value="<?=$rs['number']?>">
                </div>
                <button type="button" class="btn btn-primary" id="clearButton">Clear</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
        <div  class="col-6">
            <table id="contactTable" class="table">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Number</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($contacts as $contact) {
                    ?>
                    <tr class="selectable-row">
                        <th><?=$contact['name']?></th>
                        <th><?=$contact['email']?></th>
                        <th><?=$contact['number']?></th>
                    </tr>
                <?php
                }
                ?>

                </tbody>
            </table>
            <button type="button" id="selectButton">Select</button>
            <button type="button" id="deleteButton">Delete</button>
        </div>
    </div>


</body>
<!-- Include jQuery - see http://jquery.com -->
<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Are you sure?');
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var rows = document.querySelectorAll("#contactTable tbody tr");

        // Function to handle row selection
        function handleRowSelection() {
            rows.forEach(function (row) {
                row.addEventListener("click", function () {
                    // Toggle selected class for visual indication
                    this.classList.toggle("selected");

                    // Display information about the selected row in the form
                    displaySelectedRowInfo();
                });
            });
        }
        function displaySelectedRowInfo() {
            var selectedRow = document.querySelector("#contactTable tbody tr.selected");

            if (selectedRow) {
                // Get data from the selected row
                var name = selectedRow.cells[0].textContent;
                var email = selectedRow.cells[1].textContent;
                var number = selectedRow.cells[2].textContent;

                // Update the form fields with the selected data
                document.getElementById("exampleInputEmail1").value = name;
                document.getElementById("exampleInputPassword1").value = email;
                document.getElementById("exampleInputPassword2").value = number;
            } else {
                // If no row is selected, clear the form fields
                clearForm();
            }
        }
        displaySelectedRowInfo();

        // Function to handle clearing selected rows
        function clearSelectedRows() {
            rows.forEach(function (row) {
                row.classList.remove("selected");
            });
        }

        // Function to handle selecting a row and populating the form
        function handleSelectButton() {
            var selectedRow = document.querySelector("#contactTable tbody tr.selected");

            if (selectedRow) {
                // Get data from the selected row
                var name = selectedRow.cells[0].textContent;
                var email = selectedRow.cells[1].textContent;
                var number = selectedRow.cells[2].textContent;

                // Update the form fields with the selected data
                document.getElementById("exampleInputEmail1").value = name;
                document.getElementById("exampleInputPassword1").value = email;
                document.getElementById("exampleInputPassword2").value = number;
            } else {
                alert("Please select a row before clicking Select.");
            }
        }

        // Function to handle deleting selected rows
        function handleDeleteButton() {
            var selectedRows = document.querySelectorAll("#contactTable tbody tr.selected");

            if (selectedRows.length > 0) {
                // Remove selected rows from the table
                selectedRows.forEach(function (row) {
                    row.remove();
                });

                // Clear the form after deletion
                clearForm();
            } else {
                alert("Please select rows to delete.");
            }
        }

        // Function to clear the form fields
        function clearForm() {
            document.getElementById("exampleInputEmail1").value = "";
            document.getElementById("exampleInputPassword1").value = "";
            document.getElementById("exampleInputPassword2").value = "";
        }

        // Add click event listener to each row for selection
        handleRowSelection();

        // Add click event listener to the Clear button
        document.getElementById("clearButton").addEventListener("click", clearSelectedRows);

        // Add click event listener to the Select button
        document.getElementById("selectButton").addEventListener("click", handleSelectButton);

        // Add click event listener to the Delete button
        document.getElementById("deleteButton").addEventListener("click", handleDeleteButton);
    });
</script>

</html>