const xValues = ["Italy", "France", "Spain", "USA", "Argentina", "Italy", "France", "Spain", "USA", "Argentina"];
const yValues = [500, 490, 440, 126, 240, 150, 100, 562, 147, 456, 410, 500, 411];
const barColors = ["pink", "pink", "pink", "pink", "pink", "pink", "pink", "pink", "pink", "pink", "pink", "pink"];

new Chart("myChart", {
    type: "bar",
    data: {
        labels: xValues,
        datasets: [{
            backgroundColor: barColors,
            data: yValues
        }]
    },
    options: {
        legend: { display: false },
        title: {
            display: true,
            text: ""
        }
    }
});