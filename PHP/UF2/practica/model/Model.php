<?php
require_once "lib/DaoFactory.php";
/**
 * Model for store application.
 *
 * @author ProvenSoft
 */
class Model {
    
    public function __construct() {
        
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
        $result = $dao->insert($user);
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
    
}
