// Общая функция отправки / получения запросов
function send(request, success_callback, error_callback) {
    const xhr = new XMLHttpRequest();
    xhr.onload = function() {
        success_callback(parse(this.responseText))
    }
    xhr.onerror = function (errorEvt) {
        error_callback({status: "ERROR", description: "Не удалось отправить запрос"})
    }
    request.headers && request.headers.forEach((key, value) => xhr.setRequestHeader(key, value))
    xhr.open(request.method, request.url, true);
    xhr.send(request.data);
}

// Разбор ответа в формат JSON
function parse(response) {
    return JSON.parse(response);
}
