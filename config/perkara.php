// config/perkara.php

<?php

return [
    'kategori' => [
        'Perdata' => [
            'deskripsi' => ['Gugatan Cerai', 'Gugatan Harta Gono-gini', 'Sengketa Lahan', 'Sengketa Waris', 'Wanprestasi', 'Sengketa Utang Piutang'],
            'pihak_lawan' => ['Individu', 'Perusahaan', 'Pemerintah Daerah'],
        ],
        'Pidana' => [
            'deskripsi' => ['Pencurian', 'Penggelapan', 'Penipuan', 'Narkotika', 'Penganiayaan', 'Penggelapan dalam Jabatan'],
            'pihak_lawan' => ['Jaksa Penuntut Umum', 'Kepolisian'], // 'Jaksa Penuntut Umum' ditambahkan
        ],
        'PHI' => [
            'deskripsi' => ['Perselisihan Hak', 'Perselisihan PHK', 'Perselisihan Kepentingan'],
            'pihak_lawan' => ['Perusahaan', 'Serikat Pekerja'], // 'Serikat Pekerja' ditambahkan
        ],
        'TUN' => [
            'deskripsi' => ['Sengketa Kepegawaian', 'Sengketa Izin', 'Sengketa Lelang Proyek'],
            'pihak_lawan' => ['Gubernur', 'Bupati', 'Walikota', 'Kepala Dinas', 'Badan Usaha Milik Negara'], // 'Pemerintah' diganti menjadi lebih spesifik
        ],
    ],

    // Tambahkan juga data statis agar terpusat
    'lokasi_sengketa' => [
        'Kota Pontianak', 'Kab. Kubu Raya', 'Kota Singkawang', 'Kab. Mempawah', 'Kab. Sanggau', 'Kab. Ketapang', 'Kab. Sambas', 'Kab. Landak'
    ],
    'status_bukti_awal' => [
        'Lengkap', 'Sebagian', 'Tidak Ada'
    ],
    'tahapan_hukum' => [
        'Damai' => 'Damai / Mediasi',
        'Tingkat Pertama' => 'Tingkat Pertama',
        'Banding' => 'Banding',
        'Kasasi' => 'Kasasi',
    ],
    'kompleksitas_perkara' => [
        'Sederhana' => 'Sederhana (bukti & saksi minim)',
        'Menengah' => 'Menengah (beberapa saksi/ahli)',
        'Kompleks' => 'Kompleks (banyak saksi/audit)',
    ]
];
