/* ============================================
   NeroPC - Sistem Informasi Penjualan PC
   JavaScript Application

   Wajib menggunakan:
   ✅ const/let (tidak pakai var)
   ✅ Arrow function
   ✅ Array methods (map, filter, reduce, find, forEach, etc.)
   ✅ DOM manipulation
   ✅ Event delegation
   ✅ localStorage
   ============================================ */

"use strict";

// ============================================
// STORAGE KEY & DATA
// ============================================
const STORAGE_KEY_PRODUCTS = "neropc_products";


const loadProducts = () => {
  const stored = localStorage.getItem(STORAGE_KEY_PRODUCTS);
  if (stored) return JSON.parse(stored);


  return [
    {
      id: 1,
      kodePc: "NPC-001",
      namaPc: "NeroPC Starter",
      kategori: "Entry Level",
      prosesor: "Intel Core i3-13100",
      vga: "NVIDIA GTX 1650 4GB",
      ram: "8GB DDR4",
      storage: "256GB SSD",
      motherboard: "ASUS H610M-K",
      psu: "Be Quiet 500W 80+",
      casing: "Infinity Casing ATX",
      harga: 5100000,
      stok: 12,
    },
    {
      id: 2,
      kodePc: "NPC-002",
      namaPc: "NeroPC Gaming",
      kategori: "Mid Range",
      prosesor: "Intel Core i5-13400F",
      vga: "NVIDIA RTX 3060 12GB",
      ram: "16GB DDR4",
      storage: "512GB NVMe SSD",
      motherboard: "MSI B660M Mortar",
      psu: "Seasonic Focus 650W 80+ Gold",
      casing: "NZXT H5 Flow",
      harga: 8500000,
      stok: 7,
    },
    {
      id: 3,
      kodePc: "NPC-003",
      namaPc: "NeroPC Pro Gaming",
      kategori: "Mid Range",
      prosesor: "AMD Ryzen 5 7600X",
      vga: "AMD RX 7600 8GB",
      ram: "16GB DDR5",
      storage: "1TB NVMe SSD",
      motherboard: "ASUS B650M-A",
      psu: "Corsair RM650 80+ Gold",
      casing: "Lian Li Lancool 216",
      harga: 9200000,
      stok: 4,
    },
    {
      id: 4,
      kodePc: "NPC-004",
      namaPc: "NeroPC Ultra",
      kategori: "High End",
      prosesor: "Intel Core i7-14700K",
      vga: "NVIDIA RTX 4070 12GB",
      ram: "32GB DDR5",
      storage: "2TB NVMe SSD",
      motherboard: "ASUS ROG Strix B760-F",
      psu: "Corsair RM850x 80+ Gold",
      casing: "Lian Li O11 Dynamic",
      harga: 18750000,
      stok: 3,
    },
    {
      id: 5,
      kodePc: "NPC-005",
      namaPc: "NeroPC Workstation",
      kategori: "High End",
      prosesor: "AMD Ryzen 9 7950X",
      vga: "NVIDIA RTX 4090 24GB",
      ram: "64GB DDR5",
      storage: "4TB NVMe SSD",
      motherboard: "ASUS ROG Crosshair X670E",
      psu: "Seasonic Prime TX 1000W",
      casing: "Fractal Design Torrent",
      harga: 45000000,
      stok: 2,
    },
    {
      id: 6,
      kodePc: "NPC-006",
      namaPc: "NeroPC Office Basic",
      kategori: "Entry Level",
      prosesor: "AMD Ryzen 3 4100",
      vga: "AMD Radeon Vega 6 (iGPU)",
      ram: "8GB DDR4",
      storage: "256GB SSD",
      motherboard: "Gigabyte A520M-K",
      psu: "Generic 400W",
      casing: "Office Micro ATX Case",
      harga: 3500000,
      stok: 20,
    },
  ];
};

let products = loadProducts();
let editingId = null;
let deleteTargetId = null;

// DOM ELEMENTS
const formPc = document.getElementById("form-pc");
const formTitle = document.getElementById("form-title");
const btnSubmit = document.getElementById("btn-submit");
const btnResetForm = document.getElementById("btn-reset-form");

// Form inputs
const inputKode = document.getElementById("kode-pc");
const inputNama = document.getElementById("nama-pc");
const inputKategori = document.getElementById("kategori-pc");
const inputProsesor = document.getElementById("prosesor-pc");
const inputVga = document.getElementById("vga-pc");
const inputRam = document.getElementById("ram-pc");
const inputStorage = document.getElementById("storage-pc");
const inputMotherboard = document.getElementById("motherboard-pc");
const inputPsu = document.getElementById("psu-pc");
const inputCasing = document.getElementById("casing-pc");
const inputHarga = document.getElementById("harga-pc");
const inputStok = document.getElementById("stok-pc");

