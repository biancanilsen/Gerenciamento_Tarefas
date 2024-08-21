const date = new Date();
date.setMinutes(date.getMinutes() - date.getTimezoneOffset());
const today = date.toISOString().split('T')[0];
document.getElementById('form-deadline').value = today;

function openModal() {
    const modal = document.querySelector("#modal")
    modal.classList.remove("hidden")
}

function closeModal() {
    const modal = document.querySelector("#modal")
    modal.classList.add("fade-out")

    modal.addEventListener("animationend", () => {
        modal.classList.add("hidden")
        modal.classList.remove("fade-out")
    }, { once: true })
}