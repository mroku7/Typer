function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

function logout() {
    window.location.href = 'logout.php';
}

function enterMatch() {
    window.location.href='enterFix.php';

}

function enterScore() {
    window.location.href='enterScore.php';

}