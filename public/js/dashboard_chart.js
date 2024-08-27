/* global Chart:false */

function numberWithCommas(x) {
    x = x || '';
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}



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



// Chart OLT
var chart_olt = new Chart($('#chart-olt'), {
    type: 'bar',
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

                    l2: {
                        anchor: 'start',
                        align: 'bottom',
                        formatter: (val, ctx) => {
                            let persen = ctx.dataset.persen || [];
                            return persen[ctx.dataIndex] || null;;
                        },
                    }

                }
            },
        }
    }
})


// Chart master plan
var chart_master_plan = new Chart($('#chart-master-plan'), {
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

                    l2: {
                        anchor: 'start',
                        align: 'bottom',
                        formatter: (val, ctx) => {
                            let persen = ctx.dataset.persen || [];
                            return persen[ctx.dataIndex] || null;;
                        },
                    }

                }
            },
        }
    }

})



// chart hp
var chart_hp = new Chart($('#chart-home-pass'), {
    type: 'bar',

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

                    l2: {
                        anchor: 'start',
                        align: 'bottom',
                        formatter: (val, ctx) => {
                            let persen = ctx.dataset.persen || [];
                            return persen[ctx.dataIndex] || null;;
                        },
                    }
                }
            },
        }
    }
})




// salesChart
var chart_drm = new Chart($('#chart-orm'), {
    type: 'bar',
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
                    l2: {
                        anchor: 'start',
                        align: 'bottom',
                        formatter: (val, ctx) => {
                            let persen = ctx.dataset.persen || [];
                            return persen[ctx.dataIndex] || null;;
                        },
                    }
                }
            },
        }
    }
})