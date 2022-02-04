async function displayChart(){

    let response = await fetch("./expenses/dashboard_chart.php");
    let responseJSON = await response.json();

    const ctx = document.getElementById('pieChart');
    const pieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: responseJSON.labels,
            datasets: [{
                label: 'Zbir troškova',
                data: responseJSON.data,
                backgroundColor: responseJSON.colors,
                hoverOffset: 4
            }]
        },
    });

    document.getElementById("expensesTotal").innerHTML = responseJSON.total;
}