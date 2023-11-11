<h2>User Information</h2>
<?php
// echo '<pre>';
// print_r($userInfo);
// echo '</pre>';
echo 'Name : ' . $userInfo[0]["username"] . "<br><br>";
echo 'Password : ' . $userInfo[0]["password"] . "<br><br>";
if ($userInfo[0]["role"] == 1) {
    echo "Role : Admin";
} else {
    echo "Role : User";
}
?>