// Error elements
const errorKode = document.getElementById("error-kode");
const errorNama = document.getElementById("error-nama");
const errorKategori = document.getElementById("error-kategori");
const errorProsesor = document.getElementById("error-prosesor");
const errorVga = document.getElementById("error-vga");
const errorRam = document.getElementById("error-ram");
const errorStorage = document.getElementById("error-storage");
const errorMotherboard = document.getElementById("error-motherboard");
const errorPsu = document.getElementById("error-psu");
const errorCasing = document.getElementById("error-casing");
const errorHarga = document.getElementById("error-harga");
const errorStok = document.getElementById("error-stok");

// Table & filter
const tbodyPc = document.getElementById("tbody-pc");
const tableWrapper = document.getElementById("table-wrapper");
const emptyState = document.getElementById("empty-state");
const searchInput = document.getElementById("search-input");
const filterKategori = document.getElementById("filter-kategori");

// Statistics
const statTotalProduk = document.getElementById("stat-total-produk");
const statJumlahStok = document.getElementById("stat-jumlah-stok");
const statTotalPendapatan = document.getElementById("stat-total-pendapatan");
const statPesananBulan = document.getElementById("stat-pesanan-bulan");
const statStokMenipis = document.getElementById("stat-stok-menipis");
const statPcTerjual = document.getElementById("stat-pc-terjual");

// Modal hapus
const modalOverlay = document.getElementById("modal-overlay");
const modalMessage = document.getElementById("modal-message");
const modalCancel = document.getElementById("modal-cancel");
const modalConfirm = document.getElementById("modal-confirm");

// Toast
const toastContainer = document.getElementById("toast-container");

// UTILITY FUNCTIONS

const formatRupiah = (angka) => {
  return new Intl.NumberFormat("id-ID", {
    style: "currency",
    currency: "IDR",
    minimumFractionDigits: 0,
    maximumFractionDigits: 0,
  }).format(angka);
};

const saveProducts = () => {
  localStorage.setItem(STORAGE_KEY_PRODUCTS, JSON.stringify(products));
};

const showToast = (message, type = "success") => {
  const icons = { success: "✅", error: "❌", info: "ℹ️" };
  const toast = document.createElement("div");
  toast.className = `toast toast-${type}`;
  toast.innerHTML = `<span class="toast-icon">${icons[type]}</span><span>${message}</span>`;
  toastContainer.appendChild(toast);
  setTimeout(() => toast.remove(), 3200);
};

// FORM VALIDATION

const allInputs = () => [
  inputKode, inputNama, inputKategori, inputProsesor, inputVga,
  inputRam, inputStorage, inputMotherboard, inputPsu, inputCasing,
  inputHarga, inputStok,
];

const allErrors = () => [
  errorKode, errorNama, errorKategori, errorProsesor, errorVga,
  errorRam, errorStorage, errorMotherboard, errorPsu, errorCasing,
  errorHarga, errorStok,
];

const clearErrors = () => {
  allInputs().forEach((el) => el.classList.remove("input-error"));
  allErrors().forEach((el) => (el.textContent = ""));
};

const setError = (inputEl, errorEl, msg) => {
  inputEl.classList.add("input-error");
  errorEl.textContent = msg;
};

const clearError = (inputEl, errorEl) => {
  inputEl.classList.remove("input-error");
  errorEl.textContent = "";
};

