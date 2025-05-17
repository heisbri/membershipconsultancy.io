<?php require "config/config.php"; ?>
<?php

    class App {
        private $pdo;

        public function __construct()
        {
            global $pdo;
            $this->pdo = $pdo;
        }
        public function getPDO(){
            return $this->pdo;
        }

        public function selectAll($query){
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public function selectOneById($query, $id){
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function getContact($service_id){
            $stmt = $this->pdo->prepare("SELECT * FROM contact WHERE service_id = ?");
            $stmt->execute([$service_id]);
            return $stmt->fetchAll();
        }

        public function getRequirements($service_id){
            $stmt = $this->pdo->prepare("SELECT * FROM requirements WHERE service_id = ?");
            $stmt->execute([$service_id]);
            return $stmt->fetchAll();
        }

        public function getFees($service_id){
            $stmt = $this->pdo->prepare("SELECT * FROM fees_payment WHERE service_id = ?");
            $stmt->execute([$service_id]);
            return $stmt->fetchAll();
        }

        public function getAllAds(){
            $stmt = $this->pdo->query("SELECT * FROM ads ORDER BY id DESC");
            return $stmt->fetchAll();
        }

        public function getAdsByService($service_id){
            $stmt = $this->pdo->prepare("SELECT * FROM ads WHERE service_id = ? ORDER BY id DESC");
            $stmt->execute([$service_id]);
            return $stmt->fetchAll();
        }

        public function getContentByservice($service_id){
            $stmt = $this->pdo->prepare("SELECT * FROM content WHERE service_id = ?");
            $stmt->execute([$service_id]);
            return $stmt->fetchAll();
        }
    }