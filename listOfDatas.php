<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
  ob_start();
  session_start();
  require_once 'init.php';
  require_once 'includes/session.php';
  date_default_timezone_set('Asia/Kolkata');


if(isset($_POST["name"])){

	if($_POST["name"] == 'wardNo'){

		if(isset($_POST["location_id"]) && !empty($_POST["location_id"])){
		//Get all state data

		$getwards = new Location();
		$getwards = $getwards->fetchWard("WHERE status = '1' AND location = '{$_POST["location_id"]}' ORDER BY ward_no ASC")->resultSet();


		//Display states list
		$res = array();

		if(isset($getwards)){

		$res["status"]= "success";

		$res["data"]= '<option value="" Selected Disabled>Select Ward No</option>';

		foreach($getwards as $getward){

		$res["data"] .= '<option value="'.$getward['id'].'">'.$getward['ward_no'].'</option>';
		}

		}
		else
		{
		$res["status"] = "failed";

		$res["data"] = '<option value="" Selected Disabled>Ward no not available</option>';

		}
		echo json_encode($res);

		}

	}


	if($_POST["name"] == 'signup_wardNo'){

		if(isset($_POST["area_id"]) && !empty($_POST["area_id"])){
		//Get all state data

		$getAreas = new Location();
		$getAreas = $getAreas->fetchArea("WHERE status = '1' AND id = '{$_POST["area_id"]}' ORDER BY area_name ASC")->resultSet();
		$getArea = $getAreas[0];

		$getwards = new Location();
		$getwards = $getwards->fetchWard("WHERE status = '1' AND id = '{$getArea["ward_no"]}' ORDER BY ward_no ASC")->resultSet();
		$getward = $getwards[0];


		//Display states list
		$res = array();

		if(isset($getAreas)){

		$res["status"]= "success";

		$res["ward_no"]= $getward['ward_no'];

		}
		else
		{
		$res["status"] = "failed";

		$res["ward_no"] = '';

		}
		echo json_encode($res);

		}

	}


	if($_POST["name"] == 'areaName'){

		if(isset($_POST["ward_id"]) && !empty($_POST["ward_id"])){
		//Get all state data

		$getAreas = new Location();
		$getAreas = $getAreas->fetchArea("WHERE status = '1' AND ward_no = '{$_POST["ward_id"]}' ORDER BY area_name ASC")->resultSet();


		//Display states list
		$res = array();

		if(isset($getAreas)){

		$res["status"]= "success";

		$res["data"]= '<option value="" Selected Disabled>Select Area / Street</option>';

		foreach($getAreas as $getArea){

		$res["data"] .= '<option value="'.$getArea['id'].'">'.$getArea['area_name'].'</option>';
		}

		}
		else
		{
		$res["status"] = "failed";

		$res["data"] = '<option value="" Selected Disabled>Area / Street not available</option>';

		}
		echo json_encode($res);

		}

	}


	if($_POST["name"] == 'districtName'){

		if(isset($_POST["state_id"]) && !empty($_POST["state_id"])){
		//Get all state data

		$getdistricts = new Location();
		$getdistricts = $getdistricts->fetchDistrict("WHERE status = '1' AND state_id = '{$_POST["state_id"]}' ORDER BY district_name ASC")->resultSet();


		//Display states list
		$res = array();

		if(isset($getdistricts)){

		$res["status"]= "success";

		$res["data"]= '<option value="" Selected Disabled>Select District</option>';

		foreach($getdistricts as $getdistrict){

		$res["data"] .= '<option value="'.$getdistrict['id'].'">'.$getdistrict['district_name'].'</option>';
		}

		}
		else
		{
		$res["status"] = "failed";

		$res["data"] = '<option value="" Selected Disabled>District not available</option>';

		}
		echo json_encode($res);

		}

	}


	if($_POST["name"] == 'businessSubscription'){

		if(isset($_POST["subscription_order"]) && !empty($_POST["subscription_order"])){

		$getperiods = new Business();
		$getperiods = $getperiods->fetchPeriod("WHERE premium_order = '{$_POST["subscription_order"]}' ORDER BY id ASC")->resultSet();
		$getperiod = $getperiods[0];

		//Get all state data

		$getsubscriptions = new Business();
		$getsubscriptions = $getsubscriptions->fetchSubscription("WHERE status = '1' AND period = '{$getperiod["id"]}' AND plan = '{$_POST["plan_id"]}' ORDER BY id ASC")->resultSet();
		$getsubscription = $getsubscriptions[0];


		//Display states list
		$res = array();

		if($getsubscription['amount'] != ''){

		$res["status"]= "success";

		$res["amount"]= $getsubscription['amount'];

		}
		else
		{
		$res["status"] = "failed";

		$res["amount"] = "";

		}
		echo json_encode($res);

		}

	}




	if($_POST["name"] == 'agentverification'){

		if(isset($_POST["reference_code"]) && !empty($_POST["reference_code"])){

		$getagentnames = new Agent();
		$getagentnames = $getagentnames->fetchAgent("WHERE agent_code = '{$_POST["reference_code"]}' ORDER BY id ASC")->resultSet();
		$getagentname = $getagentnames[0];

		//Display states list
		$res = array();

		if($getagentname['agent_code'] != ''){

		$res["status"]= "success";

		$res["name"]= $getagentname['person_name'];

		}
		else
		{
		$res["status"] = "failed";

		$res["name"] = "";

		}
		echo json_encode($res);

		}

	}

}
?>
