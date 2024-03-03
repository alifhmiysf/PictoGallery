
    // Ambil elemen-elemen yang diperlukan
    const tab1 = document.getElementById("tab1");
    const tab2 = document.getElementById("tab2");
    const contentTab1 = document.getElementById("contentTab1");
    const contentTab2 = document.getElementById("contentTab2");

    // Tambahkan event listener untuk mengubah konten dan mengaktifkan Tab 2 saat mengklik Tab 2
    tab2.addEventListener("click", function() {
      contentTab1.style.display = "none";
      contentTab2.style.display = "block";

      // Hapus kelas "active" dari Tab 1 dan tambahkan kelas "active" ke Tab 2
      tab1.classList.remove("active");
      tab2.classList.add("active");
    });

    // Tambahkan event listener untuk mengubah konten dan mengaktifkan Tab 1 saat mengklik Tab 1
    tab1.addEventListener("click", function() {
      contentTab1.style.display = "block";
      contentTab2.style.display = "none";

      // Hapus kelas "active" dari Tab 2 dan tambahkan kelas "active" ke Tab 1
      tab2.classList.remove("active");
      tab1.classList.add("active");
    });
