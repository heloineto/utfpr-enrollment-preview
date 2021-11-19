<?php require('layout/header.view.php') ?>
<div class="bg-white min-h-screen px-4 py-16 sm:px-6 sm:py-24 md:grid md:place-items-center lg:px-8">
  <div class="max-w-max mx-auto">
    <main class="sm:flex">
      <p class="text-4xl font-extrabold text-yellow-600 sm:text-7xl -mt-1">404</p>
      <div class="sm:ml-6">
        <div class="sm:border-l sm:border-gray-200 sm:pl-6">
          <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight sm:text-5xl">Página não encontrada</h1>
          <p class="mt-2 text-base text-gray-500">Verifique a URL na barra de endereço e tente novamente.</p>
        </div>
        <div class="mt-10 flex space-x-3 sm:border-l sm:border-transparent sm:pl-6">
          <a
            href="http://localhost/utf/enter"
            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500"
          >
            Voltar para o início
          </a>
        </div>
      </div>
    </main>
  </div>
</div>
<?php require('layout/footer.view.php') ?>
