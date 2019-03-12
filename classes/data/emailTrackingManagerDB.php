<?php
namespace classes\data;

use classes\entity\emailTracking;
use classes\util\DBUtil;

class emailTrackingManagerDB
{
    public static function saveEmailTracking(emailTracking $emailTracking){

        $conn=DBUtil::getConnection();
        $sql="call procSaveEmailTracking(?,?,?)";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param("iss", $emailTracking->id, $emailTracking->user_id, $emailTracking->date_read); 
        $stmt->execute();
        if($stmt->errno!=0){
            printf("Error: %s.\n",$stmt->error);
        }
        $stmt->close();
        $conn->close();
        echo "DB connected!";
    }
 
}

?>

