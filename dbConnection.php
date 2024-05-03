<?php

class database
{
   private $db_host = "localhost";
   private $db_user = "root";
   private $db_pass = "";
   private $db_name = "osms";
   private $result  = array();
   private $mysqli  = "";
   private $conn    = false;


   function __construct()
   {
      if (!$this->conn) {
         $this->mysqli = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
         $this->conn = true;
         if ($this->mysqli->connect_error) {
            array_push($this->result, $this->mysqli->connect_error);
            return false;
         }
      } else {
         return true;
      }
   }
   function get_result()
   {
      $get_result = $this->result;
      $this->result = [];
      return $get_result;
   }

   private function table_exists($table)
   {
      $sql = "SHOW TABLES FROM $this->db_name LIKE '$table' ";
      $tabledb = $this->mysqli->query($sql);
      if ($tabledb) {
         if ($tabledb->num_rows == 1) {
            return true;
         } else {
            array_push($this->result, $table . " dose not exist in this database");
            return false;
         }
      }
   }

   // Function to insert into the database
   function insert($table, $value = [])
   {
      // Check to see if the table exists
      if ($this->table_exists($table)) {
         // Seperate $params's Array KEYs and VALUEs and Convert them to String Value
         $table_col = implode(', ', array_keys($value));
         $table_value = implode("', '", $value);
         $sql = "INSERT INTO $table ($table_col) VALUES ('$table_value')";
         if ($this->mysqli->query($sql)) {
            array_push($this->result, $this->mysqli->insert_id);
            return true;
         } else {
            array_push($this->result, $this->mysqli->error);
            return false;
         }
      } else {
         return false;
      }
   }

   // Function to update row in database
   function update($table, $value = [], $where = null)
   {
       // Check to see if the table exists
      if ($this->table_exists($table)) {
         // Seperate $params's Array KEYs and VALUEs and Convert them to String Value
         foreach ($value as $key => $va) {
            $argo[] = "$key = '$va'";
         }
         $a = implode(', ', $argo);
         $sql = "UPDATE $table SET $a";
         if ($where != null) {
            $sql .= " WHERE $where";
         }
         if ($this->mysqli->query($sql)) {
            array_push($this->result, $this->mysqli->affected_rows);
            return true;
         } else {
            array_push($this->result, $this->mysqli->error);
         }
      } else {
         return false;
      }
   }

   //Function to delete table or row(s) from database
   function delete($table, $where = null)
   {
       // Check to see if the table exists
      if ($this->table_exists($table)) {
         $sql = "DELETE FROM $table";
         if ($where != null) {
            $sql .= " WHERE $where";
         }
         if ($this->mysqli->query($sql)) {
            array_push($this->result, $this->mysqli->affected_rows);
            return true;
         } else {
            array_push($this->result, $this->mysqli->error);
            return false;
         }
      } else {
         return false;
      }
   }

   // Function to SELECT from the database
   function select($table, $rows = "*", $where = null, $limit = null, $order = null, $join = null)
   {
      // Check to see if the table exists
      if ($this->table_exists($table)) {
         // Create query from the variables passed to the function
         $sql = "SELECT $rows FROM $table";
         if ($where != null) {
            $sql .= " WHERE $where";
         }
         if ($limit != null) {
            $sql .= " LIMIT $limit";
         }
         if ($order != null) {
            $sql .= " ORDER BY $order";
         }
         if ($join != null) {
            $sql .= " JOIN $join";
         }
         if ($query = $this->mysqli->query($sql)) {
            $this->result = $query->fetch_all(MYSQLI_ASSOC);
            return true;
         } else {
            array_push($this->result, $this->mysqli->error);
            return false;
         }
      } else {
         return false;
      }
   }

   // Function to num_row check and select function from the database
   function num_check($table, $rows = "*", $where = null)
   {
      // Create query from the variables passed to the function
      $sql = "SELECT $rows FROM $table ";
      if ($where != null) {
         $sql .= " WHERE $where";
      }
      $check = $this->mysqli->query($sql);
      if ($check->num_rows == 1) {
         $this->select($table, $rows = "*", $where);
         return true;
      } elseif ($check->num_rows > 0) {
         $this->select($table, $rows = "*", $where);
         return true;
      } else {
         array_push($this->result, "$check->num_rows");
         return false;
      }
   }

   // Function to password check and crypt function from the database
   function get_pass($rPassword, $cPassword = null, $table = null, $rows = "*", $where = null)
   {
      if (!empty($rPassword) && !empty($cPassword)) {
         if ($rPassword == $cPassword) {
            $password = password_hash($rPassword, PASSWORD_BCRYPT);
            return $password;
         } else {
            array_push($this->result, "not match");
         }
      } elseif (!empty($rPassword) && empty($cPassword)) {
         $this->select($table, $rows, $where);
         $password = $this->get_result();
         if ($password) {
            foreach ($password as list("r_password" => $password)) {
            }
            $password = password_verify($rPassword, $password);
            if ($password) {
               return true;
            } else {
               return false;
            }
         }
      }
   }


   function string($value = [])
   {
      if ($value) {
         list($a, $b) = $value; 
         $a = mysqli_real_escape_string($this->mysqli, trim($a));
         $b = mysqli_real_escape_string($this->mysqli, trim($b));
         $v=[$a ,$b];
         $this->result = $v;
         return true;
      }
   }

   function __destruct()
   {
      if ($this->conn) {
         if ($this->mysqli->close()) {
            $this->conn = false;
            return true;
         }
      } else {
         return false;
      }
   }
}
