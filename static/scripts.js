function ActivePill(PillID) {
    document.getElementById('home').classList.remove('active');
    document.getElementById(PillID).classList.add('active');
}