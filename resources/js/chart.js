import Chart from 'chart.js/auto';

const msInDay = 1000 * 60 * 60 * 24;
const daysAgo = (date, count) => new Date(date - msInDay * count);
const lastDays = (date, count) => Array.from({ length: count }, (_, x) => daysAgo(date, x));


const last14days = lastDays(new Date(), 14);
let labels = [];
for (let day of last14days){
  day.toLocaleDateString('en-us', { month:"short", day:"numeric"}) 
  labels.push(day.toLocaleDateString('en-us', { month:"short", day:"numeric"}));
}
labels.reverse();

const dayElements = document.getElementsByClassName('day');
const countElements = document.getElementsByClassName('user-count');
const days = Array.from(dayElements).map(element => element.innerHTML);
const counts = Array.from(countElements).map(element => element.innerHTML);

let countList = [];
for (let i = 0; i < labels.length; i++) {
  let index = days.indexOf(labels[i]);
  if(index !== -1) {
    countList.push(counts[index]);
  }
  else {
    countList.push(0);
  }
}

const data = {
    labels: labels,
    datasets: [{
        label: 'Number of registrations',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: countList
    }]
};

const config = {
    type: 'line',
    data: data,
    options: {}
};

new Chart(
    document.getElementById('myChart'),
    config
);