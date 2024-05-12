<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTables Example</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
</head>
<body>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>About</th>
                <!-- Add more columns if needed -->
            </tr>
        </thead>
        <tbody>
            <?php
            require_once('get_data.php');
            $dataTable = new DataTable();
            $data = $dataTable->getData();
            print_r($data);
            foreach ($data as $row) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['full_name']}</td>";
                echo "<td>{$row['about_me']}</td>";
                // Add more columns if needed
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>
</html>
