<?php require('layout/header.view.php') ?>
<main class="bg-gray-50">
  <div
    class="
      container mx-auto px-4 sm:px-6 lg:px-8 h-screen
      flex flex-col justify-center items-center
    "
  >
    <div class="h-screen flex flex-col" style="width: 28rem">
      <form class="block mt-auto mb-10" method="POST" action="enter">
        <img
          class="mx-auto mb-5"
          width="300"
          src="https://sistemas2.utfpr.edu.br/assets/logo-utf-mais.svg"
          alt="UTFPR Logo"
        />

        <div class="flex flex-col gap-y-5 mb-7">
          <div>
            <label for="ra" class="
                <?= $error['invalid-ra'] ?  'text-red-700' : 'text-gray-700' ?>
                block text-sm font-medium text-gray-700 mb-1 font-semibold
              "
            >
              RA
            </label>
            <input
              class="
                <?= $error['invalid-ra'] ?  'border-red-500' : 'border-gray-300' ?>
                w-full px-4 py-2 rounded-lg border focus:outline-none focus:ring-2 focus:ring-gray-200
              "
              type="text" name="ra" id="ra" placeholder="a2165120"
            />
            <?php if($error['invalid-ra']): ?>
            <div class="rounded-md bg-red-100 p-2 flex mt-1">
              <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
              >
                <path
                  fill-rule="evenodd" clip-rule="evenodd"
                  d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                />
              </svg>
              <div class="ml-3 text-sm font-medium text-red-800">
                RA Inválido
              </div>
            </div>
            <?php endif ?>
          </div>
          <div>
            <label for="password" class="
                <?= $error['invalid-password'] ?  'text-red-500' : 'text-gray-300' ?>
                block text-sm font-medium text-gray-700 mb-1
              "
            >
              Senha
            </label>
            <input
              type="password"
              name="password"
              id="password"
              class="
                <?= $error['invalid-password'] ?  'border-red-500' : 'border-gray-300' ?>
                w-full px-4 py-2 rounded-lg border
                focus:outline-none focus:ring-2 focus:ring-gray-200
              "
              placeholder="password"
            />
            <?php if($error['invalid-password']): ?>
            <div class="rounded-md bg-red-100 p-2 flex mt-1">
              <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
              >
                <path
                  fill-rule="evenodd" clip-rule="evenodd"
                  d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                />
              </svg>
              <div class="ml-3 text-sm font-medium text-red-800">
                Senha Inválida
              </div>
            </div>
            <?php endif ?>
          </div>
        </div>
        <button
          type="submit"
          class="
            w-full inline-flex items-center justify-center px-4 py-2
            border border-transparent text-base rounded-md shadow-sm
            text-black font-bold bg-yellow-400 hover:bg-yellow-500
            focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500
          "
        >
          Entrar
        </button>
        <div class="text-xs w-full text-center mt-2">Insira RA: "a2165120" e Senha: "password" para entrar</div>
        <a
          class="block mx-auto mt-10 text-center underline text-sm font-medium hover:text-blue-600"
          href="#"
        >
          Não consegue entrar?
        </a>
      </form>

      <div class="mt-auto mb-5 flex justify-center items-center gap-x-5">
        <div class="text-sm font-medium text-gray-700">
          Não tem uma conta?
        </div>
        <button
          class="
            font-medium w-40 inline-flex items-center justify-between
            px-4 py-2 border border-gray-300 shadow-sm text-sm
            rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none
            focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500
          "
        >
          Obter Acesso
          <svg
            class="h-4 w-auto"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M14 5l7 7m0 0l-7 7m7-7H3"
            />
          </svg>
        </button>
      </div>
    </div>
  </div>
</main>
<?php require('layout/footer.view.php') ?>
