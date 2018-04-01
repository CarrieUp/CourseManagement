App :: import('Component','Auth');

class SiteAuthComponent extends AuthComponent{
	
	function identify($user=null, $conditions=null){

		$models = array('Student','Administrator','Professor');
		foreach ($models as $model){
			$this ->userModel = $model;
			$this ->params["data"][$model]=$this->params["data"]["User"];
			$result = parent ::identify($this->params["data"][$model],$conditions);
			if($result) {
				return $result;
			}
		}
	}
	return null;

}
