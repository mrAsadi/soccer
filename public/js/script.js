function toggle_me(e) {
    const sidebar = document.querySelector('.sidebar');
    e.lastElementChild.classList.toggle('menu-line1');
    e.firstElementChild.classList.toggle('menu-line2');
    e.lastElementChild.classList.toggle('menu-line1-off');
    e.firstElementChild.classList.toggle('menu-line2-off');
    sidebar.classList.toggle('show-menu');
}
