<?php

require_once "Conexion.php";
class Query extends Conexion{
    public function get( $tables, $columns = array(), $conditions = array() ) {
        $query = 'SELECT ';
        foreach ($columns as $column){
            if ( end( $columns ) == $column ){
                $query .= $column;
            }else{
                $query .= $column.', ';
            }
        }
        $query .= " FROM $tables";
        if ( !empty( $conditions ) ){
            $query .= " WHERE ";
            foreach ($conditions as $condition){
                if ( end( $conditions ) == $condition ){
                    $query .= $condition;
                }else{
                    $query .= $condition.' AND ';
                }
            }
        }
        $query .= ';';
        //return $query;
        $this->query = $query;
        $this->get_query();
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
    }
    public function insert( $table, $fillable = array(), $values = array() ){
        $query = "INSERT INTO ".$table." (";
        foreach ($fillable as $fill){
            if ( end( $fillable ) == $fill ){
                $query .= $fill;
            }else{
                $query .= $fill.', ';
            }
        }
        $query .= ") VALUES(";
        for ( $i=0; $i < count($values); $i++ ){
            if ( empty($values[$i]) && !( count($values)-1 == $i ) )
            {
                $query .= "NULL, ";
            }
            else if ( empty($values[$i]) && count($values)-1 == $i )
            {
                $query .= "NULL";
            }
            else if ( !empty($values[$i]) && count($values)-1 == $i )
            {
                $query .= "'".$values[$i]."'";
            }else{
                $query .= "'".$values[$i]."', ";
            }
        }
        $query .= ");";
        //return $query;
        $this->query = $query;
        return $this->set_query();
    }
    public function update($table, $fillable, $conditions){
        $query = "UPDATE ".$table." SET ".$fillable." WHERE ".$conditions;
        //return $query;
        $this->query = $query;
        return $this->set_query();
    }
    public function delete($table, $conditions)
    {
        $query = "DELETE FROM ".$table." WHERE ";
        for ($i=0; $i < count($conditions); $i++){
            if ( count( $conditions )-1 == $i ){
                $query .= $conditions[$i];
            }else{
                $query .= $conditions[$i].' AND ';
            }
        }
        $query .= ";";
        //return $query;
        $this->query = $query;
        return $this->set_query();
    }
}
?>