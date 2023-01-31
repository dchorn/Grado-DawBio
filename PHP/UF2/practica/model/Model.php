<?php
require_once "lib/DaoFactory.php";
/**
 * Model for store application.
 *
 * @author ProvenSoft
 */
class Model {
    private string $user_file;

    private string $products_file;

    private string $delimiter;

    private UserPersistFileDao $userDao;

    private ProductsPersistFileDao $productDao;    

    function __construct(){
        $this->user_file = "files/users.txt";
        $this->products_file = "files/products.txt";
        $this->delimiter = ";";
        $this->userDao = new UserPersistFileDao($this->user_file,$this->delimiter);
    }

    /** methods related to user **/
    
    /**
     * searches all users in database.
     * @return array with all users found or null in case of error.
     */
    public function searchAllUsers(): ?array {
        $data = null;
        $dao = DaoFactory::getDao("user");
        $data = $dao->selectAll();
        return $data;
    }    
    
    /**
     * searches users with given username
     * @param string $username the username to search
     * @return array of objects with given username
     */
    public function searchUsersByUsername(string $username): array {
        $data = [];
        //TODO
        return $data;
    }    
    
    /***
     * adds a new user
     * @param User $user the user to add
     * @return int number of users added
     */
    public function addUser(User $user) : int {
        $result = 0;
		$dao = DaoFactory::getDao("user");
		if ($dao !== null) {
			$result = $dao->insert($user);	
		}
        return $result;
    }
    
    /** methods related to product **/
    
    /**
     * searches all products in database.
     * @return array with all products found or null in case of error.
     */
    public function searchAllProducts(): ?array {
        $data = null;
        $dao = DaoFactory::getDao("product");
        $data = $dao->selectAll();
        return $data;
    } 

    /**
     * adds a product to database.
     * @param Product $product the product to add.
     * @return int result code for this operation.
     */
    public function addProduct(Product $product): int {
        $result = -1;
        $dao = DaoFactory::getDao("product");
        $result = $dao->insert($product);
        return $result;
    }

    /**
     * modifies a product to database.
     * @param Product $product the product to modify.
     * @return int result code for this operation.
     */    
    public function modifyProduct(Product $product): int {
        $result = -1;
        //TODO
        return $result;
    }
    
    /**
     * removes a product to database.
     * @param Product $product he product to remove.
     * @return int result code for this operation.
     */
    public function removeProduct(Product $product): int {
        $result = -1;
        //TODO
        return $result;
    }

	 public function validate($array_login){
            $alltheusers =  $this->userDao->selectAll();
            foreach($alltheusers as $elem){
                $check = array();
                $username = $elem->getUsername();
                $password = $elem->getPassword();
                $rol = $elem->getRole();
                array_push($check,$username);
                array_push($check,$password);
                if($check == $array_login){
                    $existe = array($username,$rol);
                    break;
                }else{
                    $existe = array();
                }
                $check = array();
            }
            return $existe;
        }

}
