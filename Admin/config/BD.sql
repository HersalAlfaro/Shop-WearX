-- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS wearx_db;
USE wearx_db;

-- Tabla para las categorías de productos
CREATE TABLE categorias (
    categoria_id INT AUTO_INCREMENT PRIMARY KEY,
    nombreCategoria VARCHAR(50) NOT NULL
);

-- Insertar categorías iniciales
INSERT INTO categorias (nombreCategoria) VALUES 
    ('Camisetas'),
    ('Hoodies');

-- Tabla para las marcas de productos
CREATE TABLE marcas (
    marca_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_marca VARCHAR(50) NOT NULL
);


  `codigo_producto` int(11) NOT NULL,
  `nombre_producto` varchar(100) NOT NULL,
  `descripcion_producto` varchar(200) NOT NULL,
  `imagen_url_producto` varchar(200) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `en_stock` int(11) NOT NULL,
  `estado_producto` int(11) NOT NULL,
  `categoria_producto` int(11) NOT NULL
-- Tabla para los productos
CREATE TABLE productos (
    codigoProducto INT PRIMARY KEY AUTO_INCREMENT,
    nombreProducto VARCHAR(255) NOT NULL,
    descripcionProducto TEXT,
    imagenURLProducto TEXT,
    precio DECIMAL(10, 2) NOT NULL,
    enStock BOOLEAN NOT NULL,
    estadoProducto VARCHAR(50),
    categoria_id INT,
    FOREIGN KEY (categoria_id) REFERENCES categorias(categoria_id),
);

-- Tabla para el registro de ventas
CREATE TABLE ventas (
    venta_id INT AUTO_INCREMENT PRIMARY KEY,
    codigoProdut INT NOT NULL,
    cantidad INT NOT NULL,
    monto_total DECIMAL(10, 2) NOT NULL,
    fecha_venta TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (codigoProdut) REFERENCES productos(codigoProducto)
);

-- Tabla para los clientes
CREATE TABLE clientes (
    Cedula INT AUTO_INCREMENT PRIMARY KEY,
    nombreCliente VARCHAR(30) NOT NULL,
    apellidoCliente VARCHAR(20) NOT NULL,
    segundoApCliente VARCHAR(20) NOT NULL,
    email VARCHAR(50) NOT NULL,
    passw VARCHAR(100) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    region VARCHAR(50) NOT NULL,
    direccion1 VARCHAR(100) NOT NULL,
    direccion2 VARCHAR(100) NOT NULL,
    ciudad VARCHAR(30) NOT NULL,
    provincia VARCHAR(30) NOT NULL
);

-- Tabla para el registro de compras (Relación entre ventas y clientes)
CREATE TABLE compras (
    compra_id INT AUTO_INCREMENT PRIMARY KEY,
    IdCliente INT NOT NULL,
    venta_id INT NOT NULL,
    fecha_compra TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (IdCliente) REFERENCES clientes(IdCliente),
    FOREIGN KEY (venta_id) REFERENCES ventas(venta_id)
);

-- Trigger para actualizar el stock después de una venta
DELIMITER $$
CREATE TRIGGER actualizar_stock AFTER INSERT ON ventas
FOR EACH ROW
BEGIN
    UPDATE productos
    SET stockActual = stockActual - NEW.cantidad
    WHERE producto_id = NEW.producto_id;
END;
$$
DELIMITER ;

-- Índices para mejorar el rendimiento en búsquedas
CREATE INDEX idx_categoria_id ON productos(categoria_id);
CREATE INDEX idx_producto_id ON ventas(producto_id);
CREATE INDEX idx_IdCliente ON compras(IdCliente);