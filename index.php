<?php
include "db_conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body class="w-full h-screen">
    <?php
    if (isset($_GET['msg'])) {
        $msg = $_GET['msg'];
        echo $msg;
    }
    ?>
    <p class="mt-5 text-2xl font-bold text-center">Welcome to CRUD</p>
    <button class="bg-black text-white font-bold ml-10 mt-10 mb-5 p-2 rounded-full" onclick="window.location.href='add_new.php'">Add New</button>
    <div class="mx-10">
        <table class="border-collapse border border-slate-400 w-full">
            <thead class="bg-black text-white font-bold">
                <tr class="text-center">
                    <th>ID</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM crud";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr class="text-center">
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['last_name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td class="flex gap-3">
                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="text-blue-500">Edit</a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>" class="text-red-500">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

<script src="https://cdn.tailwindcss.com"></script>

</html>