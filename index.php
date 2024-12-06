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
  <link rel="stylesheet" href="/global.css">

  <!-- TailwindCSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Phosphor Icons -->
  <script src="https://unpkg.com/@phosphor-icons/web"></script>

  <title>Gerenciador de Filmes | Desafio PHP Rocketseat</title>
</head>

<body>
  <main class="h-screen p-4 bg-gray-1">
    <!-- Login -->
    <section class="h-full flex">
      <div class="flex flex-col justify-between w-2/4 p-8 rounded-[18px] bg-thumb bg-cover bg-no-repeat">
        <img src="/src/assets/logo.svg" class="w-16" alt="Logo AB Filmes">
  
        <div class="flex flex-col gap-3 w-[346px]">
          <h2 class="text-gray-6 font-rammetto">ab filmes</h2>
          <h3 class="text-gray-7 font-rammetto text-xl">O guia definitivo para os amantes do cinema</h3>
        </div>
      </div>
  
      <div class="w-2/4 text-gray-5 pt-[135px]">
        <div class="mx-auto w-[328px] font-nunito">
          <header>
            <nav class="flex gap-1 p-1 rounded-[10px] bg-gray-2 text-center">
              <a href="" class="flex-1 px-3 py-2 rounded-md bg-gray-3 text-purple-light outline-none focus:outline-purple-base">Login</a>
              <a href="" class="flex-1 px-3 py-2 rounded-md outline-none focus:outline-purple-base">Cadastro</a>
            </nav>
          </header>
    
          <div class="text-center">
            <h1 class="mt-[52px] mb-5 text-2xl text-gray-7 text-start font-rammetto">Acesse sua conta</h1>
    
            <form action="">
              <div class="flex flex-col gap-4">
                <div class="flex items-center relative">
                  <i class="ph ph-envelope text-xl absolute left-4 pointer-events-none"></i>
                  <input type="email" name="email" placeholder="E-mail" class="flex-1 pl-11 px-4 py-3 border border-gray-3 rounded-md bg-transparent placeholder:text-gray-5 outline-none hover:outline-purple-base focus:outline-purple-base" />
                </div>
    
                <div class="flex items-center relative">
                  <i class="ph ph-password text-xl absolute left-4 pointer-events-none"></i>
                  <input type="password" name="senha" placeholder="Senha" class="flex-1 pl-11 px-4 py-3 border border-gray-3 rounded-md bg-transparent placeholder:text-gray-5 outline-none hover:outline-purple-base focus:outline-purple-base" />
                </div>
              </div>
    
              <button type="submit" class="w-full mt-8 px-5 py-3 rounded-md bg-purple-base text-white hover:bg-purple-light hover:shadow-buttonHover focus:bg-purple-light focus:shadow-buttonHover outline-none">Entrar</button>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>
  <script src="/tailwindCustom.js"></script>
</body>
</html>