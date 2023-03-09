<?php
require_once ("../../models/Gallery.php");
class GalleriesController{

    private $ejecuta;
    
    public function __construct()
    {
        $this->ejecuta = new Gallery();
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
    /* CONEXIONES A OTRAS TABLAS */
    public function readByProduct($id)
    {
        return $this->ejecuta->readByProduct( $id );
    }
}
?>