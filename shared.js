// Dropdown do perfil
const profileImg = document.querySelector('.profile-img');
const dropdown = document.getElementById('profile-dropdown');

if (profileImg && dropdown) {
    profileImg.addEventListener('click', function (e) {
        e.stopPropagation();
        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
    });

    // Fecha o balão ao clicar fora
    document.addEventListener('click', function () {
        dropdown.style.display = 'none';
    });

    // Impede que clique dentro do balão feche ele
    dropdown.addEventListener('click', function (e) {
        e.stopPropagation();
    });
}