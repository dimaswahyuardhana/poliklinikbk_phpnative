<?php
    class Dokter{
        //member 1 variable
        private $koneksi;
        //member 2 konstruktor untuk koneksi database
        public function __construct()
        {
            global $dbh; //panggil instance objek di koneksi.php
            $this->koneksi = $dbh;
        }
        //member 3 method2 CRUD
        public function dataDokter(){
            $sql = " SELECT d.*,  
            p.nama_poli
            FROM dokter d 
            INNER JOIN poli p ON p.id = d.id_poli;
                ORDER BY d.id DESC";
            //$data_pegawai = $dbh->query($sql);
            //menggunakan mekanisme prepare statement PDO
            $ps = $this->koneksi->prepare($sql);
            $ps->execute();
            $rs = $ps->fetchAll();
            return $rs;
        }

        public function simpan($data){
            $sql = "INSERT INTO dokter (nama,nip,password, alamat, no_hp, id_poli) VALUES (?,?,?,?,?,?)";
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            //menggunakan mekanisme prepare statement PDO
            $ps = $this->koneksi->prepare($sql);
            $ps->execute($data);
        }

        public function getDokter($id){
            $sql = " SELECT d.*,  
                p.nama_poli
                FROM dokter d 
                INNER JOIN poli p ON p.id = d.id_poli
                WHERE d.id = ?";
            //menggunakan mekanisme prepare statement PDO
            $ps = $this->koneksi->prepare($sql);
            $ps->execute([$id]);
            $rs = $ps->fetch();
            return $rs;
        }   
        
        public function ubah($data){
            $sql = "UPDATE dokter SET nama=?,nip=?,password=? alamat=?, no_hp=?, id_poli=? WHERE id=?";
            //menggunakan mekanisme prepare statement PDO
            $ps = $this->koneksi->prepare($sql);
            $ps->execute($data);
        }

        public function hapus($id){
            $sql = "DELETE FROM dokter WHERE id=?";
            //menggunakan mekanisme prepare statement PDO
            $ps = $this->koneksi->prepare($sql);
            $ps->execute([$id]);
        }

        public function registerDokter($nama, $nip, $password, $alamat, $no_hp) {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    
            try {
                $stmt = $this->koneksi->prepare("INSERT INTO dokter (nama, nip, password, alamat, no_hp) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$nama, $nip, $hashedPassword, $alamat, $no_hp]);
                return true;
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                return false;
            }
        }
    
        public function getUserByNip($nip) {
            try {
                $stmt = $this->koneksi->prepare("SELECT * FROM dokter WHERE nip = ?");
                $stmt->execute([$nip]);
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
                $data['role']='dokter';
                return $data;
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                return null;
            }
        }
        
    }
?>