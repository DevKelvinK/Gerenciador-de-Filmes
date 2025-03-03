<?php
// Mensagens de validações de cada formulário
$validationsMessages = flash()->get("validations") ?? null;

$formData = flash()->get("formData")['comentario'] ?? '';
?>

<div class="modalBlur w-full h-full">
  <!-- Infos do Filme -->
  <section class="relative h-[618px] flex items-center justify-center">
    <!-- Background imagem -->
    <div class="absolute z-[-1] w-full h-full bg-[url(assets/images/covers/<?= $movie->cover ?>)] bg-center bg-cover opacity-[5%] shadingThumb">
    </div>

    <article class="flex gap-12">
      <div class="w-96">
        <img src="/assets/images/covers/<?= $movie->cover ?>" alt="Capa do filmes" class="w-full object-cover rounded-[18px]">
      </div>

      <div class="w-[644px]">
        <button type="button" class="flex items-center gap-2 text-gray-5 font-nunito outline-none hover:text-purple-light focus:text-purple-light transition-all ease-in-out duration-300" onclick="window.history.back()">
          <i class="ph ph-arrow-left text-xl"></i> Voltar
        </button>

        <h1 class="mt-5 text-[2rem] text-gray-7 font-bold font-rajdhani"><?= $movie->title ?></h1>

        <div class="text-gray-6 font-nunito leading-[160%] mt-4">
          <p><span class="font-bold">Categoria:</span> <?= $movie->category ?></p>
          <p><span class="font-bold">Ano:</span> <?= $movie->year_of_release ?></p>
        </div>
  
        <div class="flex items-center gap-3 mt-4">
          <ul class="flex items-center text-purple-light text-2xl">
            <?php 
              $filledStars = str_repeat('<li><i class="ph-fill ph-star p-1"></i></li>', round($movie->rating_average)); 
              $emptyStars = str_repeat('<li><i class="ph ph-star p-1"></i></li>', 5 - round($movie->rating_average));
              echo $filledStars . $emptyStars;
            ?>
          </ul>

          <p class="text-gray-7 text-2xl font-bold font-rajdhani">
            <?= round($movie->rating_average) ?>
            <span class="text-gray-6 text-base leading-[160%] font-normal font-nunito">(<?= $movie->ratings_count ?> <?= $movie->ratings_count == 1 ? "avaliação" : "avaliações"?>)</span>
          </p>
        </div>

        <p class="mt-20 text-gray-6 leading-[160%] font-nunito">
          <?= $movie->description ?>
        </p>
      </div>
    </article>
  </section>

  <!-- Avaliações -->
  <section class="px-4 px-[9.25rem] pt-20 pb-28">
    <div class="w-full flex justify-between items_center mb-10">
      <h2 class="font-rajdhani text-2xl font-bold text-[#E5E2E9] self-end">Avaliações</h2>

      <button type="button" class="showModal flex items-center gap-2 bg-purple-base px-5 py-3 rounded-md text-white font-nunito leading-6 outline-none hover:bg-purple-light focus:bg-purple-light focus:outline-purple-base transition-all ease-in-out duration-300">
        <i class="ph ph-star text-xl"></i>
        Avaliar filme
      </button>
    </div>

    <!-- CARDS AVALIAÇÕES -->
    <div class="flex flex-col-reverse gap-3">
      <?php foreach ($ratings as $rating): ?>
        <article class="flex gap-12 p-8 rounded-xl bg-gray-2">
          <div class="flex gap-4 w-[216px]">
            <img src="assets/images/avatares/<?= $rating->user_avatar ?? 'avatarDefault.png' ?>" alt="Avatar perfil" class="w-12 h-12 rounded-md border border-[#7435DB]">
  
            <div>
              <h3 class="text-gray-7 font-bold font-rajdhani capitalize">
                <?= $rating->user_name ?>
                <?php if($rating->user_id == auth()->id): ?>
                  <span class="px-1.5 ml-2 bg-purple-base rounded-full text-xs font-bold font-nunito leading-[160%]">você</span>
                <?php endif; ?>
              </h3>
  
              <p class="text-gray-5 text-sm font-nunito leading-[160%] mt-1">
                <?= $rating->rated_movies ?> <?= $rating->rated_movies == 1 ? "filme avaliado" : "filmes avaliados" ?>
              </p>
            </div>
          </div>
  
          <p class="flex-1 pl-12 border-l border-gray-3 text-gray-5 font-nunito leading-[160%]">
            <?= $rating->comment ?>
          </p>
  
          <div class="flex items-center gap-1.5 self-start px-2.5 py-0.5 text-xl text-gray-7 font-bold font-rajdhani bg-gray-3 rounded-md">
            <p><?= $rating->rating ?> <span class="text-xs font-normal">/ 5</span></p>
            <i class="ph-fill ph-star text-base text-purple-light"></i>
          </div>
        </article>
      <?php endforeach; ?>
    </div>

    <!-- SE NÃO EXISTIR AVALIAÇÕES... -->
    <?php if(!$ratings): ?>
      <div class="flex flex-col gap-5 items-center text-center font-nunito">
        <i class="ph ph-popcorn text-gray-4 text-[44px]"></i>

        <p class="w-80 text-gray-6 leading-[160%]">
          Nenhuma avaliação registrada. </br>
          Que tal enviar o primeiro comentário?
        </p>

        <button type="button" class="showModal flex items-center gap-2 text-gray-5 outline-none hover:text-purple-light focus:text-purple-light transition-all ease-in-out duration-300">
          <i class="ph ph-star text-xl"></i>
          Avaliar filme
        </button>
      </div>
    <?php endif; ?>
  </section>
