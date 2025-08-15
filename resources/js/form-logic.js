/**
 * Logika untuk formulir prediksi DUA-langkah.
 * Disesuaikan dengan struktur blade 'predict_form.blade.php' yang baru.
 * Menangani pemilihan kategori dan pembaruan dropdown dinamis.
 */
document.addEventListener('DOMContentLoaded', function () {

    // --- Definisi Elemen DOM ---
    // REVISED: Logika disederhanakan menjadi dua elemen langkah utama.
    const step1 = document.getElementById('step-1');
    const stepDetails = document.getElementById('step-details'); // Menggantikan 'step-2' & 'step-3'
    const categoryButtons = document.querySelectorAll('.category-button');

    // Input Form
    const inputKategoriPerkara = document.getElementById('kategori_perkara');
    const deskripsiSelect = document.getElementById('deskripsi_perkara');
    const lawanSelect = document.getElementById('subjek_hukum_lawan');

    // --- Data untuk Dropdown Dinamis (Tetap sama) ---
    // PENTING: Data ini harus sinkron dengan 'bobot_kasus_map' di file model.py Anda.
    const deskripsiData = {
        Perdata: ['Gugatan Cerai', 'Gugatan Harta Gono-gini', 'Sengketa Lahan', 'Sengketa Waris', 'Wanprestasi', 'Sengketa Utang Piutang'],
        Pidana: ['Pencurian', 'Penggelapan', 'Penipuan', 'Narkotika', 'Penganiayaan', 'Penggelapan dalam Jabatan'],
        PHI: ['Perselisihan Hak', 'Perselisihan PHK', 'Perselisihan Kepentingan'],
        TUN: ['Sengketa Kepegawaian', 'Sengketa Izin', 'Sengketa Lelang Proyek']
    };

    const lawanData = {
        Perdata: ['Individu', 'Perusahaan'],
        Pidana: ['Jaksa Penuntut Umum'],
        PHI: ['Perusahaan', 'Serikat Pekerja'],
        TUN: ['Pemerintah', 'Badan Usaha Milik Negara']
    };

    // --- Validasi Elemen ---
    // REVISED: Hanya memeriksa elemen yang ada di struktur baru.
    if (!step1 || !stepDetails || categoryButtons.length === 0) {
        console.error("Error: Elemen langkah (step-1, step-details) atau tombol kategori tidak ditemukan. Periksa ID di file blade.");
        return;
    }

    // --- Event Listener ---

    // Saat tombol kategori di Step 1 diklik
    categoryButtons.forEach(button => {
        button.addEventListener('click', function () {
            const selectedCategory = this.dataset.category;

            if (inputKategoriPerkara) {
                inputKategoriPerkara.value = selectedCategory;
            }

            // Perbarui dropdown di langkah detail berdasarkan kategori
            updateDetailDropdowns(selectedCategory);

            // REVISED: Logika navigasi disederhanakan. Langsung ke langkah detail.
            step1.style.display = 'none';
            stepDetails.style.display = 'block';
        });
    });

    // --- Fungsi Helper ---

    /**
     * Memperbarui isi dropdown di langkah detail berdasarkan kategori.
     * @param {string} category - Kategori yang dipilih (misal: 'Perdata').
     */
    function updateDetailDropdowns(category) {
        if (!deskripsiSelect || !lawanSelect) return;

        // Kosongkan pilihan lama
        deskripsiSelect.innerHTML = '';
        lawanSelect.innerHTML = '';

        // Tambahkan opsi default yang tidak bisa dipilih
        deskripsiSelect.add(new Option('Pilih Spesifik Masalah...', '', true, true));
        lawanSelect.add(new Option('Pilih Pihak Lawan...', '', true, true));
        deskripsiSelect.options[0].disabled = true;
        lawanSelect.options[0].disabled = true;

        // Isi dengan data baru jika kategori valid
        if (deskripsiData[category]) {
            deskripsiData[category].forEach(item => deskripsiSelect.add(new Option(item, item)));
        }
        if (lawanData[category]) {
            lawanData[category].forEach(item => lawanSelect.add(new Option(item, item)));
        }
    }

    // REMOVED: Fungsi goToStep() yang kompleks tidak lagi diperlukan.
    // Inisialisasi awal (menyembunyikan stepDetails) sudah ditangani oleh inline style di file blade.
});
