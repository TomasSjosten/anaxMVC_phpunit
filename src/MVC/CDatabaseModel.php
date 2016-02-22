<?php

namespace Anax\MVC;

/**
* Model for Users.
*
*/
class CDatabaseModel implements \Anax\DI\IInjectionAware
{
    use \Anax\DI\TInjectable;





    public function getSource()
    {
        return strtolower(implode('', array_slice(explode('\\', get_class($this)), -1)));
    }







    public function findAll()
    {
        $this->db->select()
          ->from($this->getSource());

        $this->db->execute();
        $this->db->setFetchModeClass(__CLASS__);
        return $this->db->fetchAll();
    }






    public function createTable($columns) {
        $tableName = $this->getSource();
        $this->db->dropTableIfExists($tableName)->execute();

        $this->db->createTable($tableName, $columns)->execute();
    }






    public function getProperties()
    {
        $properties = get_object_vars($this);
        unset($properties['di']);
        unset($properties['db']);

        return $properties;
    }




    public function find($id)
    {
        $this->db->select()
          ->from($this->getSource())
          ->where("id = ?");

        $this->db->execute([$id]);
        return $this->db->fetchInto($this);
    }





    public function save($values = [])
    {
        $this->setProperties($values);
        $values = $this->getProperties();

        if (isset($values['id'])) {
            return $this->update($values);
        } else {
            return $this->create($values);
        }
    }




    public function setProperties($properties)
    {
        if (!empty($properties)) {
            foreach ($properties as $key => $val) {
                $this->$key = $val;
            }
        }
    }






    public function create($values)
    {
        $keys   = array_keys($values);
        $values = array_values($values);

        $this->db->insert(
          $this->getSource(),
          $keys
        );

        $res = $this->db->execute($values);

        $this->id = $this->db->lastInsertId();

        return $res;
    }




    public function update($values)
    {
        $keys   = array_keys($values);
        $values = array_values($values);

        unset($keys['id']);
        $values[] = $this->id;

        $this->db->update(
          $this->getSource(),
          $keys,
          "id = ?"
        );

        return $this->db->execute($values);
    }




    public function delete($id)
    {
        $this->db->delete(
          $this->getSource(),
          'id = ?'
        );

        return $this->db->execute([$id]);
    }




    public function query($columns = '*')
    {
        $this->db->select($columns)
          ->from($this->getSource());

        return $this;
    }




    public function where($condition)
    {
        $this->db->where($condition);

        return $this;
    }




    public function andWhere($condition)
    {
        $this->db->andWhere($condition);

        return $this;
    }





    public function execute($params = [])
    {
        $this->db->execute($this->db->getSQL(), $params);
        $this->db->setFetchModeClass(__CLASS__);

        return $this->db->fetchAll();
    }

}
