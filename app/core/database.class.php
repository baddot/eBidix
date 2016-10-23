<?php
/*******************************************************************************
 *                         Database class
 *******************************************************************************
 *      Author:     BWeb Media
 *      Email:      contact@bwebmedia.com
 *      Website:    http://www.bwebmedia.com
 *
 *      File:       database.class.php
 *      Version:    1.2
 *      Copyright:  (c) 2014 - BWeb Media 
 *      
 ******************************************************************************/

class Database
{
	private $PDOInstance = null;
	private static $instance;	
	const MYSQL_DATETIME_FORMAT = 'Y-m-d H:i:s';
	
	private function __construct() {
		// $PDODrivers = $this->getAvailableDrivers();
		
		try {
			$dsn = 'mysql:host='. DB_HOST .';dbname=' . DB_NAME .';charset=utf8';
			$driver_options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
			$this->PDOInstance = new PDO($dsn, DB_USER, DB_PASSWD, $driver_options);  
		} catch (PDOException $e) {
			throw new Exception('PDO ERROR: '.$e->getMessage());
		}
	}
	
	// create the instance if not exists and return it
	public static function getInstance() {
		if (is_null(self::$instance)) {
            self::$instance = new self();
        }   

        return self::$instance;
	}
	
	// check available PDO drivers on server
	private function getAvailableDrivers() {
    	return $this->PDOInstance->getAvailableDrivers();
    }
	
	public function disconnect() {
		$this->PDOInstance = null;
	}
	
	// prepare a SQL query and execute it
	public function PDOExecute($query, $params=array()) {
		try { 
			$stmt = $this->PDOInstance->prepare($query);

			if (!empty($params)) {
				foreach ($params as $key => $value) {
					$stmt->BindValue(':' . $key, $value, self::PDOType($value));
				}
			}

			$stmt->execute();

            return $stmt;
		} catch (PDOException $e) {
			throw new Exception('PDO ERROR: '.$e->getMessage());
		}
	}
	
	// returns the 1st row of your result set
	public function getRow($query, $params=array()) {
		return self::PDOExecute($query, $params)->fetch(PDO::FETCH_ASSOC);
	}
	
	// returns the whole result set
	public function getRows($query, $params=array()){
		return self::PDOExecute($query, $params)->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function select($type = 'fetchAll', $tables, $columns = '*', $conditions = null, $order = null, $limit = null) {
		if (is_array($tables)) {
			$i=0;
			$len = count($tables);
			$tabs = '';
			foreach($tables as $tab) {
				$tabs .= ($i == $len - 1) ? DB_PREFIX .$tab : DB_PREFIX .$tab.', ';
				$i++;
			}
		} else $tabs = DB_PREFIX .$tables;
		
		if (empty($columns)) $columns = '*';
		$column = is_array($columns) ? implode(', ', $columns) : $columns;
		
		$params = array();
		if (!empty($conditions)) {
			$cdtns = ' WHERE ';
			if (is_array($conditions)) {
				$i=0;
				$len = count($conditions);
				foreach ($conditions as $item => $value) {
					if (is_array($value)) {
						// if the value is an array, then this isn't a basic = comparison
						$key = key($value);
						$val = $value[$key];
						switch (strtolower($key)) {
							case 'like':
								$cdtns .= "AND {$item} LIKE :{$item}";
								$params[$item] = $val;
								break;
							default:
								$cdtns .= "";
						}
					} else {
						$cdtns .= ($i == $len - 1) ? "{$item} = :{$item}" : "{$item} = :{$item} AND ";
						$params[$item] = $value;
					}
				}
			} else $cdtns .= $conditions;
		} else $cdtns = '';
		
		if (!empty($order)) $cdtns .= " ORDER BY {$order}";
		if (!empty($limit)) $cdtns .= " LIMIT {$limit}";
		
		$query = "SELECT {$column} FROM {$tabs}{$cdtns}";

        return self::PDOExecute($query, $params)->$type(PDO::FETCH_ASSOC);
	}
	
	public function insert($table, $columns) {
		$query = "INSERT INTO ". DB_PREFIX ."{$table} (`".implode("`, `", array_keys($columns))."`) VALUES('".implode("', '", $columns)."')";

        return self::PDOExecute($query);
	}
	
	public function update($table, $columns, $conditions = null) {
		$params = array();
		$values = '';
		$i=0;
		$len = count($columns);

		foreach ($columns as $key => $value) {
			$values .= ($i == $len - 1) ? "{$key} = :{$key}" : "{$key} = :{$key}, ";
			$params[$key] = $value;
			$i++;
		}
		
		if (!empty($conditions)) {
			$condition = 'WHERE ';
			if (is_array($conditions)) {
				$i=0;
				$len = count($conditions);
				foreach ($conditions as $key => $value) {
					$condition .= ($i == $len - 1) ? "{$key} = :{$key}" : "{$key} = :{$key} AND ";
					$params[$key] = $value;
				}
			} else $condition .= $conditions;
		} else $condition = '';
		
		$query = "UPDATE ". DB_PREFIX ."{$table} SET {$values} {$condition}";

        return self::PDOExecute($query, $params);
	}
	
	public function delete($table, $conditions = null) {
		$params = array();
		if (!empty($conditions)) {
			$condition = 'WHERE ';
			$i=0;
			$len = count($conditions);
			foreach ($conditions as $key => $value) {
				$condition .= ($i == $len - 1) ? "{$key} = :{$key}" : "{$key} = :{$key} AND ";
				$params[$key] = $value;
			}
		} else $condition .= '';
		
		$query = "DELETE FROM ". DB_PREFIX ."{$table} {$condition}";

        return self::PDOExecute($query, $params);
	}
	
	public function transactions($queries) {
		try {
			$this->PDOInstance->beginTransaction();			
			foreach($queries as $value) {
				$this->PDOInstance->query($value);
			}			
			$this->PDOInstance->commit();
		} catch (PDOException $e) {
			$this->PDOInstance->rollback();

            throw new Exception($e->getMessage());
		}
	}
	
	public function lastInsertId() {
		return $this->PDOInstance->lastInsertId();
	}
	
	private static function PDOType($var) {  
        switch (gettype($var)) :      
            case 'int':
            case 'integer':
                return PDO::PARAM_INT;
                
            case 'double':
            case 'float':
            case 'string':
                return PDO::PARAM_STR;
                
            case 'bool':
            case 'boolean':
                return PDO::PARAM_BOOL;
                
            case 'null':
                return PDO::PARAM_NULL;
                
            default:
                return PDO::PARAM_STR;              
        endswitch;
    }
}

?>