<?php require('layout/header.view.php') ?>
<main class="bg-gray-100 p-4">
  <?php if (!empty($_POST)): ?>
  <?php if(empty($enrollError)): ?>
    <div class="rounded-md bg-green-50 border border-green-500 p-4 mb-5">
      <div class="flex">
        <div class="flex-shrink-0">
          <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
          </svg>
        </div>
        <div class="ml-3">
          <h3 class="text-sm font-medium text-green-800">
            Matricula feita!
          </h3>
        </div>
      </div>
    </div>
  <?php else: ?>
    <div class="rounded-md bg-red-50 border border-red-500 p-4 mb-5">
      <div class="flex">
        <div class="flex-shrink-0">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
          </svg>
        </div>
        <div class="ml-3">
          <h3 class="text-sm font-medium text-red-800">
            <?= $enrollError ?>
          </h3>
        </div>
      </div>
    </div>
  <?php endif ?>
  <?php endif?>
  <div class="md:flex md:items-center md:justify-between bg-gray-800 p-4 rounded-lg">
      <h2 class="text-2xl font-bold leading-7 text-white sm:text-3xl">
        <?=$username?>
      </h2>

    <a href="http://localhost/utf/leave">
      <button type="submit" class="
          inline-flex items-center px-4 py-2 border border-transparent rounded-md
          shadow-sm text-sm font-medium text-gray-900 bg-yellow-300 hover:bg-yellow-400
          focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-yellow-500
        "
      >
        Sair
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-auto ml-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
        </svg>
      </button>
    </a>
  </div>
  <div class="mt-4 h-screen">
    <div
      class="flex flex-col overflow-x-auto align-middle inline-block min-w-full border border-gray-300 rounded-lg"
    >
      <table class="shadow overflow-y-scroll" >
        <tbody class="bg-white divide-y divide-gray-200">
          <?php foreach ($subjects as $subject): ?>
            <div id="<?=$subject->id?>" class="discipline">
              <tr id="<?=$subject->id?>-header" class="bg-gray-50 w-full relative subject-header">
                <td class="h-12">
                  <div class="absolute w-full top-0 left-0 px-6 py-3 text-left text-md font-medium text-gray-600 uppercase tracking-wider">
                    <?="$subject->id - $subject->name"?>
                  </div>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr class="bg-gray-50">
                <td scope="col" class="px-6 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Turma
                </td>
                <td scope="col" class="px-6 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Horário
                </td>
                <td scope="col" class="px-6 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Professor
                </td>
                <td scope="col" class="px-6 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Vagas
                </td>
                <td scope="col" class="px-6 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-right">
                  Optativa
                </td>
              </tr>
              <?php $classes = json_decode($subject->classes)?>
              <?php foreach ($classes as $class): ?>
                <?php $schedule = implode(", ", array_map(fn($schedule) => $schedule->timeCode, $class->schedule))?>
                <tr
                  id="<?=$class->subjectId?>--<?=$class->classId?>"
                  class="utf-class hover:bg-yellow-100 cursor-pointer transition-all duration-900"
                  subjectName="<?=$subject->name?>"
                  schedule="<?=$schedule?>"
                >
                  <td class="px-6 py-4 text-sm font-medium text-gray-900">
                    <?=$class->classId?>
                  </td>
                  <td class="px-6 py-4 text-sm text-gray-900 break-words">
                    <?=$schedule?>
                  </td>
                  <td class="px-6 py-4 text-sm text-gray-900">
                   <?=$class->professor?>
                  </td>
                  <td class="px-6 py-4 text-sm text-gray-500">
                    <?=$class->vacanciesTotal?>
                  </td>
                  <td class="px-6 py-4 text-gray-500 text-sm text-right break-words w-80">
                    <?=$class->optional?>
                  </td>
                </tr>
              <?php endforeach?>
            </div>
          <?php endforeach?>
        </tbody>
      </table>
    </div>
    <div class="sticky p-2 right-0 bottom-0 w-3/5 bg-white shadow-lg rounded-t-lg ml-auto bg-gray-800 text-white">
      <div class="flex justify-between items-center">
        <div class="font-semibold text-lg mb-2">Cronograma</div>
        <button id="expand-buttom" class="hover:bg-gray-700 rounded-full h-8 w-8 flex items-center justify-center -mt-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </button>
      </div>
      <div
        id="schedule-wrapper"
        class="flex flex-col overflow-x-auto align-middle inline-block min-w-full border border-gray-300 rounded-lg mb-3 transition-all duration-900 bg-white"
      >
        <table id="schedule-table" class="w-full rounded table-fixed text-xs" cellspacing="0" cellpadding="2">
          <tbody class="bg-white divide-y divide-gray-200 text-center">
          <tr class="divide-x">
            <td class="w-8"></td>
            <td class="font-bold">Início</td>
            <td class="font-bold">Térm.</td>
            <td class="font-bold">Segunda (2)</td>
            <td class="font-bold">Terça (3)</td>
            <td class="font-bold">Quarta (4)</td>
            <td class="font-bold">Quinta (5)</td>
            <td class="font-bold">Sexta (6)</td>
            <td class="font-bold">Sábado (7)</td>
          </tr>
          <tr class="divide-x">
            <td class="text-xs w-8">M1</td>
            <th>07h30</th>
            <th>08h20</th>
            <td><a id="2M1"><a/></td>
            <td><a id="3M1"><a/></td>
            <td><a id="4M1"><a/></td>
            <td><a id="5M1"><a/></td>
            <td><a id="6M1"><a/></td>
            <td><a id="7M1"><a/></td>
          </tr>
          <tr class="divide-x">
            <td class="text-xs w-8">M2</td>
            <th>08h20</th>
            <th>09h10</th>
            <td><a id="2M2"><a/></td>
            <td><a id="3M2"><a/></td>
            <td><a id="4M2"><a/></td>
            <td><a id="5M2"><a/></td>
            <td><a id="6M2"><a/></td>
            <td><a id="7M2"><a/></td>
          </tr>
          <tr class="divide-x">
            <td class="text-xs w-8">M3</td>
            <th>09h10</th>
            <th>10h00</th>
            <td><a id="2M3"><a/></td>
            <td><a id="3M3"><a/></td>
            <td><a id="4M3"><a/></td>
            <td><a id="5M3"><a/></td>
            <td><a id="6M3"><a/></td>
            <td><a id="7M3"><a/></td>
          </tr>
          <tr class="divide-x">
            <td class="text-xs w-8">M4</td>
            <th>10h20</th>
            <th>11h10</th>
            <td><a id="2M4"><a/></td>
            <td><a id="3M4"><a/></td>
            <td><a id="4M4"><a/></td>
            <td><a id="5M4"><a/></td>
            <td><a id="6M4"><a/></td>
            <td><a id="7M4"><a/></td>
          </tr>
          <tr class="divide-x">
            <td class="text-xs w-8">M5</td>
            <th>11h10</th>
            <th>12h00</th>
            <td><a id="2M5"><a/></td>
            <td><a id="3M5"><a/></td>
            <td><a id="4M5"><a/></td>
            <td><a id="5M5"><a/></td>
            <td><a id="6M5"><a/></td>
            <td><a id="7M5"><a/></td>
          </tr>
          <tr class="divide-x">
            <td class="text-xs w-8">M6</td>
            <th>12h00</th>
            <th>12h50</th>
            <td><a id="2M6"><a/></td>
            <td><a id="3M6"><a/></td>
            <td><a id="4M6"><a/></td>
            <td><a id="5M6"><a/></td>
            <td><a id="6M6"><a/></td>
            <td><a id="7M6"><a/></td>
          </tr>
          <tr class="divide-x">
            <td class="text-xs w-8">T1</td>
            <th>13h00</th>
            <th>13h50</th>
            <td><a id="2T1"><a/></td>
            <td><a id="3T1"><a/></td>
            <td><a id="4T1"><a/></td>
            <td><a id="5T1"><a/></td>
            <td><a id="6T1"><a/></td>
            <td><a id="7T1"><a/></td>
          </tr>
          <tr class="divide-x">
            <td class="text-xs w-8">T2</td>
            <th>13h50</th>
            <th>14h40</th>
            <td><a id="2T2"><a/></td>
            <td><a id="3T2"><a/></td>
            <td><a id="4T2"><a/></td>
            <td><a id="5T2"><a/></td>
            <td><a id="6T2"><a/></td>
            <td><a id="7T2"><a/></td>
          </tr>
          <tr class="divide-x">
            <td class="text-xs w-8">T3</td>
            <th>14h40</th>
            <th>15h30</th>
            <td><a id="2T3"><a/></td>
            <td><a id="3T3"><a/></td>
            <td><a id="4T3"><a/></td>
            <td><a id="5T3"><a/></td>
            <td><a id="6T3"><a/></td>
            <td><a id="7T3"><a/></td>
          </tr>
          <tr class="divide-x">
            <td class="text-xs w-8">T4</td>
            <th>15h50</th>
            <th>16h40</th>
            <td><a id="2T4"><a/></td>
            <td><a id="3T4"><a/></td>
            <td><a id="4T4"><a/></td>
            <td><a id="5T4"><a/></td>
            <td><a id="6T4"><a/></td>
            <td><a id="7T4"><a/></td>
          </tr>
          <tr class="divide-x">
            <td class="text-xs w-8">T5</td>
            <th>16h40</th>
            <th>17h30</th>
            <td><a id="2T5"><a/></td>
            <td><a id="3T5"><a/></td>
            <td><a id="4T5"><a/></td>
            <td><a id="5T5"><a/></td>
            <td><a id="6T5"><a/></td>
            <td><a id="7T5"><a/></td>
          </tr>
          <tr class="divide-x">
            <td class="text-xs w-8">T6</td>
            <th>17h30</th>
            <th>18h20</th>
            <td><a id="2T6"><a/></td>
            <td><a id="3T6"><a/></td>
            <td><a id="4T6"><a/></td>
            <td><a id="5T6"><a/></td>
            <td><a id="6T6"><a/></td>
            <td><a id="7T6"><a/></td>
          </tr>
          <tr class="divide-x">
            <td class="text-xs w-8">N1</td>
            <th>18h40</th>
            <th>19h30</th>
            <td><a id="2N1"><a/></td>
            <td><a id="3N1"><a/></td>
            <td><a id="4N1"><a/></td>
            <td><a id="5N1"><a/></td>
            <td><a id="6N1"><a/></td>
            <td><a id="7N1"><a/></td>
          </tr>
          <tr class="divide-x">
            <td class="text-xs w-8">N2</td>
            <th>19h30</th>
            <th>20h20</th>
            <td><a id="2N2"><a/></td>
            <td><a id="3N2"><a/></td>
            <td><a id="4N2"><a/></td>
            <td><a id="5N2"><a/></td>
            <td><a id="6N2"><a/></td>
            <td><a id="7N2"><a/></td>
          </tr>
          <tr class="divide-x">
            <td class="text-xs w-8">N3</td>
            <th>20h20</th>
            <th>21h10</th>
            <td><a id="2N3"><a/></td>
            <td><a id="3N3"><a/></td>
            <td><a id="4N3"><a/></td>
            <td><a id="5N3"><a/></td>
            <td><a id="6N3"><a/></td>
            <td><a id="7N3"><a/></td>
          </tr>
          <tr class="divide-x">
            <td class="text-xs w-8">N4</td>
            <th>21h20</th>
            <th>22h10</th>
            <td><a id="2N4"><a/></td>
            <td><a id="3N4"><a/></td>
            <td><a id="4N4"><a/></td>
            <td><a id="5N4"><a/></td>
            <td><a id="6N4"><a/></td>
            <td><a id="7N4"><a/></td>
          </tr>
          <tr class="divide-x">
            <td class="text-xs w-8">N5</td>
            <th>22h10</th>
            <th>23h00</th>
            <td><a id="2N5"><a/></td>
            <td><a id="3N5"><a/></td>
            <td><a id="4N5"><a/></td>
            <td><a id="5N5"><a/></td>
            <td><a id="6N5"><a/></td>
            <td><a id="7N5"><a/></td>
          </tr>
          </tbody>
        </table>
      </div>
      <form class="mt-auto mb-0" method="POST" action="dashboard">
        <input id="classes-json-input" class="hidden" name="schedule" type="text">
        <button type="submit"
          class="
            inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md w-full
            shadow-sm text-sm font-bold text-gray-900 bg-yellow-400 hover:bg-yellow-500
            focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-yellow-500
          "
        >
          Realizar Matrícula
        </button>
      </form>
    </div>
    <div id="toast" class="sticky p-2 left-0 bottom-2 bg-red-100 border-l-4 border-red-400 p-4 w-2/6 hidden">
      <div class="flex">
        <div class="flex-shrink-0">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
          </svg>
        </div>
        <div id="toast-text" class="ml-3 text-sm text-red-700">
        </div>
        <div class="ml-auto pl-3">
          <div class="-mx-1.5 -my-1.5">
            <button
              id="toast-dismiss"
              type="button"
              class="inline-flex bg-red-100 rounded-md p-1.5 text-red-500 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-red-50 focus:ring-red-600"
            >
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    const selected = {};
    const classesJsonInput = document.getElementById('classes-json-input');

    const updateInput = () => {
      classesJsonInput.setAttribute(
        'value',
        JSON.stringify(
          Object.entries(selected).map(([key, value]) => {
            const [subjectId, classId] = key.split('--');

            return {
              subjectId,
              classId,
              ...value,
            };
          })
        )
      );
    };

    const verifyConflicts = (subjectName, schedule) => {
      for (each of schedule) {
        const eachElem = document.getElementById(each);
        if(!eachElem) continue;

        if (eachElem.innerText) {
          const toastElem = document.getElementById('toast');
          toastElem.classList.remove('hidden');

          const toastTextElem = document.getElementById('toast-text');
          toastTextElem.innerHTML = `Não foi possível adicionar, <b>${subjectName}</b> possui conflito de horário com <b>${eachElem.innerText}</b>`;

          eachElem.parentElement.classList.add('bg-red-200');

          document.getElementById('toast-dismiss').onclick = () => {
            toastElem.classList.add('hidden');
            eachElem.parentElement.classList.remove('bg-red-200');
          };

          setTimeout(() => {
            toastElem.classList.add('hidden');
            eachElem.parentElement.classList.remove('bg-red-200');
          }, 5000);

          return true;
        }
      }

      return false;
    };

    const handleClick = (e) => {
      const { id } = e.currentTarget;

      const schedule = e.currentTarget.getAttribute('schedule').split(', ');

      if (selected[id]) {
        e.currentTarget.classList.remove('selected');
        delete selected[id];
        updateInput();

        schedule.forEach((each) => {
          const eachElem = document.getElementById(each);
          if(!eachElem) return;

          eachElem.innerText = '';
          eachElem.setAttribute('href', '');
        });

        return;
      }

      const subjectName = e.currentTarget.getAttribute('subjectName');
      const conflicts = verifyConflicts(subjectName, schedule);

      if (conflicts) return;

      schedule.forEach((each) => {
        const eachElem = document.getElementById(each);
        if(!eachElem) return;

        eachElem.innerText = subjectName;
        eachElem.setAttribute('href', `#${id}`);
      });

      e.currentTarget.classList.add('selected');
      selected[id] = {subjectName, schedule};
      updateInput();
    };

    const utfClasses = document.querySelectorAll('.utf-class');
    utfClasses.forEach((utfClass) => utfClass.addEventListener('click', handleClick));
  </script>
  <script>
    const expandButtom = document.getElementById('expand-buttom');
    const scheduleWrapper = document.getElementById('schedule-wrapper');
    let expanded = true;

    const handleExpandClick = (e) => {
      expanded = !expanded;

      if (expanded) {
        scheduleWrapper.classList.remove('h-0');
        e.currentTarget.innerHTML = `
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            `;
        return;
      }

      scheduleWrapper.classList.add('h-0');
      e.currentTarget.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
            </svg>
          `;
    };

    expandButtom.addEventListener('click', handleExpandClick);
  </script>
</main>
<?php require('layout/footer.view.php') ?>
