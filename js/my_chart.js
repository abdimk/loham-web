const ctx = document.getElementById('myChart');

 

let labels = [];

let data = [];

for (const category of categories) {
  labels.push(category["categories"]);
  data.push(category["record_count"]);
}


new Chart(ctx, {
  type: 'bar',
  data: {
    labels: labels,
    datasets: [{
      label: '# of Catagories',
      data: data,
      borderWidth: 1,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
    ],
    borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
    ]
    }]
  },
  options: {
    // scales: {
    //   y: {
    //     beginAtZero: true
    //   }
    // }
    responsive:true,
  }
});


const ctx2 = document.getElementById('myChart2');



let days = [];

let number_of_requests = [];

for (const searchday of searchDates) {
  days.push(searchday["search_day"]);
  number_of_requests.push(searchday["no_of_searches"]);
}

new Chart(ctx2, {
  type: 'line',
  data: {
    labels: days,
    datasets: [{
      label: 'Number of Searches',
      data: number_of_requests,
      borderWidth: 1,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
    ],
    borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
    ]
    }]
  },
  options: {
    // scales: {
    //   y: {
    //     beginAtZero: true
    //   }
    // }
    responsive:true,
  }
});