const validateForm = () => {
  clearErrors();
  let valid = true;

  // Helper: cek field teks wajib
  const checkRequired = (input, errorEl, label, minLen = 2) => {
    const val = input.value.trim();
    if (!val) {
      setError(input, errorEl, `${label} wajib diisi`);
      valid = false;
    } else if (val.length < minLen) {
      setError(input, errorEl, `${label} minimal ${minLen} karakter`);
      valid = false;
    }
  };

  // Kode PC — cek duplikat
  const kodeVal = inputKode.value.trim();
  if (!kodeVal) {
    setError(inputKode, errorKode, "Kode PC wajib diisi");
    valid = false;
  } else if (kodeVal.length < 3) {
    setError(inputKode, errorKode, "Kode PC minimal 3 karakter");
    valid = false;
  } else {
    // Array method: find — cek duplikat
    const dup = products.find(
      (p) => p.kodePc.toLowerCase() === kodeVal.toLowerCase() && p.id !== editingId
    );
    if (dup) {
      setError(inputKode, errorKode, "Kode PC sudah terdaftar");
      valid = false;
    }
  }

  checkRequired(inputNama, errorNama, "Nama produk PC", 3);

  // Kategori
  if (!inputKategori.value) {
    setError(inputKategori, errorKategori, "Kategori wajib dipilih");
    valid = false;
  }

  // Spesifikasi komponen
  checkRequired(inputProsesor, errorProsesor, "Prosesor");
  checkRequired(inputVga, errorVga, "VGA");
  checkRequired(inputRam, errorRam, "RAM");
  checkRequired(inputStorage, errorStorage, "Storage");
  checkRequired(inputMotherboard, errorMotherboard, "Motherboard");
  checkRequired(inputPsu, errorPsu, "PSU");
  checkRequired(inputCasing, errorCasing, "Casing");

  // Harga
  const hargaVal = inputHarga.value;
  if (hargaVal === "" || hargaVal === null) {
    setError(inputHarga, errorHarga, "Harga wajib diisi");
    valid = false;
  } else if (parseInt(hargaVal) <= 0 || isNaN(parseInt(hargaVal))) {
    setError(inputHarga, errorHarga, "Harga harus lebih dari 0");
    valid = false;
  }

  // Stok
  const stokVal = inputStok.value;
  if (stokVal === "" || stokVal === null) {
    setError(inputStok, errorStok, "Stok wajib diisi");
    valid = false;
  } else if (parseInt(stokVal) < 0 || isNaN(parseInt(stokVal))) {
    setError(inputStok, errorStok, "Stok harus angka positif");
    valid = false;
  }

  return valid;
};

// RENDER TABLE

const getKategoriClass = (kat) => {
  const map = {
    "Entry Level": "kat-entry",
    "Mid Range": "kat-mid",
    "High End": "kat-high",
  };
  return map[kat] || "kat-entry";
};

const renderTable = () => {
  const searchTerm = searchInput.value.trim().toLowerCase();
  const filterVal = filterKategori.value;

  // Array method: filter — pencarian & filter kategori
  const filtered = products.filter((pc) => {
    const matchSearch =
      pc.namaPc.toLowerCase().includes(searchTerm) ||
      pc.kodePc.toLowerCase().includes(searchTerm);
    const matchFilter = filterVal === "" || pc.kategori === filterVal;
    return matchSearch && matchFilter;
  });

  if (filtered.length === 0) {
    tbodyPc.innerHTML = "";
    emptyState.classList.add("visible");
    tableWrapper.style.display = "none";
  } else {
    emptyState.classList.remove("visible");
    tableWrapper.style.display = "block";

    // Array method: map + join — render baris tabel
    tbodyPc.innerHTML = filtered
      .map((pc, idx) => {
        let stokClass = "stok-aman";
        let stokIcon = "✅";
        if (pc.stok === 0) {
          stokClass = "stok-habis";
          stokIcon = "🔴";
        } else if (pc.stok < 5) {
          stokClass = "stok-menipis";
          stokIcon = "⚠️";
        }

        const isEditing = pc.id === editingId;

        return `
          <tr class="${isEditing ? "row-editing" : ""}" data-id="${pc.id}">
            <td>${idx + 1}</td>
            <td class="kode-cell">${pc.kodePc}</td>
            <td><strong>${pc.namaPc}</strong></td>
            <td><span class="kategori-badge ${getKategoriClass(pc.kategori)}">${pc.kategori}</span></td>
            <td>
              <ul class="spec-list">
                <li><span class="spec-label">CPU:</span> ${pc.prosesor}</li>
                <li><span class="spec-label">GPU:</span> ${pc.vga}</li>
                <li><span class="spec-label">RAM:</span> ${pc.ram}</li>
                <li><span class="spec-label">SSD:</span> ${pc.storage}</li>
                <li><span class="spec-label">MB:</span> ${pc.motherboard}</li>
                <li><span class="spec-label">PSU:</span> ${pc.psu}</li>
                <li><span class="spec-label">Case:</span> ${pc.casing}</li>
              </ul>
            </td>
            <td class="harga-cell">${formatRupiah(pc.harga)}</td>
            <td><span class="stok-badge ${stokClass}">${stokIcon} ${pc.stok}</span></td>
            <td>
              <div class="aksi-cell">
                <button class="btn-action btn-edit" data-action="edit" data-id="${pc.id}" title="Edit produk">
                  ✏️ Edit
                </button>
                <button class="btn-action btn-delete" data-action="delete" data-id="${pc.id}" title="Hapus produk">
                  🗑️ Hapus
                </button>
              </div>
            </td>
          </tr>
        `;
      })
      .join("");
  }
};

