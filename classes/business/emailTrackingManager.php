<?php
namespace classes\business;

use classes\entity\emailTracking;
use classes\data\emailTrackingManagerDB;

class emailTrackingManager {

    public function saveEmailTracking(emailTracking $emailTracking) {
			emailTrackingManagerDB::saveEmailTracking($emailTracking);

//			public function saveEmailTracking($id) {
//				emailTrackingrManagerDB::saveEmailTracking($id);
		
	}

}

?>