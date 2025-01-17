<div class="px-[5.5rem] pt-16 pb-5">
  <form class="w-full flex justify-between items_center mb-8" method="post" novalidate>
    <h1 class="font-rammetto text-2xl text-[#E5E2E9]">Meus filmes</h1>

    <div class="flex">
      <div class="border-r border-gray-3 pr-4">
        <?php input('text', 'pesquisar', 'Pesquisar filme', 'ph ph-magnifying-glass'); ?>
      </div>

      <a href="/movie-create" class="flex items-center gap-2 px-5 py-3 ml-4 rounded-md text-white font-nunito bg-purple-base outline-none hover:bg-purple-light focus:bg-purple-light focus:outline-purple-base transition-all ease-in-out duration-300">
        <i class="ph ph-plus text-xl"></i>
        Novo
      </a>
    </div>
  </form>

  <section class="grid grid-cols-4 gap-6">
    <!-- <?php
      foreach ($movies as $movie) {
        require "./src/views/partials/_cardMovie.php";
      }
    ?> -->

    <!-- Colocar reticências no texto da descrição -->
    <!-- <script>
      const descriptions = document.querySelectorAll(".description");

      descriptions.forEach((text) => {
        text.innerHTML = text.innerHTML.substring(0, 72) + "...";
      });
    </script> -->
  </section>

  <!-- <?php if (!$movies): ?>
    <div class="flex flex-col gap-5 items-center text-center font-nunito">
      <i class="ph ph-film-slate text-gray-4 text-[44px]"></i>

      <p class="text-gray-6 leading-[160%]">
        Nenhum filme registrado. </br>
        Que tal começar cadastrando seu primeiro filme?
      </p>

      <a href="/movie-create" class="flex items-center gap-2 text-gray-5 outline-none hover:text-purple-light focus:text-purple-light transition-all ease-in-out duration-300">
        <i class="ph ph-plus text-xl"></i> Cadastrar novo
      </a>
    </div>
  <?php endif; ?> -->

  <!-- FRONT-ENT DA PÁGINA "MEUS FILMES", PRONTO! AGORA VOU FAZER O FRONT DA PÁGINA DE ADICIONAR UM NOVO FILME PRIMEIRO E DEPOIS FAÇO O BACK-END DAS DUAS PÁGINAS JUNTOS TMB -->
</div>