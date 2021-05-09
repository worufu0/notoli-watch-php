<?php
class User extends Controller
{
    public $prod;
    public $cart;
    public function __construct()
    {
        $this->user = $this->model("UserModel");
        $this->request = new Request();
    }
    public function Action()
    {
        if (!isset($_SESSION['loggedINAdmin'])) {
            $location = "./login";
            header("Location: " . $location);
            exit();
        }
        $listUser = '';
        if ($this->request->isPost('idDel')) {
            $idDel = $this->request->getPost('idDel');
            $this->user->DeleteUser($idDel);
        }
        if ($this->request->isQuery('search')) {
            $valSearch = $this->request->getQuery('search');
            $listUser = $this->user->SearchUsers($valSearch);
        } else {
            $listUser = $this->user->ShowUsers();
        }
        $this->view("AdminLayout", [
            "page" => "User",
            "listUsers" => $listUser,
        ]);
    }
}
