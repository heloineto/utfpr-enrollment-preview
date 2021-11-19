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
