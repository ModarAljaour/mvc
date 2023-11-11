<?php
// var_dump($_GET);
// echo '<pre>';
// print_r($users);
// echo '</pre>';
foreach ($users as $user) {
    $username = $user["username"];
    $password = $user["password"];
    $role = $user["role"];
}
?>
<h2>Edit</h2>
<form method="post" action="update?id=<?= $_GET["id"] ?>">
    <input type="text" name="username" placeholder="User Name" required value="<?= $username ?>">
    <input type="password" name="password" placeholder="Password" required value="<?= $password ?>">
    <select name="role" id="">
        <?php
        if ($role == 0) {
        ?>
            <option value="0">user</option>
            <option value="1">admin</option>
        <?php
        } else {
        ?>
            <option value="1">admin</option>
            <option value="0">user</option>
        <?php
        }
        ?>
    </select><br><br>
    <button type="submit">Update</button>
</form>