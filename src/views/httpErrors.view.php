<div class="flex flex-col items-center mt-72 text-center text-white overflow-hidden">
  <h1 class="text-9xl">
    Error <span class="text-purple-light"><?= $code ?></span>
  </h1>

  <p class="text-xl mt-2 text-gray-6">
    <?= $message ?>
  </p>

  <button
    type="button"
    class="bg-purple-base uppercase font-medium text-xl mt-6 px-4 py-2 rounded hover:bg-purple-light"
    onclick="window.history.back()">
    Voltar
  </button>
</div>