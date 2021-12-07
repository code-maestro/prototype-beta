<?php
    
    $db = new DatabaseModule();
    $sql = "SELECT communications.comm, users.first_name, users.last_name FROM communications INNER JOIN users WHERE communications.users_uid = users.users_id ORDER BY communications.id DESC LIMIT 1";
    $output = $db->readData($sql);

    $result = "";

    if ($output) {                 
        foreach ($output as $ROW) {
            $result .= "<strong>" . $ROW['comm'] . "</strong>" . " from " . "<strong>" . $ROW['first_name'] . " " . $ROW['last_name'] . "</strong> <br>" ;
        }
        
    } else {
        $result .= '<div class="text">No New Commmunications are available right now.</div>';
    }

    echo $result;

?>