// UPDATE STATISTIK

const updateStats = () => {
  // Total produk PC
  statTotalProduk.textContent = products.length;

  // Jumlah stok keseluruhan — reduce
  const totalStok = products.reduce((sum, pc) => sum + pc.stok, 0);
  statJumlahStok.textContent = totalStok;

  // Total nilai inventaris — reduce
  const totalNilai = products.reduce((sum, pc) => sum + pc.stok * pc.harga, 0);
  statTotalPendapatan.textContent = formatRupiah(totalNilai);

  // Total produk per kategori (untuk pesanan bulan ini, kita hitung jumlah produk yang ada)
  const totalProdukStok = products.reduce((sum, pc) => sum + pc.stok, 0);
  statPesananBulan.textContent = totalProdukStok;

  // Stok menipis (<5) — filter
  const menipisCount = products.filter((pc) => pc.stok < 5).length;
  statStokMenipis.textContent = menipisCount;

  // PC terjual (stok habis = 0)
  const habisCount = products.filter((pc) => pc.stok === 0).length;
  statPcTerjual.textContent = habisCount;
};

// FORM SUBMIT (TAMBAH / EDIT)

const handleSubmit = (e) => {
  e.preventDefault();

  if (!validateForm()) {
    showToast("Mohon perbaiki data yang tidak valid", "error");
    return;
  }

  const pcData = {
    kodePc: inputKode.value.trim(),
    namaPc: inputNama.value.trim(),
    kategori: inputKategori.value,
    prosesor: inputProsesor.value.trim(),
    vga: inputVga.value.trim(),
    ram: inputRam.value.trim(),
    storage: inputStorage.value.trim(),
    motherboard: inputMotherboard.value.trim(),
    psu: inputPsu.value.trim(),
    casing: inputCasing.value.trim(),
    harga: parseInt(inputHarga.value),
    stok: parseInt(inputStok.value),
  };

  if (editingId !== null) {
    products = products.map((pc) => {
      if (pc.id === editingId) {
        return { ...pc, ...pcData };
      }
      return pc;
    });
    showToast(`"${pcData.namaPc}" berhasil diperbarui`, "success");
    cancelEdit();
  } else {
    const newPc = {
      id: Date.now(),
      ...pcData,
    };
    products.push(newPc);
    showToast(`"${pcData.namaPc}" berhasil ditambahkan`, "success");
  }

  formPc.reset();
  clearErrors();
  saveProducts();
  renderTable();
  updateStats();
};

// EDIT MODE

const startEdit = (id) => {
  const pc = products.find((p) => p.id === id);
  if (!pc) return;

  editingId = id;

  inputKode.value = pc.kodePc;
  inputNama.value = pc.namaPc;
  inputKategori.value = pc.kategori;
  inputProsesor.value = pc.prosesor;
  inputVga.value = pc.vga;
  inputRam.value = pc.ram;
  inputStorage.value = pc.storage;
  inputMotherboard.value = pc.motherboard;
  inputPsu.value = pc.psu;
  inputCasing.value = pc.casing;
  inputHarga.value = pc.harga;
  inputStok.value = pc.stok;

  // Ubah tampilan form
  formTitle.textContent = "✏️ Edit Produk PC";
  btnSubmit.innerHTML = '<span class="btn-icon">💾</span> Simpan Perubahan';
  btnResetForm.style.display = "inline-flex";

  // Scroll ke form
  document.getElementById("form-section").scrollIntoView({ behavior: "smooth", block: "start" });
  setTimeout(() => inputKode.focus(), 400);

  renderTable();
  showToast(`Mengedit: ${pc.namaPc}`, "info");
};

const cancelEdit = () => {
  editingId = null;
  formPc.reset();
  clearErrors();
  formTitle.textContent = "🖥️ Tambah Produk PC Baru";
  btnSubmit.innerHTML = '<span class="btn-icon">+</span> Tambah Produk PC';
  btnResetForm.style.display = "none";
  renderTable();
};

// HAPUS (DELETE) dengan konfirmasi modal

