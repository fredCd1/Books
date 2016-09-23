<?php
/**
 *
 */
class Conexion
{
  private $conexion,$host,$user,$password,$db;
  public $afected_rows;
  function __construct($host,$user,$password,$db){
      $this->afected_rows = 0;
      $this->host = $host;
      $this->user = $user;
      $this->password = $password;
      $this->db = $db;
  }
  private function start_conexion(){
    $this->conexion = new mysqli($this->host,$this->user,$this->password,$this->db);
  }

  private function close(){$this->conexion->close();}

  public function filter_sql($str){
    $this->start_conexion();
    $i = $this->conexion->real_escape_string($str);
    $this->close();
    return $i;
  }

  public function query($string_query){
      $this->start_conexion();
      $return = $this->conexion->query($string_query);
      $this->afected_rows = $this->conexion->affected_rows;
      $this->close();
      return $return;
  }

  public function is_user($email,$pass){
      $user= $this->filter_sql($email);
      $password = $this->filter_sql($pass);
      $SQL = 'SELECT id,email,password,nombre FROM users WHERE email = "'.$user.'" and password= "'.$password.'" ;';
      $datos = $this->query($SQL);

      if ($this->afected_rows == 1){
        return array('is_user' => true,'id'=> $datos['id'],'name' => $datos['nombre']);
      }
      else
        return array('is_user' => false );
  }


  public function new_entry($kwards){
    $re = $this->is_user($kwards['email'],$kwards['password']);
    if (!$re['is_user']){
      $SQL ='
        INSERT INTO users (email,password,nombre,apellidos,direccion,telefono,codigo_postal,ciudad) 
        values ("'.$kwards['email'].'","'.$kwards['password'].'","'.$kwards['nombre'].'","'.$kwards['apellidos'].'",
        "'.$kwards['direccion'].'","'.$kwards['telefono'].'","'.$kwards['codigo_postal'].'","'.$kwards['ciudad'].'");
    ';
      $this->query($SQL);
      return true;
    }else{
      return false;
    }
  }


  public function get_categories(){
    $SQL='SELECT * FROM categorias   ';
    $this->start_conexion($SQL);
    $re = $this->conexion->query($SQL);
    $this->close();
    return $re;
  }
  public function get_products_by_category($id_category){
    $this->start_conexion();
    $SQL = 'SELECT id_producto,title,precio,img_src FROM producto WHERE id_categoria='.$id_category.';';
    $re = $this->conexion->query($SQL);
    $this->afected_rows = $this->conexion->affected_rows;
    $this->close();
    return $re;
  }

}
?>
