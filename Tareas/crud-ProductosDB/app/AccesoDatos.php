<?php
include_once "Producto.php";
include_once "config.php";

/*
 * Acceso a datos con BD Usuarios : 
 * Usando la librería mysqli
 * Uso el Patrón Singleton :Un único objeto para la clase
 * Constructor privado, y métodos estáticos 
 */
class AccesoDatos
{

    private static $modelo = null;
    private $dbh = null;

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


        $this->dbh = new mysqli(DB_SERVER, DB_USER, DB_PASSWD, DATABASE);

        if ($this->dbh->connect_error) {
            die(" Error en la conexión " . $this->dbh->connect_errno);
        }
    }

    // Cierro la conexión anulando todos los objectos relacioanado con la conexión PDO (stmt)
    public static function closeModelo()
    {
        if (self::$modelo != null) {
            $obj = self::$modelo;
            // Cierro la base de datos
            $obj->dbh->close();
            self::$modelo = null; // Borro el objeto.
        }
    }


    // SELECT Devuelvo la lista de Productos
    public function getProducto(): array
    {
        $tproductos = [];
        
        // Crea la sentencia preparada
        $stmt_productos  = $this->dbh->prepare("select * from PRODUCTOS");
        // Si falla termian el programa
        if ($stmt_productos == false) die(__FILE__ . ':' . __LINE__ . $this->dbh->error);
        // Ejecuto la sentencia stmt
        $stmt_productos->execute();
        // Obtengo los resultados
        $result=$stmt_productos->get_result();
        // Si hay resultado correctos
        if ( $result ) {
            // Obtengo cada fila de la respuesta como un objeto de tipo Usuario
            while ($produc = $result->fetch_object('Producto')) {
                $tproductos[] = $produc;
            }
        }
        // Devuelvo el array de objetos
        return $tproductos;
    }

    // SELECT Devuelvo un Producto o false
    public function get1Prod(String $nprod)
    {
        $produc = false;

        $stmt_productos   = $this->dbh->prepare("select * from PRODUCTOS where PRODUCTO_NO =?");
        if ($stmt_productos == false) die($this->dbh->error);

        // Enlazo $login con el primer ? 
        $stmt_productos->bind_param("s", $nprod);
        $stmt_productos->execute();
        $result = $stmt_productos->get_result();
        if ($result) {
            $produc = $result->fetch_object('Producto');
        }

        return $produc;
    }

    // UPDATE
    public function modProducto($produc): bool
    {

        $stmt_modproduc   = $this->dbh->prepare("update PRODUCTOS set DESCRIPCION=?, PRECIO_ACTUAL=?, STOCK_DISPONIBLE=? where PRODUCTO_NO=?");
        if ($stmt_modproduc == false) die($this->dbh->error);

        $stmt_modproduc->bind_param("ssss", $produc->DESCRIPCION, $produc->PRECIO_ACTUAL, $produc->STOCK_DISPONIBLE, $produc->PRODUCTO_NO);
        $stmt_modproduc->execute();
        $resu = ($this->dbh->affected_rows  == 1);
        return $resu;
    }

    //INSERT
    public function addProducto($produc): bool
    {

        $stmt_creapro  = $this->dbh->prepare("insert into PRODUCTOS (PRODUCTO_NO,DESCRIPCION,PRECIO_ACTUAL,STOCK_DISPONIBLE) Values(?,?,?,?)");
        if ($stmt_creapro == false) die($this->dbh->error);

        $stmt_creapro->bind_param("ssss", $produc->PRODUCTO_NO, $produc->DESCRIPCION, $produc->PRECIO_ACTUAL, $produc->STOCK_DISPONIBLE);
        $stmt_creapro->execute();
        $resu = ($this->dbh->affected_rows  == 1);
        return $resu;
    }

    //DELETE
    public function borrarProducto(String $nprod): bool
    {
        $stmt_borproduc  = $this->dbh->prepare("delete from PRODUCTOS where PRODUCTO_NO =?");
        if ($stmt_borproduc == false) die($this->dbh->error);

        $stmt_borproduc->bind_param("s", $nprod);
        $stmt_borproduc->execute();
        $resu = ($this->dbh->affected_rows  == 1);
        return $resu;
    }

    // Evito que se pueda clonar el objeto. (SINGLETON)
    public function __clone()
    {
        trigger_error('La clonación no permitida', E_USER_ERROR);
    }
}
