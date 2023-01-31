<?php
require_once 'lib/ViewLoader.php';
require_once 'model/Model.php';
require_once 'lib/LoginValidation.php';
require_once 'lib/UserFormValidator.php';
/**
 * Main controller for store application.
 *
 * @author ProvenSoft
 */
class MainController {
    /**
     * @var Model $model. The model to provide data services. 
     */
    private Model $model;
    /**
     * @var ViewLoader $view. The loader to forward views. 
     */
    private ViewLoader $view;
    /**
     * @var string $action. The action requested by client. 
     */
    private string $action;
    
    public function __construct() {
        //instantiate the view loader.
        $this->view = new ViewLoader();
        //instantiate the model.
        $this->model = new Model();
    }
    
    /**
     * processes requests made by client.
     */
    public function processRequest() {
        $requestMethod = filter_input(INPUT_SERVER, 'REQUEST_METHOD');          
        switch ($requestMethod) {
            case 'GET':
            case 'get':
                $this->processGet();
                break;
            case 'POST':
            case 'post':
                $this->processPost();
                break;
            default:
                $this->processError();
                break;
        }
    } 
    
    /**
     * processes get request made by client.
     */
    private function processGet() {
        $this->action = "";
        if (filter_has_var(INPUT_GET, 'action')) {
            $this->action = filter_input(INPUT_GET, 'action'); 
        }
        switch ($this->action) {
            case 'home':  //home page.
                $this->doHomePage();
                break;
            case 'login/form':
                $this->doLoginform();
                break;
            case 'logout':
                $this->doLogout();
                break;
            case 'user/listAll':
                $this->doListAllUsers();
                break;
            case 'user/form':
                $this->doUserForm();
                break;
            default:  //processing default action.
                $this->doHomePage();
                break;
        }
    }
    
    /**
     * processes post request made by client.
     */
    private function processPost() {
       $this->action = "";
       if (filter_has_var(INPUT_POST, 'action')) {
            $this->action = filter_input(INPUT_POST, 'action'); 
        }
        switch ($this->action) {
            case 'user/login':
                $this->doLogin();
                break;
            case 'user/add':
                $this->doAddUser();
                break;
			case 'user/find':
				$this->doFindUser();
				break;
			case 'user/modify':
				$this->doModUser();
				break;
			case 'user/remove':
				$this->doDelUser();
				break;
            default:  //processing default action.
                $this->doHomePage();
                break;
        }        
    }    
 
    /**
     * processes error.
     */
    private function processError() {
        trigger_error("Bad method", E_USER_NOTICE);
    }      

    private function doHomePage(){
        $this->view->show('home.php');
    }

    private function doLogout(){
        $this->view->show('logout.php');
    }

    private function doLoginform(){
        $login = LoginFormValidation::getData();
        $data['login'] = $login;
        $this->view->show('login-form.php',$data);
    }

    public function doLogin(){
        $login = LoginFormValidation::getData();
        $data['login'] = $login;
        $username = $login[0];
        $valido = $this->model->validate($data['login']);
        $data['correcto'] = $valido;
        if(!empty($valido)){
            $age = $valido[1];
            $_SESSION['username'] = $username;
            $_SESSION["age"] = $age;
            header("Location: index.php");
        }else{
            var_dump("no");
            $this->view->show('login.php',$data);
        }
    }

    private function doListAllUsers(){
        $userList = $this->model->searchAllUsers();
        if(!is_null($userList)){
            $data['userList'] = $userList;
            $this->view->show('user/list-users.php',$data);
        }else{
            $data['message'] = 'null data ';
            $this->view->show('user/list-users.php',$data);
        }
    }

    private function doUserForm(){
        $this->view->show('user/user-form.php');
    }

	/**
	 * Adds a user controller
	 */
    public function doAddUser() {
		try {
			$user = UserFormValidation::getData();
		} catch (Exception $th) {
			$result = $th->getMessage();
		}

		if (isset($result)) {
			$data['result'] = $result;
			$this->view->show('form-users.php', $data);
		} else {
			$result= $this->model->addUser($user);
            if ($result>0) {
                $result = "User successfully added";
			} else {
                $result = "Error adding user";
			}

			$data['result'] = $result;
			$this->view->show('user/user-form.php', $data);
		}
	}

    public function doFindUser() {
        $user = UserFormValidation::getData();
        $result = null;
        if (is_null($user)) {
            $result = "Error reading user";
        } else {
            $userFound = $this->model->searchUserByUsername($user->getUsername());
            if (!is_null($userFound)) {
                //pass data to template.
                $data['user'] = $userFound;
                $data['action'] = "change";
            } else {
                $result = "user not found";
            }            
        }
        //pass data to template.
        $data['result'] = $result;
        //show the template with the given data.
        $this->view->show("user/user-form.php", $data);         
    }

}
