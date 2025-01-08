CREATE TABLE data_babaran (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tanggal_ambil DATE NOT NULL,
    pengambil VARCHAR(255) NOT NULL,
    ukuran VARCHAR(50) NOT NULL,
    jumlah VARCHAR(50) NOT NULL,
    tanggal_kembali DATE DEFAULT NULL,
    pengembali VARCHAR(255) DEFAULT NULL,
    rincian_ukuran VARCHAR(255) DEFAULT NULL,
    jumlah_kembali VARCHAR(50) NOT NULL,
    motif VARCHAR(255) DEFAULT NULL, -- Path file untuk motif
    model VARCHAR(255) DEFAULT NULL,
    penjahit VARCHAR(255) DEFAULT NULL
);
CREATE TABLE master_pengambil (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_pengambil VARCHAR(100) NOT NULL
);
CREATE TABLE master_ukuran (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ukuran INT NOT NULL
);
CREATE TABLE master_model (
    id INT AUTO_INCREMENT PRIMARY KEY,
    model VARCHAR(100) NOT NULL
);
    CREATE TABLE master_penjahit (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_penjahit VARCHAR(100) NOT NULL
);
    CREATE TABLE master_pengembali (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_pengembali VARCHAR(100) NOT NULL
);
 CREATE TABLE master_rincian (
    id INT AUTO_INCREMENT PRIMARY KEY,
    rincian_ukuran VARCHAR(100) NOT NULL
);

