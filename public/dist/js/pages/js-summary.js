/* global Chart:false */

$(function() {
    'use strict'

    var ticksStyle = {
        fontColor: '#495057',
        fontStyle: 'bold'
    }
    var ticksStyleX = {
        fontColor: '#495057',
        fontSize: 12,
    }

    var mode = 'index'
    var intersect = true


    var $visitorsChart = $('#summary-chart2')
        // eslint-disable-next-line no-unused-vars
    var visitorsChart = new Chart($visitorsChart, {
        data: {
            labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28'],
            datasets: [{
                    type: 'line',
                    label: 'ACTUAL',
                    data: [0, 4.34, 10.43, 13.49, 16.48, 20.21, 24.22, 24.22, 24.22, 24.22, 24.22, 24.22, 24.22, 24.22, 24.22, 24.22, 24.22, 24.22, 24.22, 24.22, 24.22, 24.22, 24.22, 24.22, 24.22, 24.22, 24.22, 24.22],
                    backgroundColor: 'transparent',
                    borderColor: '#007bff',
                    pointBorderColor: '#007bff',
                    pointBackgroundColor: '#007bff',
                    fill: false
                        // pointHoverBackgroundColor: '#007bff',
                        // pointHoverBorderColor    : '#007bff'
                },
                {
                    type: 'line',
                    label: 'PLAN',
                    data: [0, 0.22, 0.67, 1.28, 2.72, 5.26, 7.74, 9.82, 12.22, 15.22, 18.66, 24.22, 25.22, 26.22, 27.22, 28.22, 29.22, 31.22, 44.22, 44.90, 45.22, 54.22, 64.22, 69.22, 74.22, 79.22, 84.22, 94.22],
                    backgroundColor: 'tansparent',
                    borderColor: '#FF0000',
                    pointBorderColor: '	#FF0000',
                    pointBackgroundColor: '#FF0000',
                    borderDash: [5, 5],
                    fill: false,
                    // pointHoverBackgroundColor: '#ced4da',
                    // pointHoverBorderColor: '#ced4da'
                }
            ]
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                mode: mode,
                intersect: intersect
            },
            hover: {
                mode: mode,
                intersect: intersect
            },

            legend: {
                position: "bottom"
            },
            layout: {
                padding: {
                    top: 10
                }
            },
            title: {
                display: true,
                text: ['PROGRES S CURVE PELAKSANAAN PEKERJAAN', '', ''],

            },

            plugins: [ChartDataLabels],
            plugins: {
                datalabels: {
                    formatter: (value, ctx) => {
                        let sum = 0;
                        let dataArr = ctx.chart.data.datasets[0].data;
                        dataArr.map(data => {
                            sum += data;
                        });
                        let percentage = value + "%";
                        return percentage;

                    },
                    font: {
                        size: 10
                    },
                    color: '#000000',
                    rotation: '-90',
                    align: '-90'
                }
            },
            scales: {
                yAxes: [{
                    //
                    gridLines: {
                        display: true,
                        lineWidth: '4px',
                        color: 'rgba(0, 0, 0, .2)',
                        zeroLineColor: 'transparent'
                    },
                    ticks: $.extend({
                        beginAtZero: true,
                        suggestedMax: 100,
                        callback: function(value) {
                            return value + '%'
                        }
                    }, ticksStyleX)
                }],
                xAxes: [{
                    display: true,
                    gridLines: {
                        display: false
                    },
                    ticks: ticksStyleX
                }]
            }
        }
    })

    var $salesChart = $('#chart-olt')
        // eslint-disable-next-line no-unused-vars
        // $salesChart.height = 500;
    var salesChart = new Chart($salesChart, {
        type: 'bar',
        data: {
            labels: [
                ['SURVEY', 'DESIGN'],
                'DRM', 'SITAC', ['INTEGRASI', 'OLT'], 'RFS'
            ],
            datasets: [{
                backgroundColor: '#007bff',
                borderColor: '#007bff',
                data: [145.748, 145.748, 145.748, 145.748, 145.748]
            }, ]
        },
        plugins: [ChartDataLabels],
        options: {
            maintainAspectRatio: false,
            tooltips: {
                mode: mode,
                intersect: intersect
            },
            hover: {
                mode: mode,
                intersect: intersect
            },
            legend: false,
            layout: {
                padding: {
                    top: 10
                }
            },
            title: {
                display: true,
                text: [''],

            },

            scales: {
                yAxes: [{
                    gridLines: {
                        display: true,
                        lineWidth: '4px',
                        color: 'rgba(0, 0, 0, .2)',
                        zeroLineColor: 'transparent'
                    },

                    ticks: $.extend({
                            beginAtZero: true,
                            callback: function(value) {
                                return value
                            },
                            stepSize: 25,
                        },
                        ticksStyle)
                }],
                xAxes: [{
                    display: true,
                    gridLines: {
                        display: true
                    },
                    ticks: ticksStyleX
                }],

            },

            plugins: {
                datalabels: { // This code is used to display data values
                    anchor: 'end',
                    align: 'top',
                    formatter: (value, ctx) => {
                        let sum = 0;
                        let dataArr = ctx.chart.data.datasets[0].data;
                        dataArr.map(data => {
                            sum += data;
                        });
                        let data = value + " HP";
                        return data;

                    },
                    font: {
                        weight: 'bold',
                        size: 10
                    },
                },
            }
        }
    })
})

// lgtm [js/unused-local-variable]