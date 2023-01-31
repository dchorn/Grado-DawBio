<form method="POST" action="index.php">
<div>
	<label for="username">Username:</label>
	<input type="text" name="username" id="username" placeholder="enter username" value="<?php echo (isset($params['user'])) ? $params['user']->getUsername() : ''; ?>"/>
</div>
<br>
<div>
	<label for="password">Password:</label>
	<input type="password" name="password" id="password" placeholder="enter password" value="<?php echo (isset($params['user'])) ? $params['user']->getPassword() : ''; ?>"/>
</div>
<div>
	<label for="age">Age:</label>
	<input type="text" name="age" id="age" placeholder="enter age" value="<?php echo (isset($params['user'])) ?  $params['user']->getAge() : ''; ?>"/>
</div>
<br>
<br>
<br>
<div class="form-group">
<button type="submit" name="action" value='user/add' <?php echo (isset($params['user'])) ? 'disabled' : '' ?>>Add</button>
	<button type="submit" name="action" value='user/find' <?php echo (isset($params['user'])) ? 'disabled' : '' ?>>Find</button>
	<button type="submit" name='action' value='user/modify' <?php echo (!isset($params['user'])) ? 'disabled' : '' ?>>Modify</button>
	<button type="submit" name="action" value="user/remove" <?php echo (!isset($params['user'])) ? 'disabled' : '' ?>>Remove</button>
	<button type="reset">Reset</button>
</div>
</form>

<?php
$result = $params['result']??null;
if (!is_null($result)) {
    echo <<<EOT
    <div><p class="alert">$result</p></div>
EOT;
} 
?>

