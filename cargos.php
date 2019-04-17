<?php

namespace Models;

use Core\Model;

class Cargos extends Model {
	
	public function getList():array {
		$sql = "SELECT * FROM tb_cargos ORDER BY funcao ASC ";
		$sql = $this->db->query($sql);

		$array = [];
		if ($sql->rowCount()) {
			$array = $sql->fetch(\PDO::FETCH_ASSOC);
		}

		return $array;


    }

    public function add(array $array) {


		$data = $this->createBinds($array);
		$sql = "INSERT INTO tb_cargos SET ".implode(", ", $data);
		$sql = $this->db->prepare($sql);
		$this->useBinds($sql, $array);
		$sql->execute();

		return true;
    }
    
    public function update(array $array, int $id) {

		$data = $this->createBinds($array);
		$sql = "UPDATE tb_cargos SET ".implode(", ", $data)." WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$this->useBinds($sql, $array);
		$sql->bindValue(':id', $id);		
		$sql->execute();

		return true;
    }
    
    public function on(int $id) {
		$sql = "UPDATE tb_cargos SET ativo = ? WHERE id = ?";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(1, 1);
		$sql->bindValue(2, $id);
		$sql->execute();
	}

	public function off(int $id) {
		$sql = "UPDATE tb_cargos SET ativo = ? WHERE id = ?";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(1, 0);
		$sql->bindValue(2, $id);
		$sql->execute();
	}

}