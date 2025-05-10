<?php namespace raymondoor\DBoperation{

class DBoperation{
    public static function all(string $table = 'table'){
        $statement = 'SELECT * FROM '.$table.' ORDER BY id ASC';
        try{
            $query = new \raymondoor\DBstatement($statement);
            $data = $query->execute([]);
            return $data;
        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }
}
}