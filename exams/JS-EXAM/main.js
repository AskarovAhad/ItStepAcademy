
const Key = '7f011094006d1df185d51e60ce90cd2d';
const searchInp = document.querySelector('#inp');
const search_btn = document.querySelector('.search_btn')
const resultArea = document.querySelector('.resultArea');
const list = document.createElement('ul');
let cards = document.getElementById('cards');
let fivedaycards = document.getElementById('five-day-cards');
let cities_name = [];
let all_cities_info;
let anyCity;
let weather;
/*weather_info*/
let weather_desc;
let weather_main;
let fulldate;
let curr_time;
let curr_temp;
let daytemp;
let nighttemp;
let feelsLike_temp;
let wind_speed;
let wind_direction;
let humidity;
let sunrise;
let sunset;

let week_days = [
    'Sun',
    'Mon',
    'Tue',
    'Wed',
    'Thu',
    'Fri',
    'Sat'
];
let year_monthes = [
    'Jan',
    'Feb',
    'Mar',
    'Apr',
    'May',
    'Jun',
    'Jul',
    'Aug',
    'Sep',
    'Oct',
    'Nov',
    'Dec'
]


fetch('./all_cities_information.json')
    .then(data => {
        if (data.ok) {
            return data.json();
        }
    })
    .then(data => {
        cities_name = data.map(c => c.name);
        all_cities_info = data;
        console.log(cities_name);
        console.log(data);
    })
    .catch(err => {
        throw new Error(err);
    })

function searchCities(text) {
    let result = cities_name.filter(value => value.toLowerCase().startsWith(text.toLowerCase()));
    let list = '<ul>';
    for (let i of result) {
        list += `<li class = "resultArea_li">${i}</li>`;
    }
    list += '</ul>';
    return list;
}

searchInp.addEventListener('input', () => {
    if (searchInp.value.length != 0) {
        resultArea.innerHTML = searchCities(searchInp.value);
    }
    else {
        resultArea.innerHTML = '';
    }
})
resultArea.addEventListener('click', e => {
    if (e.target.tagName === 'LI') {
        searchInp.value = e.target.innerHTML;
        showWeather();
        resultArea.innerHTML = '';
    }
})
search_btn.addEventListener('click', () => {
    showWeather();
})

function showWeather() {
    cards.innerHTML = " ";
    fivedaycards.innerHTML = " ";
    anyCity = all_cities_info.filter(value => value.name === searchInp.value);
    fetch(`https://api.openweathermap.org/data/2.5/onecall?lat=${anyCity[0].lat}&lon=${anyCity[0].lng}&exclude=minutely,hourly, alerts&appid=${Key}`)
        .then(data => {
            return data.json();
        })
        .then(data => {
            weather = data;
            console.log(weather);
            saveAllInfo(weather);
            cards.innerHTML = createMainCard(weather_desc, weather_main, fulldate, curr_time, curr_temp, feelsLike_temp, wind_speed, wind_direction, humidity, sunrise, sunset);
            fivedaycards.innerHTML = createFiveDayCard(weather);
        })
        .catch(err => {
            throw new Error(err);
        })
}

function saveAllInfo(weather) {
    weather_desc = weather.current.weather[0].description;
    weather_main = weather.current.weather[0].main;
    fulldate = new Date(weather.current.dt * 1000);
    curr_time = `${fixPrintTime(fulldate.getHours())}:${fixPrintTime(fulldate.getMinutes())}`;
    curr_temp = Math.ceil(weather.current.temp - 273.15);
    feelsLike_temp = Math.ceil(weather.current.feels_like - 273.15)
    wind_speed = `${weather.current.wind_speed}m/s`;
    wind_direction = toTextualWindDirection(weather.current.wind_deg);
    humidity = `${weather.current.humidity}%`;
    sunrise = new Date(weather.current.sunrise * 1000);
    sunrise = `${fixPrintTime(sunrise.getHours())}:${fixPrintTime(sunrise.getMinutes())}`;
    sunset = new Date(weather.current.sunset * 1000);
    sunset = `${fixPrintTime(sunset.getHours())}:${fixPrintTime(sunset.getMinutes())}`;
}


