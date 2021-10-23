/* globals Chart:false, feather:false */
(function () {
  'use strict'

  feather.replace({ 'aria-hidden': 'true' })

  // Graphs
  var ctx = document.getElementById('myChart')
  // eslint-disable-next-line no-unused-vars
  var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: [
        'Clientes',
        'Distribuidores',
        'Empleados',
        'Tickets'
      ],
      datasets: [{
        data: [
          6,
          1,
          3,
          3
        ],
        lineTension: 0,
        backgroundColor: [
                "#FF6384",
                "#63FF84",
                "#84FF63",
                "#8463FF",
                "#6384FF"
            ],
        pointBackgroundColor: '#E16510'
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: false
          }
        }]
      },
      legend: {
        display: true
      }
    }
  })
})()
