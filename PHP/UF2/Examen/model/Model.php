<?php
require_once 'persist/UserPersistFileDao.php';
/**
 * Model for store application.
 *
 * @author ProvenSoft
 */
class Model {

    private string $user_file;

    private string $delimiter;

    private UserPersistFileDao $userDao;

    function __construct(){
        $this->user_file = "files/users.txt";
        $this->products_file = "files/products.txt";
        $this->delimiter = ";";
        $this->userDao = new UserPersistFileDao($this->user_file,$this->delimiter);
    }

    /** methods related to user **/
    
    /**
     * searches all users in data source.
     * @return array with all users found or null in case of error.
     */
    public function searchAllUsers(): ?array{
        $data = null;
        $data = $this->userDao->selectAll();
        return $data;
    }
    
    /**
     * adds a new user to data source preventing username duplicated and null
     * objects
     * @param User $user the user to add
     * @return int number of users added
     */
    public function addUser(User $user) : int {
        $result = 0;
        if ($user !== null) {
            $result= $this->userDao->insert($user);           
        }
        return $result;
    }

    /** methods related to product **/
    
   /**
    * Search a User by username and password
    * @param string $username
    * @param string $password
    * @return User found or null if not exists
    */
    public function searchUserByUsernameAndPassword (
            string $username, 
            string $password
            ): ?User {
        $found = null;
        //TODO
        return $found;
    }
    
    /**
     * searches a user with the given username
     * @param string $username the username to search
     * @return the user searched or null if not found
     */
    public function searchUserByUsername(string $username): ? User {
        $item = $this->userDao->selectWhereUsername($username);
        return $item;
    }

   /**
    * Search a User by username and password
    * @param array $array_login
    * @return User found or null if not exists
    */
	public function validate($array_login){
		$alltheusers =  $this->userDao->selectAll();
		foreach($alltheusers as $elem){
			$check = array();
			$username = $elem->getUsername();
			$password = $elem->getPassword();
			$age = $elem->getAge();
			array_push($check,$username);
			array_push($check,$password);
			if($check == $array_login){
				$existe = array($username,$age);
				break;
			}else{
				$existe = array();
			}
			$check = array();
		}
		return $existe;
	}

}
