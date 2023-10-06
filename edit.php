<?php
include "db_conn.php";
$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $sql = "UPDATE `crud` SET `first_name`='$first_name', `last_name`='$last_name', `email`='$email', `gender`='$gender'
    WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: index.php");
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>

<body class="w-full h-screen">
    <div class="w-[500px] m-auto">
        <p class="text-center text-2xl my-5 font-bold">Edit Data</p>
        <p class="text-center mb-5">Click update after changing any information</p>

        <?php
        $sql = "SELECT * FROM crud WHERE id=$id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>

        <form action="" method="post">
            <div class="flex gap-5 my-2 justify-between">
                <label for=" first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" value="<?php echo $row['first_name'] ?>" class="border border-2 border-gray-500 w-[350px]">
            </div>
            <div class="flex gap-5 my-2 justify-between">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name" value="<?php echo $row['last_name'] ?>" class="border border-2 border-gray-500 w-[350px]">
            </div>
            <div class="flex gap-5 my-2 justify-between">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?php echo $row['email'] ?>" class="border border-2 border-gray-500 w-[350px]">
            </div>
            <div class="flex my-2 justify-between">
                <div>
                    <label for="">Gender</label>
                </div>
                <div>
                    <input type="radio" name="gender" id="male" value="male" <?php echo ($row['gender'] == 'male') ? "checked" : "" ?>>
                    <label for="male">Male</label>
                </div>
                <div>
                    <input type="radio" name="gender" id="female" value="female" <?php echo ($row['gender'] == 'female') ? "checked" : "" ?>>
                    <label for="female">Female</label>
                </div>
            </div>
            <div class="flex justify-between mt-5">
                <button type="submit" name="submit" class="bg-green-500 p-3 rounded-full text-white w-[80px] font-bold">Update</button>
                <a class="bg-red-500 p-3 rounded-full text-white w-[80px] font-bold text-center" href='index.php'">Cancel</a>
            </div>
        </form>
    </div>
</body>

<script src=" https://cdn.tailwindcss.com"></script>

</html>