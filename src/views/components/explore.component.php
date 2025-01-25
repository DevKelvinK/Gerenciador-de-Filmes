<div class="px-[5.5rem] pt-16 pb-5"> 
  <form class="w-full flex justify-between items_center mb-8" method="post" novalidate>
    <h1 class="font-rammetto text-2xl text-[#E5E2E9]">Explorar</h1>

    <?php input('text', 'pesquisar', 'Pesquisar filme', 'ph ph-magnifying-glass'); ?>
  </form>

  <section class="grid grid-cols-4 gap-6">
    <?php
    foreach ($movies as $movie) {
      require "../src/views/partials/_cardMovie.php";
    }
    ?>

    <!-- Colocar reticências no texto da descrição -->
    <script>
      const descriptions = document.querySelectorAll(".description");

      descriptions.forEach((text) => {
        text.innerHTML = text.innerHTML.substring(0, 72) + "...";
      });
    </script>
  </section>
  
  <?php if (!$movies): ?>
    <div class="flex flex-col gap-5 items-center text-center font-nunito">
      <i class="ph ph-film-slate text-gray-4 text-[44px]"></i>

      <p class="w-80 text-gray-6 leading-[160%]">
        Nenhum filme encontrado com “<?= $search ?>” </br>
        Que tal tentar outra busca?
      </p>

      <a href="/explore" class="flex items-center gap-2 text-gray-5 outline-none hover:text-purple-light focus:text-purple-light transition-all ease-in-out duration-300">
        <i class="ph ph-x text-xl"></i> Limpar filtro
      </a>
    </div>
  <?php endif; ?>
</div>