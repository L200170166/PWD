CREATE TABLE jenis_buku(
  kode_jenis INT PRIMARY KEY NOT NULL,
  nama_jenis VARCHAR(50) NOT NULL,
  keterangan_jenis VARCHAR(50) NOT NULL
);

CREATE TABLE buku(
  kode_buku INT PRIMARY KEY NOT NULL,
  nama_buku VARCHAR(50) NOT NULL,
  kode_jenis INT NOT NULL,
  FOREIGN KEY (kode_jenis) REFERENCES jenis_buku(kode_jenis) ON DELETE CASCADE ON UPDATE CASCADE
);