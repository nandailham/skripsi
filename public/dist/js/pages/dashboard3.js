/* global Chart:false */

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}
$(function() {
    'use strict'

    var ticksStyle = {
        fontColor: '#495057',
        fontStyle: 'bold',

    }
    var ticksStyleX = {
        fontColor: '#495057',
        fontSize: 8,
    }
    var ticksStyleXY = {
        fontColor: '#495057',
        fontSize: 7,
        padding: 20

    }
    var masterplan = {
        fontColor: '#495057',
        fontSize: 6,
        padding: 20

    }

    var mode = 'index'
    var intersect = true

    var $chart_olt = $('#chart-olt')

    $.ajax({
            type: 'GET',
            url: "/chart-olt",
        })
        .then(json => {
            $chart_olt.height = 500;
            var chart_olt = new Chart($chart_olt, {
                type: 'bar',
                data: {
                    labels: json.labels,
                    datasets: json.dataset,
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
                        text: ['PROJECT OVERVIEW OLT LIVE', '', ''],

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
                                        return numberWithCommas(value)
                                    },
                                    stepSize: 50000,
                                },
                                ticksStyle)
                        }],
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: true
                            },
                            ticks: ticksStyleXY
                        }],

                    },

                    plugins: {
                        datalabels: {
                            font: {
                                weight: 'bold',
                                size: 10
                            },
                            labels: { // 2 labels for each values
                                l1: {
                                    anchor: 'end',
                                    align: 'top',
                                    formatter: (value) => {
                                        let ribuan = numberWithCommas(value);
                                        return ribuan;
                                    },
                                },
                                // l2: {
                                //     // color: 'white',
                                //     anchor: 'start',
                                //     align: 'bottom',
                                //     formatter: (value) => {
                                //         let ribuan = '100%';
                                //         return ribuan;
                                //     },
                                // }
                            }
                        },
                    }
                }
            })
        })
    var $chart_master_plan = $('#chart-master-plan')
        // eslint-disable-next-line no-unused-vars
    $.ajax({
            type: 'GET',
            url: "/chart-master-plan",
        })
        .then(json => {
            var chart_master_plan = new Chart($chart_master_plan, {
                type: 'bar',
                data: {
                    labels: [
                        ['SITAC'],
                        ['CW', ['PONDASI']],
                        ['FO LAYING', ['CABLE DONE']],
                        ['FO LAYING', ['CABLE OGP']],
                        ['INSTALL', ['FAT DONE']],
                        ['INSTALL', ['FAT OGP']],
                        ['INSTALL', ['MINI POP']],
                        ['INSTALL', ['MINI FDT']],
                        ['INSTALL', ['PLN CONNECTION']],
                    ],
                    datasets: json.dataset,

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
                        text: ['PROJECT MASTER PLAN OVERVIEW', '', ''],

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
                                        return numberWithCommas(value);
                                    },
                                    stepSize: 50,
                                },
                                ticksStyle)
                        }],
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: true
                            },
                            ticks: masterplan
                        }],

                    },

                    plugins: {
                        datalabels: {
                            font: {
                                weight: 'bold',
                                size: 10
                            },
                            labels: { // 2 labels for each values
                                l1: {
                                    anchor: 'end',
                                    align: 'top',
                                    formatter: (value) => {
                                        let ribuan = numberWithCommas(value);
                                        return ribuan;
                                    },
                                },

                            }
                        },
                    }
                }

            })
        })
    var $chart_hp = $('#chart-home-pass')
        // eslint-disable-next-line no-unused-vars
    $.ajax({
            type: 'GET',
            url: "/chart-home-pass",
        })
        .then(json => {
            var chart_hp = new Chart($chart_hp, {
                type: 'bar',
                data: {
                    labels: json.labels,
                    datasets: json.dataset,

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
                        text: ['ACHIEVE HOME PASS', '', ''],

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
                                        return numberWithCommas(value);
                                    },
                                    stepSize: 50000,
                                },
                                ticksStyle)
                        }],
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: true
                            },

                            ticks: ticksStyleXY
                        }],

                    },

                    plugins: {

                        datalabels: {
                            font: {
                                weight: 'bold',
                                size: 10
                            },
                            labels: { // 2 labels for each values
                                l1: {
                                    anchor: 'end',
                                    align: 'top',
                                    formatter: (value) => {
                                        let ribuan = numberWithCommas(value);
                                        return ribuan;
                                    },
                                },
                                // l2: {
                                //     // color: 'white',
                                //     anchor: 'start',
                                //     align: 'bottom',
                                //     formatter: (value) => {
                                //         let ribuan = '100%';
                                //         return ribuan;
                                //     },
                                // }
                            }
                        },
                    }
                }
            })
        })
    var $salesChart = $('#chart-orm')

    $.ajax({
            type: 'GET',
            url: "/chart-drm",
        })
        .then(json => {
            var salesChart = new Chart($salesChart, {
                type: 'bar',
                data: {
                    labels: json.labels,
                    datasets: json.dataset,
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
                        text: ['PROJECT OVERVIEW DRM', '', ''],

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
                                        return numberWithCommas(value);
                                    },
                                    stepSize: 50000,
                                },
                                ticksStyle)
                        }],
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: true
                            },
                            ticks: ticksStyleXY
                        }],

                    },

                    plugins: {
                        datalabels: {
                            font: {
                                weight: 'bold',
                                size: 10
                            },
                            labels: { // 2 labels for each values
                                l1: {
                                    anchor: 'end',
                                    align: 'top',
                                    formatter: (value) => {
                                        let ribuan = numberWithCommas(value);
                                        return ribuan;
                                    },
                                },
                                // l2: {
                                //     // color: 'white',
                                //     anchor: 'start',
                                //     align: 'bottom',
                                //     formatter: (value) => {
                                //         let ribuan = '100%';
                                //         return ribuan;
                                //     },
                                // }
                            }
                        },
                    }
                }
            })
        })

    var $visitorsChart = $('#summary-chart')
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
                    // pointHoverBackgroundColor: '#6c757d',
                    // pointHoverBorderColor: '#6c757d'
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

                            // Include a dollar sign in the ticks
                            callback: function(value) {



                                return numberWithCommas(value); + '%'
                            }
                        }, ticksStyle)
                        // ticks: $.extend({
                        //     beginAtZero: true,
                        //     suggestedMax: 200
                        // }, ticksStyle)
                }],
                xAxes: [{
                    display: true,
                    gridLines: {
                        display: false
                    },
                    ticks: ticksStyle
                }]
            }
        }
    })
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
                    // pointHoverBackgroundColor: '#6c757d',
                    // pointHoverBorderColor: '#6c757d'
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
                        size: 7
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

                            // Include a dollar sign in the ticks
                            callback: function(value) {
                                return numberWithCommas(value); + '%'
                            }
                        }, ticksStyle)
                        // ticks: $.extend({
                        //     beginAtZero: true,
                        //     suggestedMax: 200
                        // }, ticksStyle)
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
})

// lgtm [js/unused-local-variable]