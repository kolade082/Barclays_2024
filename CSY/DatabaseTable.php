<?php
namespace CSY;
class DatabaseTable
{

    private $table;
    private $pdo;
    private $primaryKey;

    public function __construct($pdo, $table, $primaryKey)
    {
        $this->pdo = $pdo;
        $this->table = $table;
        $this->primaryKey = $primaryKey;
    }

    public function find($field, $value)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $field . ' = :value');
        $values = [
            'value' => $value
        ];
        $stmt->execute($values);
        return $stmt->fetchAll();
    }
    public function fetchAllApplicationDetails() {
        $sql = "SELECT 
              apps.*, 
              users.*, 
              addresses.address_line1, addresses.city, addresses.postcode, addresses.country,
              work_and_income.occupation, work_and_income.employer, work_and_income.annual_income, work_and_income.credit_approval, 
              work_and_income.reason_for_use, work_and_income.monthly_outgoings, work_and_income.dependents
            FROM 
              applications apps
            JOIN 
              users ON apps.user_id = users.id
            JOIN 
              addresses ON users.id = addresses.user_id
            JOIN 
              work_and_income ON users.id = work_and_income.user_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function updateStatus($applicationId, $newStatus) {
        $stmt = $this->pdo->prepare("UPDATE applications SET status = :newStatus WHERE id = :applicationId");
        $stmt->execute(['newStatus' => $newStatus, 'applicationId' => $applicationId]);
    }


    public function delete($field, $value): void
    {
        $stmt = $this->pdo->prepare('DELETE FROM ' . $this->table . ' WHERE ' . $field . ' = :value');
        $values = [
            'value' => $value
        ];
        $stmt->execute($values);
    }

    public function findAll()
    {
        $stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function insert($record): void
    {
        $keys = array_keys($record);
        $values = implode(', ', $keys);
        $valuesWithColon = implode(', :', $keys);
        $query = 'INSERT INTO ' . $this->table . ' (' . $values . ') VALUES (:' . $valuesWithColon . ')';
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($record);
    }
    public function update($record): void
    {
        $query = 'UPDATE ' . $this->table . ' SET ';
        $parameters = [];
        foreach ($record as $key => $value) {
            $parameters[] = $key . ' = :' . $key;
        }
        $query .= implode(', ', $parameters);
        $query .= ' WHERE ' . $this->primaryKey . ' = :primaryKey';
        $record['primaryKey'] = $record[$this->primaryKey];
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($record);
    }

    public function save($record): void {
        if (isset($record[$this->primaryKey])) {
            // Check if the record exists
            $existing = $this->find($this->primaryKey, $record[$this->primaryKey]);
            if ($existing) {
                $this->update($record);
            } else {
                $this->insert($record);
            }
        } else {
            $this->insert($record);
        }
    }
    public function customFind($statement, $criteria){
        $stmt = $this->pdo->prepare($statement);
        $stmt->execute($criteria);
        return $stmt->fetchAll();
    }
    public function getLastInsertedId()
    {
        return $this->pdo->lastInsertId();
    }

}