const showDeleteModal = (id) => {
  // Array method: find
  const pc = products.find((p) => p.id === id);
  if (!pc) return;
  deleteTargetId = id;
  modalMessage.textContent = `Apakah Anda yakin ingin menghapus "${pc.namaPc}" (${pc.kodePc})? Tindakan ini tidak dapat dibatalkan.`;
  modalOverlay.classList.add("active");
};

const closeDeleteModal = () => {
  modalOverlay.classList.remove("active");
  deleteTargetId = null;
};

const confirmDelete = () => {
  if (deleteTargetId === null) return;

  const pc = products.find((p) => p.id === deleteTargetId);
  const nama = pc ? pc.namaPc : "Produk";

  // Array method: filter — hapus produk
  products = products.filter((p) => p.id !== deleteTargetId);

  if (editingId === deleteTargetId) cancelEdit();

  closeDeleteModal();
  saveProducts();
  renderTable();
  updateStats();
  showToast(`"${nama}" berhasil dihapus`, "success");
};

// EVENT DELEGATION: Aksi pada tabel

const handleTableClick = (e) => {
  const btn = e.target.closest("[data-action]");
  if (!btn) return;

  const action = btn.dataset.action;
  const id = parseInt(btn.dataset.id);

  if (action === "edit") {
    startEdit(id);
  } else if (action === "delete") {
    showDeleteModal(id);
  }
};

// PENCARIAN REAL-TIME & FILTER

const handleSearch = () => renderTable();
const handleFilter = () => renderTable();

// REALTIME FIELD VALIDATION

const setupRealtimeValidation = () => {
  const watchText = (input, errorEl, label, minLen = 2) => {
    input.addEventListener("input", () => {
      const val = input.value.trim();
      if (val.length > 0 && val.length < minLen) {
        setError(input, errorEl, `${label} minimal ${minLen} karakter`);
      } else {
        clearError(input, errorEl);
      }
    });
  };

  watchText(inputKode, errorKode, "Kode PC", 3);
  watchText(inputNama, errorNama, "Nama PC", 3);
  watchText(inputProsesor, errorProsesor, "Prosesor");
  watchText(inputVga, errorVga, "VGA");
  watchText(inputRam, errorRam, "RAM");
  watchText(inputStorage, errorStorage, "Storage");
  watchText(inputMotherboard, errorMotherboard, "Motherboard");
  watchText(inputPsu, errorPsu, "PSU");
  watchText(inputCasing, errorCasing, "Casing");

  inputKategori.addEventListener("change", () => {
    if (inputKategori.value) clearError(inputKategori, errorKategori);
  });

  inputHarga.addEventListener("input", () => {
    const val = inputHarga.value;
    if (val !== "" && (parseInt(val) <= 0 || isNaN(parseInt(val)))) {
      setError(inputHarga, errorHarga, "Harga harus lebih dari 0");
    } else {
      clearError(inputHarga, errorHarga);
    }
  });

  inputStok.addEventListener("input", () => {
    const val = inputStok.value;
    if (val !== "" && (parseInt(val) < 0 || isNaN(parseInt(val)))) {
      setError(inputStok, errorStok, "Stok harus angka positif");
    } else {
      clearError(inputStok, errorStok);
    }
  });
};

// NAV ACTIVE STATE

const setupNavigation = () => {
  const navLinks = document.querySelectorAll(".nav-link");
  navLinks.forEach((link) => {
    link.addEventListener("click", () => {
      navLinks.forEach((l) => l.classList.remove("active"));
      link.classList.add("active");
    });
  });
};

// INIT APP

const initApp = () => {
  // Event listeners
  formPc.addEventListener("submit", handleSubmit);
  btnResetForm.addEventListener("click", cancelEdit);

  // Event delegation pada tabel
  tbodyPc.addEventListener("click", handleTableClick);

  // Pencarian real-time
  searchInput.addEventListener("input", handleSearch);

  // Filter kategori
  filterKategori.addEventListener("change", handleFilter);

  // Modal hapus
  modalCancel.addEventListener("click", closeDeleteModal);
  modalConfirm.addEventListener("click", confirmDelete);
  modalOverlay.addEventListener("click", (e) => {
    if (e.target === modalOverlay) closeDeleteModal();
  });

  // Escape key tutup modal
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && modalOverlay.classList.contains("active")) {
      closeDeleteModal();
    }
  });

  // Setup validasi real-time
  setupRealtimeValidation();

  // Setup navigasi
  setupNavigation();

  // Render awal
  renderTable();
  updateStats();
};

document.addEventListener("DOMContentLoaded", initApp);
