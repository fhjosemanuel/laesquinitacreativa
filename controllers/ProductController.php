<?php
require_once ("../../models/Product.php");
class ProductController{

    private $ejecuta;
    
    public function __construct()
    {
        $this->ejecuta = new Product();
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

    public function readNameANDPrice()
    {
        return $this->ejecuta->readNameANDPrice();
    }
    /* INNER JOIN */
    public function readByCategory( $category )
    {
        return $this->ejecuta->readByCategory( $category );
    }
}
?>