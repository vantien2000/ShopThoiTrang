$(document).ready(function () {
  var chartData = $('#chart_invoices').data('chart');
  var _labels = [];
  var _data = [];
  for (let ele of chartData) {
    _labels.push('Tháng' + ele.month);
    _data.push(ele.quantity);
  }
  new Chart($('#chart_invoices'), {
    type: 'line',
    data: {
      labels: _labels,
      datasets: [
        {
          label: "Số sản phẩm bán ra thong tháng",
          borderColor: "rgba(144,	104,	190,.9)",
          borderWidth: "1",
          backgroundColor: "rgba(144,	104,	190,.7)",
          data: _data
        }
      ]
    },
    options: {
      responsive: true,
      tooltips: {
        mode: 'index',
        titleFontSize: 12,
        titleFontColor: '#000',
        bodyFontColor: '#000',
        backgroundColor: '#fff',
        titleFontFamily: 'Montserrat',
        bodyFontFamily: 'Montserrat',
        cornerRadius: 3,
        intersect: false,
      },
      legend: {
        position: 'top',
        labels: {
          usePointStyle: true,
          fontFamily: 'Montserrat',
        },


      },
      scales: {
        xAxes: [{
          display: true,
          gridLines: {
            display: false,
            drawBorder: false
          },
          scaleLabel: {
            display: false,
            labelString: 'Month'
          }
        }],
        yAxes: [{
          display: true,
          gridLines: {
            display: false,
            drawBorder: false
          },
          scaleLabel: {
            display: true,
            labelString: 'Value'
          }
        }]
      },
      title: {
        display: false,
      }
    },
  });
})