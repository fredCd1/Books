CREATE DATABASE istore;
USE istore;
CREATE TABLE users (id INT NOT NULL AUTO_INCREMENT, email VARCHAR(100) NOT NULL,password VARCHAR(40) NOT NULL,
nombre VARCHAR(40) NOT NULL, apellidos VARCHAR(40),direccion VARCHAR(200), telefono VARCHAR(15),codigo_postal VARCHAR(6),
ciudad VARCHAR(30),PRIMARY KEY(id,email))engine=InnoDB;



CREATE TABLE categorias (id_categoria INT NOT NULL AUTO_INCREMENT PRIMARY KEY,name VARCHAR(60))engine=InnoDB;

CREATE TABLE producto(id_producto INT NOT NULL AUTO_INCREMENT, title VARCHAR(60) NOT NULL,descripcion TEXT,src VARCHAR(300),
img_src VARCHAR(300), precio FLOAT, id_categoria INT NOT NULL, PRIMARY KEY(id_producto),FOREIGN key (id_categoria) REFERENCES
categorias(id_categoria) ON DELETE CASCADE ON UPDATE CASCADE)engine=InnoDB;

CREATE TABLE shopping(id_user INT NOT NULL, id_producto INT NOT NULL, cantidad INT NOT NULL, fecha DATE NOT NULL,
  referencia INT AUTO_INCREMENT PRIMARY KEY, FOREIGN KEY (id_user) REFERENCES users(id), FOREIGN  KEY (id_producto) REFERENCES
  producto(id_producto))engine=InnoDB;


CREATE TABLE admins(id_admin INT NOT NULL, user_name VARCHAR(60) NOT NULL,password VARCHAR(256))engine=InnoDB;
