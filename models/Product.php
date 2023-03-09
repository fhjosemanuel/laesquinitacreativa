<?php
require_once "Query.php";
class Product{
    private $query;
    private static $model = "products";
    private static $fillable = [
                                    'name',
                                    'description',
                                    'price'
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
    public function read( $id )
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

    /* INNER JOIN */
    public function readByCategory($category) {
        $category = ucfirst($category);
        return $this->query->get("categories cat, products pro",["pro.id","pro.name", "pro.description", "pro.price", "cat.name as category"],["pro.category_id = cat.id","cat.name='$category' ORDER BY pro.id DESC"]);
    }
}
?>