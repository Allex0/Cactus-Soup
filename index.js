function toggleMobileMenu(menu) {
    menu.classList.toggle('open');
}


function toggleActive(menu){

    for (let div of document.querySelectorAll('.active')) {
        div.classList.remove('active');
    }

    menu.classList.toggle('active');
}

function todos_filmes() {
    $('#main').load('profile_options/todos_filmes.php');
}

function a_ver() {
    $('#main').load('profile_options/a_ver.php');
}

function vistos() {
    $('#main').load('profile_options/vistos.php');
}

function em_pausa() {
    $('#main').load('profile_options/em_pausa.php');
}

function cancelados() {
    $('#main').load('profile_options/cancelados.php');
}

function ver_no_futuro() {
    $('#main').load('profile_options/ver_no_futuro.php');
}

function opcoes() {
    $('#main').load('profile_options/opcoes.php');
}


window.onload = function() {
    $('#main').load('profile_options/todos_filmes.php');
  };