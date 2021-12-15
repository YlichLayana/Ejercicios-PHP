<?php
include_once "Producto.php";
include_once "config.php";

/*
 * Acceso a datos con BD Usuarios y Patrón Singleton 
 * Un único objeto para la clase
 */
class AccesoDatos
{

    private static $modelo = null;
    private $dbh = null;
    private $stmt_Productos = null;
    private $stmt_Producto  = null;
    private $stmt_borProducto  = null;
    private $stmt_modProducto  = null;
    private $stmt_creaProducto = null;

    public static function getModelo()
    {
        if (self::$modelo == null) {
            self::$modelo = new AccesoDatos();
        }
        return self::$modelo;
    }



    // Constructor privado  Patron singleton

    private function __construct()
    {

        try {
            $dsn = "mysql:host=" . SERVER_DB . ";dbname=EmpresaPDO;charset=utf8";
            $this->dbh = new PDO($dsn, "root", "root");
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error de conexión " . $e->getMessage();
            exit();
        }
        // Construyo las consultas
        $this->stmt_Productos  = $this->dbh->prepare("select * from PRODUCTOS");
        $this->stmt_Producto   = $this->dbh->prepare("select * from PRODUCTOS where PRODUCTO_NO=:PRODUCTO_NO");
        $this->stmt_borProducto   = $this->dbh->prepare("delete from PRODUCTOS where PRODUCTO_NO =:PRODUCTO_NO");
        $this->stmt_modProducto   = $this->dbh->prepare("update PRODUCTOS set DESCRIPCION=:DESCRIPCION, PRECIO_ACTUAL=:PRECIO_ACTUAL, STOCK_DISPONIBLE=:STOCK_DISPONIBLE where PRODUCTO_NO=:PRODUCTO_NO");
        $this->stmt_creaProducto  = $this->dbh->prepare("insert into PRODUCTOS (PRODUCTO_NO,DESCRIPCION,PRECIO_ACTUAL,STOCK_DISPONIBLE) Values(?,?,?,?)");
    }

    // Cierro la conexión anulando todos los objectos relacioanado con la conexión PDO (stmt)
    public static function closeModelo()
    {
        if (self::$modelo != null) {
            $obj = self::$modelo;
            $obj->stmt_Productos = null;
            $obj->stmt_Producto  = null;
            $obj->stmt_borProducto  = null;
            $obj->stmt_modProducto  = null;
            $obj->stmt_creaProducto = null;
            $obj->dbh = null;
            self::$modelo = null; // Borro el objeto.
        }
    }


    // Devuelvo la lista de Usuarios
    public function getProductos(): array
    {
        $tproductos = [];
        $this->stmt_Productos->setFetchMode(PDO::FETCH_CLASS, 'Producto');

        if ($this->stmt_Productos->execute()) {
            while ($Producto = $this->stmt_Productos->fetch()) {
                $tproductos[] = $Producto;
            }
        }
        return $tproductos;
    }

    // Devuelvo un usuario o false
    public function getProducto(String $produc)
    {
        $Producto = false;

        $this->stmt_Producto->setFetchMode(PDO::FETCH_CLASS, 'Producto');
        $this->stmt_Producto->bindParam(':PRODUCTO_NO', $produc);
        if ($this->stmt_Producto->execute()) {
            if ($obj = $this->stmt_Producto->fetch()) {
                $Producto = $obj;
            }
        }
        return $Producto;
    }

    // UPDATE
    public function modProducto($produc): bool
    {

        $this->stmt_modProducto->bindValue(':PRODUCTO_NO', $produc->PRODUCTO_NO);
        $this->stmt_modProducto->bindValue(':DESCRIPCION', $produc->DESCRIPCION);
        $this->stmt_modProducto->bindValue(':PRECIO_ACTUAL', $produc->PRECIO_ACTUAL);
        $this->stmt_modProducto->bindValue(':STOCK_DISPONIBLE', $produc->STOCK_DISPONIBLE);
        $this->stmt_modProducto->execute();
        $resu = ($this->stmt_modProducto->rowCount() == 1);
        return $resu;
    }

    //INSERT
    public function addProducto($produc): bool
    {

        $this->stmt_creaProducto->execute([$produc->PRODUCTO_NO, $produc->DESCRIPCION, $produc->PRECIO_ACTUAL, $produc->STOCK_DISPONIBLE]);
        $resu = ($this->stmt_creaProducto->rowCount() == 1);
        return $resu;
    }

    //DELETE
    public function borrarProducto(String $produc): bool
    {
        $this->stmt_borProducto->bindParam(':PRODUCTO_NO', $produc);
        $this->stmt_borProducto->execute();
        $resu = ($this->stmt_borProducto->rowCount() == 1);
        return $resu;
    }

    // Evito que se pueda clonar el objeto. (SINGLETON)
    public function __clone()
    {
        trigger_error('La clonación no permitida', E_USER_ERROR);
    }
}
