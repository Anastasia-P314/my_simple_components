<?php 

class QueryBuilder {
	protected $pdo;

	public function __construct($pdo){
		$this->pdo = $pdo;
	}

	// Returns an associative array of all objects
	// @param  string $table
	// @return  array
	public function getAll($table){
		$sql = "SELECT * from {$table}";
		$statement = $this->pdo->prepare($sql);
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}

	// Returns one object with the requested $id
	// @param  string $table
	// @param  int $id
	// @return  array
	public function getOne($table, $id){
		$sql = "SELECT * FROM {$table} WHERE id=:id";
		$statement = $this->pdo->prepare($sql);
		$statement->execute(['id'=>$id]);
		// $statement->bindvalue('id',$id);
		// $statement->execute();
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		return $result;
	}

	// Creates objects by using $data. $data is associative array where keys coincides with column names of $table
	// @param  string $table
	// @param  array $data
	public function create($table, $data){
		$keys = implode(',',array_keys($data));
		$tags = ':'.implode(', :',array_keys($data));
		$sql = "INSERT INTO {$table} ({$keys}) VALUES ({$tags})";
		$statement = $this->pdo->prepare($sql);
		$statement->execute($data);
	}

	// Updates object with the requested $id by using $data. $data is associative array where keys coincides with column names of $table
	// @param  string $table
	// @param  array $data
	// @param  int $id
	public function update($table, $data, $id){
		$keys = array_keys($_POST);
		$inj = ''; 
		foreach($keys as $key){
			$inj = $inj.$key.'=:'.$key.', ';
		};

		$keyvalue = rtrim($inj, ', ');

		$data['id'] = $id;

		$sql = "UPDATE {$table} SET {$keyvalue} WHERE id=:id";
		$statement = $this->pdo->prepare($sql);
		$statement->execute($data);
	}

	// Deletes one object with the requested $id from $table
	// @param  string $table
	// @param  int $id
	public function delete($table, $id){
		$sql = "DELETE FROM {$table} WHERE id=:id";
		$statement = $this->pdo->prepare($sql);
		$statement->execute(['id'=>$id]);
	}
};

?>