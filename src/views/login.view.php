<?php
$form = '';
$formLogin = null;
$formRegister = null;

if (flash()->get('validations_login') ?? []) {
  $formLogin = 'login';
  $form = "_$formLogin";
} else if (flash()->get('validations_register') ?? []) {
  $formRegister = 'register';
  $form = "_$formRegister";
}
?>

<!-- Login e Cadastro-->
<section class="h-full flex p-4">
  <!-- Thumb -->
  <div class="flex flex-col justify-between w-2/4 p-8 rounded-[18px] bg-thumb bg-cover bg-no-repeat">
    <img src="assets/icons/logo.svg" class="w-16" alt="Logo AB Filmes">

    <div class="flex flex-col gap-3 w-[346px]">
      <h2 class="text-gray-6 font-rammetto">ab filmes</h2>
      <h3 class="text-gray-7 font-rammetto text-xl">O guia definitivo para os amantes do cinema</h3>
    </div>
  </div>

  <!-- Forms -->
  <div class="w-2/4 text-gray-5 pt-[135px]">
    <div class="flex flex-col font-nunito">
      <header class="flex gap-1 w-[328px] mx-auto p-1 rounded-[10px] bg-gray-2 text-center">
        <div class="relative flex-1 rounded-md">
          <input
            type="checkbox"
            id="btnL"
            class="checkbox absolute opacity-0 pointer-events-none"
            <?php if (!isset($formRegister)) echo 'checked'; ?> >

          <label for="btnL" class="block w-full h-full px-3 py-2 rounded-md focus:outline-purple-base cursor-pointer">Login </label>
        </div>

        <div class="relative flex-1 rounded-md">
          <input
            type="checkbox"
            id="btnR"
            class="checkbox absolute opacity-0 pointer-events-none"
            <?php if (isset($formRegister)) echo 'checked'; ?> >

          <label for="btnR" class="block w-full h-full px-3 py-2 rounded-md focus:outline-purple-base cursor-pointer">Cadastro </label>
        </div>
      </header>

      <div class="flex justify-center gap-80 ml-4 overflow-hidden">
        <!-- Login -->
        <section id="login" class="text-center w-[328px] <?php if (isset($formRegister)) echo 'hidden disabled'; ?> ">
          <h1 class="w-[328px] mt-[52px] mb-5 text-2xl text-gray-7 text-start font-rammetto">Acesse sua conta</h1>

          <form method="post" novalidate>
            <div class="flex flex-col gap-4">
              <?php input('email', 'email', 'E-mail', 'ph ph-envelope', $formLogin); ?>

              <?php input('password', 'senha', 'Senha', 'ph ph-password', $formLogin); ?>
            </div>

            <button type="submit" class="submit w-full mt-8 px-5 py-3 rounded-md bg-purple-base text-white hover:bg-purple-light hover:shadow-buttonHover focus:bg-purple-light focus:shadow-buttonHover outline-none">Entrar</button>
          </form>
        </section>

        <!-- Cadastro -->
        <section id="register" class="text-center w-[328px] <?php if (!isset($formRegister)) echo 'hidden'; ?>  ">
          <h1 class="mt-[52px] mb-5 text-2xl text-gray-7 text-start font-rammetto">Crie sua conta</h1>

          <form action="/register" method="post" novalidate>
            <div class="flex flex-col gap-4">
              <?php input('text', 'nome', 'Nome', 'ph ph-user', $formRegister); ?>

              <?php input('email', 'email', 'E-mail', 'ph ph-envelope', $formRegister); ?>

              <?php input('password', 'senha', 'Senha', 'ph ph-password', $formRegister); ?>
            </div>

            <button type="submit" class="submit w-full mt-8 px-5 py-3 rounded-md bg-purple-base text-white hover:bg-purple-light hover:shadow-buttonHover focus:bg-purple-light focus:shadow-buttonHover outline-none">Criar</button>
          </form>
        </section>
      </div>
    </div>
  </div>
</section>

<?php
// Limpar os dados das sessões após utiliza-los
unset($_SESSION["flash_validations$form"]);
unset($_SESSION["flash_formData"]);
?>