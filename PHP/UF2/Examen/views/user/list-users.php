<table>
    <h2>List all users</h2>
    <tr>
        <th>username</th>
        <th>age</th>
    </tr>
    <?php
    //display list of items in a table only if the role is staff or admin.
    $userList = $params['userList'];
    $message = $params['message']??'';
	if(count($userList)>0){ 
		foreach ($userList as $elem) {
			echo <<<EOT
			<tr>
				<td>{$elem->getUsername()}</td>
				<td>{$elem->getAge()}</td>
			</tr>               
			EOT;
		}
	}
    ?>
</table>
<?php echo $message ?>
