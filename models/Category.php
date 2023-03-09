<?php
require_once "Query.php";
class Category{
    private $Category;
    private static $model = "categories";
    private static $fillable = [
                                    'name'
                                ];
    public function __construct()
    {
        $this->query = new Query();
    }
    
    public function id( $id )
    {
        return $this->query->get(self::$model, ["*"], ["id = $id"]);
    }

    public function create( $values = array() )
    {
        return $this->query->insert(self::$model, self::$fillable, $values);
    }
    public function read()
    {
        return $this->query->get(self::$model, ["*"]);
    }
    public function update($fillable, $conditions)
    {
        return $this->query->update( self::$model, $fillable, $conditions );
    }
    public function delete($id, $profile)
    {
        return $this->query->delete( self::$model, ["id = $id"] );
    }
}
?>