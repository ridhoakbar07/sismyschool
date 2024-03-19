USE `myschool`;

-- Membuang data untuk tabel myschool.profiles: ~4 rows (lebih kurang)
INSERT INTO `profiles` (`id`, `nama_awal`, `nama_akhir`, `alamat`, `kontak`, `created_at`, `updated_at`) VALUES
	('9b962a0e-1fa4-4c5a-b15f-81e86a85298c', 'H. Syamsuri', 'Baderi', 'Benua Anyar', '08139101919', '2024-03-17 08:22:09', '2024-03-17 08:22:09'),
	('9b962a50-74a6-42b4-bd1e-8c3f9d4d9104', 'Ridho', 'Akbar', 'Sungai Andai', '09123981', '2024-03-17 08:22:53', '2024-03-17 08:22:53'),
	('9b962aa6-3b8d-4413-8ac0-07b9dae9f34e', 'Syamsuddin', 'Tarmiji', '-', '018010101', '2024-03-17 08:23:49', '2024-03-17 08:23:49'),
	('9b962bbc-a120-4eab-848e-5165610bf26f', 'Dede', 'Sutardi', '-', '1231231', '2024-03-17 08:26:51', '2024-03-17 08:26:51'),
	('9b962cff-d610-4f9d-9e36-345ca6f9a076', 'Hidayah', 'Fitriani', '-', '01081801', '2024-03-17 08:30:23', '2024-03-17 08:30:23');

-- Membuang data untuk tabel myschool.users: ~5 rows (lebih kurang)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `profile_id`, `remember_token`, `created_at`, `updated_at`) VALUES
	('26969e2d-5a08-4a21-9e48-47e028cbf0de', 'ketuayayasan01', 'yayasan@mail.com', '2024-03-17 08:18:34', '$2y$12$lYw6UPauOiqe6b7YK8ctoe1LDI9KkohhbyV2OBrj9bsKl4qQ/JrmW', 'Ketua Yayasan', '9b962a0e-1fa4-4c5a-b15f-81e86a85298c', 'T300xMVkSb', '2024-03-17 08:18:34', '2024-03-17 08:26:00'),
	('317cb2e5-386d-4614-a8e5-441a7dcfd10e', 'Admin', 'admin@mail.com', '2024-03-17 08:18:33', '$2y$12$OaLMM32axXJx7PJE3zvq9e1VNOOUC.JRRRvt0l.9Zr3/fVCaH8sIi', 'Admin', '9b962a50-74a6-42b4-bd1e-8c3f9d4d9104', 'lO0naxF0Qo', '2024-03-17 08:18:33', '2024-03-17 08:22:58'),
	('9b962af5-0e63-4f1d-bf44-71731c6a8025', 'kepalasekolah01', 'kepala.sdit@mail.com', NULL, '$2y$12$zhIgG0xgn2aaOynSWrnB2OVPtyLugVO7d/9cKwqrCWAOeq.KPhNXS', 'Kepala Sekolah', '9b962bbc-a120-4eab-848e-5165610bf26f', NULL, '2024-03-17 08:24:41', '2024-03-17 08:26:59'),
	('9b962c03-0227-49b4-ae14-8e5e5ad973af', 'bendahara01', 'bendahara.sdit@mail.com', NULL, '$2y$12$5CApYaZfmf1FuP1NmzobCeFWnmAqbxOrNfY5rGv2C0aXMvC5BzHfm', 'Bendahara', '9b962cff-d610-4f9d-9e36-345ca6f9a076', NULL, '2024-03-17 08:27:37', '2024-03-17 08:30:28'),
	('ba4470bf-08d0-437a-bc12-b935982e685b', 'walimurid01', 'orangtua@mail.com', '2024-03-17 08:18:33', '$2y$12$iiSvDSqg2OUVC.9xoQIPk.OKQtyvwyW6z2CuA4tkbEZN5xUVRfqoe', 'Orang Tua', '9b962aa6-3b8d-4413-8ac0-07b9dae9f34e', 'fKuEPLDGMR', '2024-03-17 08:18:34', '2024-03-17 08:27:14');

-- Membuang data untuk tabel myschool.yayasans: ~0 rows (lebih kurang)
INSERT INTO `yayasans` (`id`, `nama`, `tanggal_pendirian`, `alamat`, `telp`, `email`, `visi_misi`, `no_status_hukum`, `pimpinan_id`, `created_at`, `updated_at`) VALUES
	('9b962ca0-274f-45ee-ba6c-0f25c6c2593a', 'SIT Al Firdaus', '2024-03-01', 'Benua Anyar', '0511202010', 'sit.alfirdaus@mail.com', 'Sekolah Islam Terdepan', '-', '26969e2d-5a08-4a21-9e48-47e028cbf0de', '2024-03-17 08:29:20', '2024-03-17 08:29:20');

-- Membuang data untuk tabel myschool.sekolahs: ~4 rows (lebih kurang)
INSERT INTO `sekolahs` (`id`, `nama`, `alamat`, `telp`, `email`, `jenis`, `yayasan_id`, `kepsek_id`, `bendahara_id`, `created_at`, `updated_at`) VALUES
	('9b962d73-1e17-4b72-b2ef-2a9be4238ef6', 'SIT Al Firdaus', 'Benua Anyar', '0511202010', 'sit.alfirdaus@mail.com', 'Utama', '9b962ca0-274f-45ee-ba6c-0f25c6c2593a', '9b962af5-0e63-4f1d-bf44-71731c6a8025', '9b962c03-0227-49b4-ae14-8e5e5ad973af', '2024-03-17 08:31:39', '2024-03-17 08:31:39'),
	('9b962dc7-69cb-4c11-b2b1-93d844978da0', 'SD IT Al Firdaus', 'Benua Anyar', '0511202010', 'sit.alfirdaus@mail.com', 'Utama', '9b962ca0-274f-45ee-ba6c-0f25c6c2593a', '9b962af5-0e63-4f1d-bf44-71731c6a8025', '9b962c03-0227-49b4-ae14-8e5e5ad973af', '2024-03-17 08:32:34', '2024-03-17 08:32:34'),
	('9b962e08-3a65-4149-8e5e-0cbf801a4f40', 'SMP IT Al Firdaus', 'Benua Anyar', '0511202010', 'sit.alfirdaus@mail.com', 'Utama', '9b962ca0-274f-45ee-ba6c-0f25c6c2593a', '9b962af5-0e63-4f1d-bf44-71731c6a8025', '9b962c03-0227-49b4-ae14-8e5e5ad973af', '2024-03-17 08:33:16', '2024-03-17 08:33:16'),
	('9b962e55-f557-43d8-9a79-6c1815932843', 'SMA IT Al Firdaus', '-', '0511202010', 'sit.alfirdaus@mail.com', 'Utama', '9b962ca0-274f-45ee-ba6c-0f25c6c2593a', '9b962af5-0e63-4f1d-bf44-71731c6a8025', '9b962c03-0227-49b4-ae14-8e5e5ad973af', '2024-03-17 08:34:07', '2024-03-17 08:34:07');