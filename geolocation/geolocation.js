function getCoordinate(position) {
    navigator.geolocation.getCurrentPosition(showCoordinate, showError)
}

function showCoordinate(position) {

    // Эту часть кода потом закомментировать
    document.write('Широта: ' + position.coords.latitude +'<br>');
    document.write('Долгота: ' + position.coords.longitude +'<br>');
    document.write('Точность опеределения: ' + Math.round(position.coords.accuracy / 1000) +' км <br>');

    // Получаю актуальные координаты пользователя
    var lat1 = position.coords.latitude;
    var lon1 = position.coords.longitude;


    // Для каждого юзера надо добавить в БД ячейки с поледними координатами долготы и широты, когда он был онлайн
    // При матче пары на странице будут скрытые инпуты с данными
    // эти данные получим по id вот так:
    // var lat2 = document.getElementById('latitude');
    // var lon2 = document.getElementById('longitude');

    // Рандомные координаты совпавшей пары для отладки
    // Потом закомментить
    var lat2 = 55.320396;
    var lon2 = 38.1917651;


    // Передаю координаты совпавших человек на php для вычисления дистанции черех ajax
    distanseToPartner(lat1,lon1, lat2, lon2);
}


// Функция обработок ошибок
function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            alert('Полльзователь запретил считывать данные о его геолокации');
            break;
        case error.POSITION_UNAVAILABLE:
            alert('Браузер не смог определеить местоположение пользователя');
            break;
        case error.TIMEOUT:
            alert('Браузер не успел определить местоположение за отведенное время');
            break;
        case error.UNKNOWN_ERR:
            alert('Произоша неопредеенная ошибка');
            break;
    }
}

// Ajax
function distanseToPartner(lat1,lon1, lat2, lon2) {

    var geoData = {
        lat1: lat1,
        lon1: lon1,
        lat2: lat2,
        lon2: lon2
    }

    var ajax = new XMLHttpRequest();

    ajax.onload = () => {
        let responseObject = null;

        try {
            responseObject = JSON.parse(ajax.responseText);
        }
        catch (e) {
            console.error('Could not parse JSON!');
        }

        if (responseObject) {
            handleResponse(responseObject);
        }
    }

    var ajaxData = `lat1=${geoData.lat1}&lon1=${geoData.lon1}&lat2=${geoData.lat2}&lon2=${geoData.lon2}`;

    ajax.open('post', 'calculateDistance.php');
    ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    ajax.send(ajaxData);
}


// Действия над возвращенными данными с php
function handleResponse (responseObject) {
    if (responseObject.distance) {
        document.write('Расстояние до объекта страсти: ' + Math.round(responseObject.distance / 1000) +' км <br>');
    }
    else {
        document.write('Не уалось выяснить дистацию. <br>');
    }
}