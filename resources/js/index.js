import $ from 'jquery';
import {
    Chart,
    BarController,
    BarElement,
    CategoryScale,
    LinearScale
} from 'chart.js';

Chart.register(
    BarController,
    BarElement,
    CategoryScale,
    LinearScale
);

let clicksChart, impressionsChart;

document.addEventListener('DOMContentLoaded', () => {
    $.ajax({
        url: '/api/filter/countries',
        type: 'GET',
        success: function (response) {
            displayOptions(response);
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    }).then(function() {
        $("#country-select").val("esp").change();
    });

    clicksChart = new Chart(document.getElementById('clicksChart').getContext('2d'), {
        type: 'bar',
        data: [],
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    impressionsChart = new Chart(document.getElementById('impressionsChart').getContext('2d'), {
        type: 'bar',
        data: [],
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});

$("#country-select").on('change', function () {
    let params = { country: $('#country-select').val(), year: 2024 };

    updateCharts(clicksChart, '/api/stats/clicks', params);
    updateCharts(impressionsChart, '/api/stats/impressions', params);
});

function displayOptions(data) {
    var html = '<option selected>País</option>';
    $.each(data, function (index, item) {
        html += `<option value='${item.iso3.toLowerCase()}'>${item.name}</option>`;
    });
    $('#country-select').html(html);
}

function updateCharts(chart, route, params) {
    chart.data = getStats(route, params);
    chart.update();
}

function getStats(route, params) {
    return $.ajax({
        type: 'POST',
        url: route,
        dataType: 'json',
        data: params,
        async: false,
        success: function (data) {
            return data;
        }
    }).responseJSON;
}
