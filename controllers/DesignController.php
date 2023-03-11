<?php
require_once ("../../models/Design.php");
class DesignController{

    private $ejecuta;
    
    public function __construct()
    {
        $this->ejecuta = new Design();
    }
    public function id( $id )
    {
        return $this->ejecuta->id( $id );
    }

    public function create( $values )
    {
        return $this->ejecuta->create( $values );
    }
    public function read()
    {
        return $this->ejecuta->read();
    }
    public function update($fillable, $conditions)
    {
        return $this->ejecuta->update( $fillable, $conditions );
    }
    public function delete($id, $profile)
    {
        return $this->ejecuta->delete( $id, $profile );
    }
}
?>