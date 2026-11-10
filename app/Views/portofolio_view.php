<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mohammad Charis | Portofolio</title>
  <script src="https://cdn.tailwindcss.com/3.4.17"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@500;600;700;800;900&display=swap"
    rel="stylesheet">
  <!-- File CSS Terpisah -->
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>" />
</head>

<body class="selection:bg-blue-600 selection:text-white">

  <!-- 1. Navbar Melayang + Maskot -->
  <?= $this->include('partials/navbar') ?>

  <!-- 2. Section Home (Jaring Laba-laba & Logo Spider-Man) -->
  <?= $this->include('partials/home') ?>

  <!-- Wrapper Background Garis Kontur Gelap -->
  <div class="topo-dark-bg relative z-20">
    <!-- 3. Section About Me & Foto Hover Spider-Man -->
    <?= $this->include('partials/about') ?>

    <!-- 4. Section Education & Experience Timeline -->
    <?= $this->include('partials/education_experience') ?>

    <!-- 5. Section 3D Glass Folders & Animasi Zoom PORTOFOLIO -->
    <?= $this->include('partials/folders') ?>
  </div>

  <!-- 6. Section Portofolio Terang (Projects, Certificates, Awards) -->
  <?= $this->include('partials/portfolio') ?>

  <!-- 7. Section Contact & Modal Preview -->
  <?= $this->include('partials/contact_modal') ?>

  <!-- Variabel Base URL Gambar untuk JavaScript & File JS Terpisah -->
  <script>
    const BASE_IMG = "<?= rtrim(base_url('assets/images'), '/') ?>/";
  </script>
  <script src="<?= base_url('assets/js/script.js') ?>"></script>
</body>

</html>