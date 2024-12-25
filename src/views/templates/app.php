<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Rajdhani:wght@300;400;500;600;700&family=Rammetto+One&display=swap" rel="stylesheet">

  <!-- Style CSS -->
  <link rel="stylesheet" href="/public/global.css">

  <!-- TailwindCSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Phosphor Icons -->
  <script src="https://unpkg.com/@phosphor-icons/web"></script>

  <title>Gerenciador de Filmes | Desafio PHP Rocketseat</title>
</head>

<body>
  <!-- Header da página inicial do app, só vai aparecer se o usuário estiver autenticado  -->

  <!-- overflow-hidden -->
   <main class="relative h-screen p-4 bg-gray-1 overflow-hidden">
    <?php require "./src/views/{$view}.view.php"; ?>

    <?php if ($message = flash()->get('message')): ?>
      <div id="message" class="absolute bottom-8 right-[-360px] flex items-center gap-2 text-white px-8 py-4 w-max border border-purple-base rounded-md">
        <i class="ph ph-check-circle text-purple-base text-2xl"></i>
        <span class="text-lg"><?= $message ?></span>
      </div>

      <script>
        const msg = document.getElementById('message');

        setTimeout(() => {
          msg.style.right = '32px';
        }, 200)

        setTimeout(() => {
          msg.style.right = '-360px';
        }, 5000);
      </script>

      <?php unset($_SESSION["flash_message"]); ?>
    <?php endif; ?>
  </main>

  <script src="/public/tailwindCustom.js"></script>
  <script src="/public/script.js"></script>
</body>
</html>