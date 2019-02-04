<?php

/**
 * Class base_model
 */
class base_model
{

    public $table;
    public $primary_key;

    /**
     * construct base_db
     *
     * @param $table       string table name
     * @param $primary_key int|mixed primary key
     */
    function __construct($table, $primary_key) {
        $this->table       = $table;
        $this->primary_key = $primary_key;
    }

    /**
     * update $data by $id
     *
     * @param $data
     * @param $id
     *
     * @return mixed
     */
    public function update($data, $id) {
        if (is_array($id)) {
            return DB::update($this->table, $data, $id);
        } else {
            return DB::update($this->table, $data, array($this->primary_key => $id));
        }
    }

    /**
     * insert data
     *
     * @param     $data
     * @param int $return_id
     *
     * @return mixed
     */
    public function insert($data, $return_id = 0) {
        return DB::insert($this->table, $data, $return_id);
    }

    /**
     * replace $data
     *
     * @param $data
     *
     * @return mixed
     */
    public function replace($data) {
        return DB::replace($this->table, $data);
    }

    /**
     * db select method
     *
     * @param        $where
     * @param int    $order
     * @param int    $perpage
     * @param int    $page
     * @param string $index
     *
     * @return mixed
     */
    public function select($where, $order = 0, $perpage = -1, $page = 1, $index = '') {
        return DB::select($this->table, $where, $order, $perpage, $page, $index);
    }

    /**
     * get recode
     *
     * @param $id int|mixed id or id array
     *
     * @return array array or single record
     */
    public function get($id) {
        $where   = array($this->primary_key => $id);
        $perpage = 0;
        if (is_array($id)) {
            if (isset($id[0])) {
                $id      = array_map('addslashes', $id);
                $where   = $this->primary_key . ' IN (\'' . implode("','", $id) . '\')';
                $perpage = -1;
            } else {
                $where = $id;
            }
        }
        return DB::select($this->table, $where, 0, $perpage);
    }

    /**
     * delete record by id or id array
     *
     * @param $id
     *
     * @return int|mixed
     */
    public function delete($id) {
        if (is_array($id)) {
            if (isset($id[0])) {
                //batch delete
                foreach ($id as $_id) {
                    self::delete($_id);
                }
                return 1;
            } else {
                //delete by where
                return DB::delete($this->table, $id);
            }
        } else {
            return DB::delete($this->table, array($this->primary_key => $id));
        }
    }
}

?>