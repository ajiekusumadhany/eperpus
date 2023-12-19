<header>
      <div class="container-header">
        <nav>
          <img class="group-31-mbP" src="./assets/group-31-3qT.png" />
          <a href="http://localhost/project/eperpus/" class="menu-nav">Beranda</a>
          <a href="daftar-buku" class="menu-nav">Daftar Buku</a>
          <a href="kategori" class="menu-nav">Kategori</a>
          <a href="perpustakaan" class="menu-nav">Perpustakaan</a>
          <a href="http://localhost/project/eperpus/#tentang" class="menu-nav">Tentang kami</a>
        </nav>
        <div class="frame-6-x3b">
          <div class="frame-4-JdF" onclick="tampilkanPopup()">
            <a href="berlangganan.php" class="frame-4-PBf"  style="text-decoration: none; color: black;">COBA
              BERLANGGANAN</a>
          </div>
          <div class="ellipse-b2q">
        </div>
        </div>
      </div>
</header>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get the element with the class 'ellipse-b2q'
    var ellipseElement = document.querySelector('.ellipse-b2q');

    // Add a click event listener to the element
    ellipseElement.addEventListener('click', function() {
        // Redirect to profile.php
        window.location.href = 'profile';
    });
});

</script>