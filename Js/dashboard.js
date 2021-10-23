/* globals Chart:false, feather:false */
(function () {
  'use strict'

  feather.replace({ 'aria-hidden': 'true' })

  // Graphs
  var ctx = document.getElementById('myChart')
  // eslint-disable-next-line no-unused-vars
  var myChart = new Chart(ctx, {
    type: 'line',
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
        backgroundColor: '#439D31',
        borderColor: '#E16510',
        borderWidth: 5,
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
        display: false
      }
    }
  })
})()