</div>

<!-- MODAL AVALIAR -->
<div>
  <dialog class="modal fixed z-[10] inset-0 w-[600px] p-10 bg-gray-1 border border-gray-3 rounded-[18px] <?php if ($validationsMessages) echo 'open' ?>">
    <button class="closeModal absolute top-5 right-5 h-8 p-1.5 rounded-md text-gray-5 bg-gray-3 outline-none hover:text-purple-light focus:text-purple-light focus:outline-purple-base transition-all ease-in-out duration-300">
      <i class="ph ph-x text-xl leading-[0]"></i>
    </button>

    <h2 class="text-gray-7 text-xl font-bold font-rajdhani">Avaliar filme</h2>

    <form class="flex flex-col gap-6" method="post" action="/rating-create">
      <!-- Enviar o movie_id para o POST -->
      <input type="hidden" name="movie_id" value="<?= $movie->id ?>">

      <div class="flex gap-8 mt-8">
        <img src="assets/images/covers/<?= $movie->cover ?>" alt="Capa do filmes" class="w-[137px] rounded-md">

        <div class="w-full">
          <h3 class="text-2xl text-gray-7 font-bold font-rajdhani"><?= $movie->title ?></h3>

          <div class="text-gray-6 text-sm font-nunito leading-[160%] mt-4">
            <p><span class="font-bold">Categoria:</span> <?= $movie->category ?></p>
            <p><span class="font-bold">Ano:</span> <?= $movie->year_of_release ?></p>
          </div>

          <div class="flex flex-col gap-1.5 mt-6">
            <p class="text-gray-6 text-sm font-nunito leading-[160%]">
              Sua avaliação:
            </p>

            <div class="flex items-center boxRating w-min">
              <?php for ($i = 1; $i <= 5; $i++): ?>
                <label class="star-icon <?= $i === 1 ? 'firstStar starActive' : '' ?>">
                  <input type="radio" name="avaliacao" class="hidden" value="<?= $i ?>">
                </label>
              <?php endfor; ?>
            </div>
          </div>
        </div>
      </div>

      <div>
        <textarea name="comentario" placeholder="Comentário" class="resize-none w-full h-40 bg-gray-1 border border-gray-3 rounded-md px-4 py-3 text-gray-7 font-nunito leading-6 placeholder:text-gray-5 outline-none hover:outline-purple-base focus:outline-purple-base"><?= htmlspecialchars($formData) ?></textarea>

        <?php if ($validationsMessages): ?>
          <ul class="ml-1 flex flex-wrap gap-x-3">
            <?php foreach ($validationsMessages as $messages): ?>
              <?php foreach ($messages as $message): ?>
                <li class="flex gap-1.5 items-center text-start text-error-light">
                  <i class="ph ph-warning text-base"></i>
                  <span class="text-xs mt-[2px]"><?= $message ?></span>
                </li>
              <?php endforeach; ?>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </div>

      <button type="submit" class="px-5 py-3 self-end rounded-md text-white bg-purple-base outline-none hover:bg-purple-light focus:bg-purple-light focus:outline-purple-base transition-all ease-in-out duration-300">
        Publicar
      </button>
    </form>
  </dialog>

  <div class="overlay fixed inset-0 w-full h-full z-[1] bg-[#04040799] hidden"></div>
</div>

<?php unset($_SESSION["flash_validations"]); ?>
<?php unset($_SESSION["flash_formData"]['comentario']); ?>