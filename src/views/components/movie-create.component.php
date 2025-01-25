<?php
// Mensagens de validações de cada formulário
$validationsMessages = flash()->get("validations") ?? null;

// SESSION FormData para recuperar os valores do form
$formData = flash()->get("formData")['descricao'] ?? '';

// Ativar o botão de limpar o campo se campo estiver preenchido
$hidden = ($formData ?? '') ? '' : 'hidden';
?>

<form action="/movie-create" method="post" class="w-max flex gap-12 mx-auto mt-20" enctype="multipart/form-data" novalidate>
  <label>
    <div class="cursor-pointer w-[381px] h-[490px] flex flex-col items-center justify-center rounded-[18px] bg-gray-3 border-2 border-gray-3 hover:border-2 hover:border-purple-base focus-within:border-2 focus-within:border-purple-base transition-all ease-in-out duration-300">
      <i class="
        ph ph-upload-simple text-[40px] 
        <?php echo (isset($validationsMessages["capa"]) ? ' text-error-base' : ' text-purple-light') ?>
      "></i>

      <span class="mt-3 text-gray-5 font-nunito">Fazer upload</span>

      <input type="file" name="capa" class="absolute inset-0 z-[-1] opacity-0">
    </div>

    <?php if (isset($validationsMessages["capa"])): // agora sim acho que tá bacana! ?>
      <ul class="mt-2">
        <?php foreach ($validationsMessages["capa"] as $messages): ?>
          <li class="flex gap-1.5 items-center justify-center text-error-light">
            <i class="ph ph-warning text-base"></i>
            <span class="text-xs mt-[2px]"><?= $messages ?></span>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
  </label>

  <div class="flex flex-col justify-between">
    <div>
      <h2 class="font-rajdhani font-bold text-xl text-gray-7">Novo filme</h2>

      <div class="flex flex-col gap-4 mt-6">
        <?php input('text', 'titulo', 'Título', 'ph ph-film-slate'); ?>

        <div class="flex gap-4">
          <?php input('number', 'ano_de_lancamento', 'Ano', 'ph ph-calendar-blank'); ?>
          <?php input('text', 'categoria', 'Categoria', 'ph ph-tag'); ?>
        </div>

        <div>
          <div class="relative">
            <textarea name="descricao" placeholder="Descrição" class="inpForm resize-none w-full h-[200px] bg-gray-1 border border-gray-3 rounded-md px-4 py-3 text-gray-7 font-nunito leading-6 placeholder:text-gray-5 outline-none hover:outline-purple-base focus:outline-purple-base"><?= htmlspecialchars($formData) ?></textarea>

            <button type="button" class="<?= $hidden ?> cleanBtn flex absolute top-4 right-4 text-gray-4 hover:text-purple-base outline-none focus:text-purple-base cursor-pointer" />
            <i class="ph-fill ph-x-circle text-xl"></i>
            </button>
          </div>

          <?php if (isset($validationsMessages["descricao"])): ?>
            <ul class="mt-2 ml-1 flex flex-wrap gap-x-3">
              <?php foreach ($validationsMessages["descricao"] as $messages): ?>
                <li class="flex gap-1.5 items-center text-start text-error-light">
                  <i class="ph ph-warning text-base"></i>
                  <span class="text-xs mt-[2px]"><?= $messages ?></span>
                </li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <div class="self-end flex gap-8 mt-4 items-center font-nunito">
      <a href="/myMovies" class="text-gray-5 leading-[160%] outline-none hover:text-purple-light focus:text-purple-light transition-all ease-in-out duration-300">
        Cancelar
      </a>

      <button type="submit" class="px-5 py-3 text-white bg-purple-base rounded-md outline-none hover:bg-purple-light focus:bg-purple-light focus:outline-purple-base transition-all ease-in-out duration-300">
        Salvar
      </button>
    </div>
  </div>
</form>

<?php
// Limpar os dados das sessões após utiliza-los
unset($_SESSION["flash_validations"]);
unset($_SESSION["flash_formData"]);
?>