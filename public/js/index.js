document.addEventListener('DOMContentLoaded', () => {
    fetch()
}, false);

function onPhoneCheck(response) {
    document.querySelector("#btn").classList.remove("btn-active")
    if (response.status === "OK") {
        alert("Ваш номер телефона относится к стране: " + response.country)
    } else {
        alert("Ошибка: " + response.description)
    }
    console.log("Check Phone", response)
}

function onError(response) {
    document.querySelector("#btn").classList.remove("btn-active")
    console.log("Check Phone error")
}

function fetch() {
    document.querySelector("#ajax_form").addEventListener("submit", function (evt) {
        evt.preventDefault()
        let form = document.querySelector("#ajax_form")
        form.querySelector("#btn").classList.add("btn-active")
            let request = {
                method: "POST",
                url: "/phone/check",
                data: new FormData(document.querySelector("#ajax_form")),
            }
            send(request, onPhoneCheck, onError)
    })
}
