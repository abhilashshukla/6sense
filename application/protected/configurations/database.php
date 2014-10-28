<?php
/*
 * File: database.php
 * Created on 10-Oct-2014
 * Created By: Abhilash Shukla
 */

/**
 * GUIDELINES: While creating database and its tables keep few things in mind.
 * 1. Every table should have a "status", "owner", "created_on", "modified_on" field.
 *    And it has to be the last field of the table always, if required in table.
 * 2. Every fieldname need to be followed by its tablename and an underscore.
 *    Like TABLE:employee should have FIELD:employee_name
 */

class database extends PDO { // This will inherit all methods of PDO into "database" class.
	function __construct() {
		parent::__construct('mysql:host=localhost;dbname=app_bi42km97', 'root', 'admin');
	}

	/**
	 * select
	 * @param string $sql An SQL string
	 * @param associative array $array Paramters to bind
	 * @param constant $fetchMode A PDO Fetch mode
	 * @return mixed
	 */
	public function select($sql, $array = array(), $fetchMode = parent::FETCH_ASSOC)
	{
		$sth = $this->prepare($sql);
		foreach ($array as $key => $value) {
			$sth->bindValue(":$key", $value);
		}
		$sth->execute();
		return $sth->fetchAll($fetchMode);
	}

	/**
	 * insert
	 * @param string $table A name of table to insert into
	 * @param string $data An associative array
	 * @return "true" for success and "false" for failure
	 */
	public function insert($table, $data)
	{
		ksort($data);
		$fieldNames = implode('`, `', array_keys($data));
		$fieldValues = ':' . implode(', :', array_keys($data));
		$sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");

		foreach ($data as $key => $value) {
			$sth->bindValue(":$key", $value);
		}

		$Status = $sth->execute();
		if($Status == true)
		{
			return "true";
		}
		else
		{
			return "false";
		}
	}
	
	/**
	 * insert
	 * @param string $table A name of table to insert into
	 * @param string $data An array
	 */
	public function bulkinsert($table, $fields, $data)
	{
		$totalData = count($data);
		$total = count(explode(',', $fields));
		$fieldValues = null;
		$TotalLoop = $totalData / $total;
		for($K = 0; $K<$TotalLoop;$K++)
		{
			$fieldValues .= '(';
			for($i=0;$i<$total;$i++)
			{
				if($i==($total-1))
				{
					$fieldValues .= '?';
				}
				else
				{
					$fieldValues .= '?,';
				}
			}
			if($K == ($TotalLoop-1))
			{
				$fieldValues .= ")";
			}
			else
			{
				$fieldValues .= "),";
			}
		}
		$sth = $this->prepare("INSERT INTO ".$table." (".$fields.") VALUES ".$fieldValues);
		
		for($M=0; $M<$totalData; $M++)
		{
			$sth->bindValue($M+1, $data[$M]);
		} 
		$Status = $sth->execute();
		if($Status == true)
		{
			return "true";
		}
		else
		{
			return $sth->errorInfo();
		}
	}

	/**
	 * update
	 * @param string $table A name of table to insert into
	 * @param string $data An associative array
	 * @param string $where the WHERE query part
	 */
	public function update($table, $data, $where)
	{
		ksort($data);
		$fieldDetails = NULL;
		$Wheredetail = NULL;
		foreach($data as $key=> $value) {
			$fieldDetails .= "`$key`=:$key,";
		}
		$fieldDetails = rtrim($fieldDetails, ',');

		foreach($where as $key=> $value) {
			$Wheredetail .= "`$key`=:$key,";
		}
		
		$Wheredetail = rtrim($Wheredetail, ',');
		$sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $Wheredetail");
		
		foreach ($data as $key => $value) {
			$sth->bindValue(":$key", $value);
		}
		foreach ($where as $key => $value) {
			$sth->bindValue(":$key", $value);
		}

		$Status = $sth->execute();
		if($Status == true)
		{
			return "true";
		}
		else
		{
			return "false";
		}
	}

	public function validate($email)
	{
		$AssociativeArray= array('email'=>$email);
		$validate1 = self::select("SELECT u_email FROM users WHERE u_email = :email", $AssociativeArray);
		$validate2 = self::select("SELECT email FROM configuration");
		$validemail = $validate2[0]['email'];
		$MyErrors = array('email'=>0);
		foreach($validate1 as $key=>$value)
		{
			if(($validate1[$key]['u_email'] == $email) && ($validate1[$key]['u_email']!= $validemail))
			{
				$MyErrors['email'] = 1;
			}
		}
		return $MyErrors;
	}
	public function editvalidate($uid, $email)
	{
		$AssociativeArray= array('uid'=>$uid);
			$AssociativeArray1= array('uid'=>$uid,'email'=>$email);
		$validate1 = self::select("SELECT u_id, u_email FROM users WHERE u_id = :uid", $AssociativeArray);
		$MyErrors = array('uid'=>0, 'email'=>0);
		foreach($validate1 as $key=>$value)
		{
			if($validate1[$key]['u_email'] == $email)
			{
				$MyErrors['email'] = 2;
			}
		}
		if(($MyErrors['email']==0))
		{
			$validate2 = self::select("SELECT u_email FROM users WHERE u_email = :email AND u_id!=:uid", $AssociativeArray1);
			$validate3 = self::select("SELECT email FROM configuration");
			$validemail = $validate3[0]['email'];
			foreach($validate2 as $key=>$value)
			{
				if($email!= $validemail)
				{
					if($validate2[$key]['u_email'] == $email)
					{
						$MyErrors['email'] = 1;
					}
				}
			}
			return $MyErrors;
		}
		else
		{
			return $MyErrors;
		}
	}
	/**
	 * delete
	 *
	 * @param string $table
	 * @param $where is associative array
	 * @param integer $limit
	 * @return integer Affected Rows
	 */
	public function deleteQuery($table, $where, $limit = 1)
	{
		$Wheredetail = null;
		foreach($where as $key=> $value) {
			$Wheredetail .= "`$key`=:$key,";
		}
		$Wheredetail = rtrim($Wheredetail, ',');

		$stmt = $this->prepare("DELETE FROM $table WHERE $Wheredetail LIMIT $limit");

		foreach ($where as $key => $value) {
			$stmt->bindValue(":$key", $value);
		}

		$stmt->execute();
		$count = $stmt->rowCount();

		if($count == 1)
		{
			return "true";
		}
		else
		{
			return "false";
		}
	}
	public function supportId()
	{
		$supportIdArray = array("config_id"=>1);
		$supportId = self::select('SELECT email FROM configuration WHERE config_id = :config_id', $supportIdArray);
		return $supportId[0]['email'];
	}
	public function hierarchyQuery($level = null)
	{
		$AssociativeArray = array('level'=>$level);
		$hierarchySelect = self::select("SELECT hierarchy_id FROM hierarchy WHERE hierarchy_level = :level", $AssociativeArray);
		return $hierarchySelect;
	}
	public function UserCreate($uname, $uid, $table)
	{
		$username = strtolower($uname).$uid;
		$where = array("u_id"=>$uid);
		$InputData = array("u_login"=>$username);
		$UserQuery = self::update($table, $InputData ,$where);
		return $username;
	}

}
?>