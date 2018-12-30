<?php 

namespace MF\Model;

use APP\Connection;

class Container {

	public static function getModel($model) {

		$class = "\\APP\\Models\\" . ucfirst($model);

		$conn = Connection::getDb();

		return new $class($conn);
	}

}



 ?>