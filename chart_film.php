SELECT SUM(harga),DATE(`waktu_transaksi`) as tanggal_transaksi,film.nama_film FROM `film` LEFT JOIN transaksi ON transaksi.nama_film=film.nama_film WHERE film.kode_film=3 AND `waktu_transaksi` BETWEEN film.awal_tayang AND film.akhir_tayang GROUP BY DATE(`waktu_transaksi`),film.nama_film