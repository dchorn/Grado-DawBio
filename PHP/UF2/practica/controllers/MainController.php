<?php
require_once 'lib/ViewLoader.php';
require_once 'model/Model.php';
require_once 'lib/LoginFormValidation.php';
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
            case 'product/listAll': //list all products.
                $this->doListAllProducts();
                break;
            case 'user/listAll':
                $this->doListAllUsers();   //list all users.
                break;
            case 'product/form':
                $this->doProductForm();   //show product form.
                break;
            case 'user/form':
                $this->doUserForm();   //show user form.
                break; 
            case 'login/form':
                $this->doLoginForm();   //show user form.
                break; 
            case 'logout':
                $this->doLogout();   //show user form.
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
            case 'home':  //home page.
                $this->doHomePage();
                break;
            case 'login':   //login.
                $this->doLogin();
                break;
            case 'product/add':   //add product.
                $this->doAddProduct();
                break;
            case 'product/modify':   //modify product.
                $this->doModifyProduct(); 
                break;
            case 'product/remove':   //remove product.
                $this->doRemoveProduct();   
                break;
            case 'user/search': //add user.
                $this->doSearchUser();
                break;
            case 'user/add': //add user.
                $this->doAddUser();
                break;
            case 'user/modify':   //modify user.
                $this->doModifyUser();   
                break;
            case 'user/remove':   //remove user.
                $this->doRemoveUser();   
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

    /**
     * displays home page content.
     */
    private function doHomePage() {
        $this->view->show("home.php", []);
    }    
    
    /**
     * gets all users and displays them in a proper way.
     */
    private function doListAllUsers() {
        $userList = $this->model->searchAllUsers();
        if (!is_null($userList)) {
            $data["userList"] = $userList;
            $this->view->show("user/list-users.php", $data);
        }
    }
    
    /**
     * displays user form
     */
    private function doUserForm() {
        $this->view->show("user/user-form.php", ['action'=>'user/form']);
    }

    
    /**
     * displays login form
     */
	private function doLoginForm() {
		$login = LoginFormValidation::getData();
		$data['login'] = $login;
        $this->view->show("login-form.php", $data);
    }

    public function doLogin(){
        $login = LoginFormValidation::getData();
        $data['login'] = $login;
        $username = $login[0];
        $valido = $this->model->validate($data['login']);
        $data['correcto'] = $valido;
        if(!empty($valido)){
            $rol = $valido[1];
            $_SESSION["rol"] = $rol;
            $_SESSION['username'] = $username;
            header("Location: index.php");
        }else{
            var_dump("no");
            $this->view->show('login.php',$data);
        }
    }

    /**
     * performs logout
     */
    private function doLogout() {
        //TODO
        $data['message'] = "No implemented yet!";
        $this->view->show("error-page.php", $data);
    }
 
    /**
     * displays product form
     */
    private function doProductForm() {
        //TODO
        $data['message'] = "No implemented yet!";
        $this->view->show("error-page.php", $data);
    }    

    /**
     * displays list of all products
     */
    private function doListAllProducts() {
        //TODO
        $data['message'] = "No implemented yet!";
        $this->view->show("error-page.php", $data);
    } 

    /**
     * adds product sent by product form
     */
    private function doAddProduct() {
        //TODO
        $data['message'] = "No implemented yet!";
        $this->view->show("error-page.php", $data);
    } 

    /**
     * modifies product sent by product form
     */
    private function doModifyProduct() {
        //TODO
        $data['message'] = "No implemented yet!";
        $this->view->show("error-page.php", $data);
    }
    
    /**
     * removes product sent by product form
     */
    private function doRemoveProduct() {
        //TODO
        $data['message'] = "No implemented yet!";
        $this->view->show("error-page.php", $data);
    }    

    /**
     * searches a user sent by user form
     */
    private function doSearchUser() {
        //TODO
        $data['message'] = "No implemented yet!";
        $this->view->show("error-page.php", $data);
    } 
    
    /**
     * adds a user sent by user form
     */
    private function doAddUser() {
		//TODO
        $data['message'] = "No implemented yet!";
        $this->view->show("error-page.php", $data);
    } 

    /**
     * modifies a user sent by user form
     */
    private function doModifyUser() {
        //TODO
        $data['message'] = "No implemented yet!";
        $this->view->show("error-page.php", $data);
    }
    
    /**
     * removes a user sent by user form
     */
    private function doRemoveUser() {
        //TODO
        $data['message'] = "No implemented yet!";
        $this->view->show("error-page.php", $data);
    }    
    
    
}
