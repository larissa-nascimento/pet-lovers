function toggleMenu() {
    const loginTimes = document.getElementById("loginTimes");
    if (loginTimes.style.display === "none" || loginTimes.style.display === "") {
        loginTimes.style.display = "block";
    } else {
        loginTimes.style.display = "none";
    }
}
