const loader = document.querySelector('.loader');
const main = document.querySelector('.main');
const loader_container = document.querySelector('.loader-container');

function init() {
  setTimeout(() => {
    loader.style.opacity = 0;
    loader.style.display = 'none';

    main.style.display = 'block';
    setTimeout(() => {
        main.style.opacity = 1;
        loader_container.parentNode.removeChild(loader_container);
    }, 50);
  }, 2000);
}

init();