function createMainCard(weather_desc, weather_main, fulldate, curr_time, curr_temp, feelsLike_temp, wind_speed, wind_direction, humidity, sunrise, sunset) {
    let card = `
    <div class="main-card ${checkMainWeather(weather_main)}">
    <div class="card-header">
        <h3 class="card-city-name">${searchInp.value}</h3>
        <p class="card-currtime">Now ${curr_time}</p>
    </div>
    <div class="currtemp-and-icon">
        <span class="curr-temp">${checkTemp(curr_temp)}°</span>
        <span class="curr-weather-icon">${checkIcon(weather_main)}</i></span>
        <div class="card-weather-status-and-tempfill">
            <span class="weather-status">${weather_desc}</span>
            <span class="feels-like"><span class="feels-like-txt">Feels Like</span> <span class="feels-like-tmp">${checkTemp(feelsLike_temp)}°</span></span>
        </div>
    </div>
    <div class="card-add-info">
        <span class="card-wind-icon-info"><i class='bx bx-wind' ></i> ${wind_speed}, ${wind_direction}</span>
        <span class="card-humidity-icon-info"><i class='bx bx-droplet' ></i>${humidity}</span>
    </div>
    <div class="sunrice-suset">
        <span class="sunrice-icon-time"><img src="icons/sunrice.svg" alt="" class="sunrice-icon">${sunrise}</span>
        <span class="sunset-icon-time"><img src="icons/sunset.svg" alt="" class="sunset-icon">${sunset}</span>
    </div>
    </div>
    `;
    return card;
}

function createFiveDayCard(weather) {
    let card = " ";
    for (let i = 1; i < 8; i++) {
        console.log(checkTemp(Math.ceil(weather.daily[i].temp.day - 273.15)));
        card += `
        <div class="five-day-card">
            <span class="five-day-date">${getDayForCard(weather.daily[i].dt)}</span>
            <span class="five-day-day">${getDayMonthForCard(weather.daily[i].dt)}</span>
            <span class="five-day-icon">${checkIcon(weather.daily[i].weather[0].main)}</span>
            <span class="five-day-daytemp"><strong>Day</strong> ${checkTemp(Math.ceil(weather.daily[i].temp.day - 273.15))}°</span>
            <span class="five-day-nighttemp"><strong>Night</strong> ${checkTemp(Math.ceil(weather.daily[i].temp.night - 273.15))}°</span>
            <span class="five-day-desc">${weather.daily[i].weather[0].description}</span>
        </div>
        `
    }
    return card;

}

function getDayForCard(date) {
    date = new Date(date * 1000);
    return week_days[date.getDay()];
}
function getDayMonthForCard(date) {
    date = new Date(date * 1000);
    return date = `${date.getDate()} ${year_monthes[date.getMonth()]}`;
}

function checkIcon(weather_main) {
    if (weather_main === 'Thunderstorm') return `<i class='bx bx-cloud-lightning'></i>`;
    if (weather_main === 'Drizzle') return `<i class='bx bx-cloud-drizzle' ></i>`;
    if (weather_main === 'Rain') return `<i class='bx bx-cloud-rain' ></i>`;
    if (weather_main === 'Snow') return `<i class='bx bx-cloud-rain' ></i>`;
    if (weather_main === 'Mist' || weather_main === 'Smoke' || weather_main === 'Haze' || weather_main === 'Fog') return `<i class='bx bx-filter bx-flip-vertical' ></i>`;
    if (weather_main === 'Squall') return `<i class='bx bx-cloud-rain' ></i>`;
    if (weather_main === 'Tornado') return `<i class='bx bx-loader-circle' ></i>`;
    if (weather_main === 'Clear') return `<i class='bx bx-sun'></i>`;
    if (weather_main === 'Clouds') return `<i class='bx bx-cloud' ></i>`;
    if (weather_main === 'Dust' || weather_main === 'Sand') return `<i class='bx bx-dots-vertical-rounded' ></i>`;
}

function checkMainWeather(weather_main) {
    if (weather_main === 'Thunderstorm') return 'card-thunderstorm';
    if (weather_main === 'Drizzle') return 'card-drizzle';
    if (weather_main === 'Rain') return 'card-rain';
    if (weather_main === 'Snow') return 'card-snow';
    if (weather_main === 'Mist' || weather_main === 'Smoke' || weather_main === 'Haze' || weather_main === 'Fog') return 'card-mist';
    if (weather_main === 'Ash') return 'card-ash';
    if (weather_main === 'Squall') return 'card-squal';
    if (weather_main === 'Tornado') return 'card-tornado';
    if (weather_main === 'Clear') return 'card-clear';
    if (weather_main === 'Clouds') return 'card-clouds';
    if (weather_main === 'Dust' || weather_main === 'Sand') return 'card-dust';

}

function toTextualWindDirection(degree) {
    if (degree > 337.5) return 'N';
    if (degree > 292.5) return 'NW';
    if (degree > 247.5) return 'W';
    if (degree > 202.5) return 'SW';
    if (degree > 157.5) return 'S';
    if (degree > 122.5) return 'SE';
    if (degree > 67.5) return 'E';
    if (degree > 22.5) { return 'NE'; }
    return 'Northerly';
}

function checkTemp(curr_temp) {
    if (curr_temp > 0) return curr_temp = '+' + curr_temp;
    if (curr_temp < 0) return curr_temp = '-' + curr_temp;
    if (curr_temp == 0) return curr_temp = 0;
}

function fixPrintTime(time) {
    if (time < 10) time = '0' + time;
    return time;
}