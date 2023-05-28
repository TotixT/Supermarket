<?php
    require_once("../db.php");
    class Proveedor{
        private $Proveedor_ID;
        private $Proveedor_Nombre;
        private $Telefono;
        private $Ciudad;
        protected $dbCnx;

        public function __construct($Proveedor_ID=0,$Proveedor_Nombre="",$Telefono=0,$Ciudad=""){
            $this->Proveedor_ID = $Proveedor_ID;
            $this->Proveedor_Nombre = $Proveedor_Nombre;
            $this->Telefono = $Telefono;
            $this->Ciudad = $Ciudad;
            $this->dbCnx = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        }

        // Proveedor ID
        
        public function setProveedor_ID($Proveedor_ID){
            $this->Proveedor_ID = $Proveedor_ID;
        }
        public function getProveedor_ID(){
            $this->Proveedor_ID;
        }

        // Proveedor Nombre

        public function setProveedor_Nombre($Proveedor_Nombre){
            $this->Proveedor_Nombre = $Proveedor_Nombre;
        }
        public function getProveedor_Nombre(){
            $this->Proveedor_Nombre;
        }

        // Telefono

        public function setTelefono($Telefono){
            $this->Telefono = $Telefono;
        }
        public function getTelefono(){
            $this->Telefono;
        }

        // Ciudad

        public function setCiudad($Ciudad){
            $this->Ciudad = $Ciudad;
        }
        public function getCiudad(){
            $this->Ciudad;
        }

        // Insert Data - Insert

        public function insertData(){
            try {
                $stm = $this->dbCnx->prepare("INSERT INTO proveedor (Proveedor_ID,Proveedor_Nombre,Telefono,Ciudad) VALUES (?,?,?,?)");
                $stm->execute([$this->Proveedor_ID,$this->Proveedor_Nombre,$this->Telefono,$this->Ciudad]);
            } catch (Exception $e) {
                $e -> getMessage();
            }
        }

        // Select All - Read

        public function selectAll(){
                try {
                 $stm = $this->dbCnx->prepare("SELECT * FROM proveedor");
                 $stm->execute();
                 return $stm->fetchAll();
            } catch (Exception $e) {
                $e -> getMessage();
            }
        }

        // Delete Data - Delete

        public function deleteData(){
            try {
                $stm = $this->dbCnx->prepare("DELETE FROM proveedor WHERE Proveedor_ID=?");
                $stm->execute([$this->Proveedor_ID]);
                return $stm->fetchAll();
                echo "<script> alert('Borrado Exitosamente'); document.location='proveedores.php'</script>";
            } catch (Exception $e) {
                $e -> getMessage();
            }
        }

        // Select One - Seleccion de un dato especifico por ID

        public function selectOne(){
            try {
                $stm = $this->dbCnx->prepare("SELECT * FROM proveedor WHERE Proveedor_ID=?");
                $stm->execute([$this->Proveedor_ID]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                $e -> getMessage();
            }
        }

        // Update Data - Update

        public function update(){
            try {
                $stm = $this->dbCnx->prepare("UPDATE proveedor SET Proveedor_Nombre=?,Telefono=?,Ciudad=? WHERE Proveedor_ID=?");
                $stm->execute([$this->Proveedor_Nombre,$this->Telefono,$this->Ciudad,$this->Proveedor_ID]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                $e -> getMessage();
            }
        }
    }
?>