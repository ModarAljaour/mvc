<?php
// app/controllers/UserController.php
namespace app\controllers;

// use UserModel\UserModel;

class UserController
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $users = $this->model->getUsers();

        include 'app/views/user_list.php';
    }

    public function getUserByID()
    {
        $userInfo = $this->model->getUserByID($_GET['id']);

        include 'app/views/user_show.php';
    }

    // public function showUsers(){
    //     $users = $this->model->getUsers();
    //     include 'app/views/user_show.php';
    // }
    // .................  A D D   .......................
    public function addUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $username = $_POST['username'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            $data = [
                'username' => $username,
                'password' => $password,
                'role' => $role
            ];

            if ($this->model->addUser($data)) {
?>
                <script>
                    alert('User added successfully!')
                </script>
            <?php
                header("REFRESH:0; URL=" . BASE_PATH);
            } else {
                echo "Failed to add user.";
            }
        }
    }
    // .................U p d a t e .......................
    public function updateUser()
    {
        $users = $this->model->getUserByID($_GET['id']);

        include 'app/views/user_update.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $username = $_POST['username'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            $data = [
                'username' => $username,
                'password' => $password,
                'role' => $role
            ];

            if (!$this->model->updateUser($data, $_GET['id'])) {
            ?>
                <script>
                    alert('User updated successfully!')
                </script>
        <?php
                header("REFRESH:0; URL=" . BASE_PATH);
            } else {
                echo "Failed to edit user.";
            }
        }
    }
    // .................D e l e t e .......................
    public function deleteUser()
    {
        $this->model->deleteUser($_GET["id"]);
        ?>
        <script>
            alert('User deleted successfully!')
        </script>
<?php
        header("REFRESH:0; URL=" . BASE_PATH);
    }
}
