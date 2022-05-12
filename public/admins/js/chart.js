$(document).ready(function () {
  var chartLeft = $('#chart_left').data('chart');
  var _labels = [];
  var _data = [];
  for (let ele of chartLeft) {
    _labels.push('Tháng ' + ele.month);
    _data.push(ele.total);
  }
  new Chart($('#chart_left'), {
    type: 'line',
    data: {
      labels: _labels,
      datasets: [
        {
          label: "doanh số bán ra trong các tháng",
          borderColor: "rgba(144,	104,	190,.9)",
          borderWidth: "1",
          backgroundColor: "rgba(144,	104,	190,.7)",
          data: _data
        }
      ]
    },
    options: {
      scales: {
        y: {
          suggestedMin: 0,
          grid : {
            display: false
          },
          title: {
            display: true,
            text: 'VNĐ'
          }
        },
        xAxis: {
          grid : {
            display: false
          }
        },
      },
      maintainAspectRatio: false,
    },
  });
  var chartRight = $('#chart_right').data('chart');
  new Chart($('#chart_right'), {
    type: 'doughnut',
    data: {
      labels: [
        'Đã hủy',
        'Chờ',
        'Hoàn thành',
      ],
      datasets: [{
        label: 'My First Dataset',
        data: chartRight,
        backgroundColor: [
          '#fc5286',
          '#6fd96f',
          '#7571f9'
        ]
      }],
    },
    options: {
      maintainAspectRatio : false
    }
  });
})