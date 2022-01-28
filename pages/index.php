<?php
include 'C:\xampp\htdocs\Registration\php\connection.php';
$firstname = "";
$lastname = "";
$email = "";
$password = "";
$id = 0;
$update = false;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $update = true;
    $sql = "SELECT * FROM users WHERE id=" . $id;

    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $email = $row['email'];
        $password = $row['password'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" type="text/css" href="/Registration/css/style.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
    <div class="wrapper">
        <div class="heading">
            <h1>User Registration</h1>
        </div>
        <form method="post" class="input_form" action="index.php">
            <?php if (isset($_GET['firstnameerror'])) { ?>
                <p><?php echo $_GET['firstnameerror']; ?></p>
            <?php } ?>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="text" name="firstname" id="firstname" class="task_input" value="<?php echo $firstname; ?>" placeholder="Enter firstname"><br>
            <?php if (isset($_GET['lastnameerror'])) { ?>
                <p><?php echo $_GET['lastnameerror']; ?></p>
            <?php } ?>
            <input type="text" name="lastname" id="lastname" class="task_input" value="<?php echo $lastname; ?>" placeholder="Enter lastname"><br>
            <?php if (isset($_GET['emailerror'])) { ?>
                <p><?php echo $_GET['emailerror']; ?></p>
            <?php } ?>
            <input type="text" name="email" id="email" class="task_input" value="<?php echo $email; ?>" placeholder="Enter email"><br>
            <?php if (isset($_GET['passworderror'])) { ?>
                <p><?php echo $_GET['passworderror']; ?></p>
            <?php } ?>
            <input type="text" name="password" id="password" class="task_input" value="<?php echo $password; ?>" placeholder="Enter password"><br>
            <?php
            if ($update == true) :
            ?>
                <button type="submit" name="update" id="add_btn" class="add_btn" formaction="../php/edit.php">Update</button>
            <?php else : ?>
                <button type="submit" name="submit" id="add_btn" class="add_btn" formaction="../php/register.php">Add Task</button>
            <?php endif; ?>

        </form>
        <hr>

        <table>
            <thead>
                <tr>
                    <th>Sr. No</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $sql = "SELECT * FROM users";
                $result = mysqli_query($con, $sql);

                if ($result) {
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $firstname = $row['firstname'];
                        $lastname = $row['lastname'];
                        $email = $row['email'];
                        $password = $row['password'];
                ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $firstname  ?></td>
                            <td><?php echo $lastname  ?></td>
                            <td><?php echo $email  ?></td>
                            <td><?php echo $password  ?></td>
                            <td class="edit_delete">
                                <a class="btn-success" href="index.php?id=<?php echo $id ?>"> <i class='fas fa-pencil-alt' style="margin-right: 10px;"></i>Edit</a>

                                <a class="btn-danger" href="../php/delete.php?id=<?php echo $id ?>"> <i class='fas fa-trash-alt' style="margin-right: 10px;"></i>Delete</a>
                            </td>

                        </tr>

                <?php

                        $i++;
                    }
                }
                ?>

            </tbody>
        </table>
    </div>
</body>

</html>