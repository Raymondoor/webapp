<?php
namespace raymondoor{

class DBstatement{
    private $statement;
    private $pdo;
    public function __construct(string $statement){
        $this->statement = trim($statement);
        try{
            $this->pdo = DBconnection::connect();
        }catch(\Exception $e){
            throw new \Exception('Initialize Failed: '.$e->getMessage());
        }
    }
    public function execute(array $parameters = []){
        try{
            $this->pdo->beginTransaction();
            $stmt = $this->pdo->prepare($this->statement);
            if(!$stmt){ // Just in case
                throw new \Exception('Prepare Statement Failed: '.$this->statement);
            }
            $executed = $stmt->execute($parameters);
            if(!$executed){ // Just in case
                $this->pdo->rollBack();
                $errorInfo = $stmt->errorInfo();
                throw new \Exception('Execution Failed: '.$errorInfo[2]);
            }
            $queryType = strtoupper(substr($this->statement, 0, 6));
            $result = null;
            switch($queryType){
                case 'SELECT':
                    $result = $stmt->fetchAll();
                    break;
                case 'INSERT':
                case 'UPDATE':
                case 'DELETE':
                    $result = $stmt->rowCount();
                    break;
                default:
                    $this->pdo->rollBack();
                    throw new \Exception('Unsupported Query Type: '.$this->statement);
            }
            $this->pdo->commit();
            return $result;
        }catch(\Exception $e){
            if($this->pdo->inTransaction()){ // Check if in transaction before rollback
                $this->pdo->rollBack();
            }
            $errmessage = 'Query Failed :'.$e->getMessage().' - Statement: '.$this->statement;
            throw new \Exception($errmessage);
        }
    }
    public function lastInsertId(){
        return $this->pdo->lastInsertId();
    }
}

}
/* Example code
try{
    $statement = new raymondoor\DBstatement('SELECT * FROM user WHERE username = :username');
    $execute = $statement->execute([':username' => 'admin']);
    print_r($execute);
}catch(Exception $e){
    echo $e->getMessage();
}
*/