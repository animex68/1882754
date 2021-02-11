<?php
// Task #1

/**
* Item Class
* 
* @property-read (string, string|int|float|double)
* @property-write (string, string|int|float|double)
*/
class Item {

	/**
	* @var int $object_id Object ID
	*/
	public int $object_id;
	/**
	* @var int $id ID
	*/
	private int $id;
	/**
	* @var string $name Name
	*/
	private string $name;
	/**
	* @var int $status Status
	*/
	private int $status;
	/**
	* @var bool $changed Changed
	*/
	private bool $changed;

	/**
	* Set data to a table and set it to class propertie. One-time launch
	*
	* @return void
	*/

	private function init() {
		$query = $this->db->query("SELECT name, status FROM objects");
		$obj = $query->fetch_object;
		self::__set("name", $obj->name);
		self::__set("status", $obj->name);
	}

	/**
	* Change of data: name, status
	*
	* @return void
	*/

	public function save($name, $status) {
		if (isset($name) && isset($status)) {
			$this->name = $name;
			$this->status = $status;
		}
	}

	/**
	* Get data: name, status
	*
	* @return void
	*/

	public function __get($key) {
		if (isset($this->$key)) {
			return $this->$key;
		}

		return NULL;
	}

	/**
	* Set data: name, status
	*
	* @return void
	*/

	public function __set($key, $value) {
		if (isset($this->$key) && $key != "id" && gettype($this->$key) == gettype($value)) {
			$this->$key = $value;
			return true;
		}

		return false;
	}

	/**
	* Constructor
	*
	* @return void
	*/

	public function __construct($object_id) {
		$this->object_id = $object_id;
		self::init();
	}
}

// Task #2
// SELECT *.users, *.objects FROM users JOIN objects ON users.object_id = objects.id
?>

<!-- Task #3 -->
<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-1.11.3.js"></script>
    <title></title>
</head>
<body>
1.    Написать функцию перехвата нажатия клавиш left arrow, right arrow, up arrow, down arrow
2.  При нажатии на любую из клавиш появляется alert с названием нажатой клавиши
3.  Запрещается использовать любые плагины, которые осуществляют перехват нажатых клавиш
4.  Необходимо продолжать результат действия этих клавиш после закрытия alert

<script>
$(document).keyup(function(e) {
    if (e.key == "ArrowUp" || e.key == "ArrowDown" || e.key == "ArrowLeft" || e.key == "ArrowRight") {
        alert(e.key)
    }
});
</script>
</body>
</html>
