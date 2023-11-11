<!-- app/views/user_list.php -->
<!DOCTYPE html>
<html>

<head>
    <title>User List</title>
</head>

<body>
    <h1>User List</h1>
    <?php
    // var_dump($users) 
    ?>
    <ul>
        <?php foreach ($users as $user) { ?>
            <li>
                <?= $user['username']; ?>
                <br><br>
                <a href="show?id=<?= $user["id"] ?>"><button>Show</button></a>
                <a href="update?id=<?= $user["id"] ?>"><button>update</button></a>
                <a href="delete?id=<?= $user["id"] ?>"><button>delete</button></a>
                <br><br>
            </li>
        <?php } ?>
    </ul>
    <h2>Add User</h2>
    <form method="post" action="add">
        <input type="text" name="username" placeholder="User Name" required>
        <input type="password" name="password" placeholder="password" required>
        <select name="role" id="">
            <option value="0">user</option>
            <option value="1">admin</option>
        </select><br><br>
        <button type="submit">Add User</button>
    </form>
</body>

</html>