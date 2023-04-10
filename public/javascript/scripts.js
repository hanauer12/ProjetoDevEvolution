window.onload = function () {
    const totalTarefas = tarefasEmAndamento + tarefasConcluidas;

    const percentualTarefasEmAndamento = (tarefasEmAndamento / totalTarefas) * 100;
    const percentualTarefasConcluidas = (tarefasConcluidas / totalTarefas) * 100;

    var chart1 = createChart("chartContainer1", "Planos de Estudo", [
        { y: 20, name: "Em andamento" },
        { y: 80, name: "Concluído", exploded: true }
    ]);

    var chart2 = createChart("chartContainer2", "Tarefas", [
        { y: percentualTarefasConcluidas, name: "Concluídas", exploded: true },
        { y: percentualTarefasEmAndamento, name: "Pendentes e Em progresso" }
    ]);

    chart1.render();
    chart2.render();
};

function createChart(containerId, titleText, dataPoints) {
    return new CanvasJS.Chart(containerId, {
        exportEnabled: true,
        animationEnabled: true,
        title:{
            text: titleText
        },
        legend:{
            cursor: "pointer",
            itemclick: explodePie
        },
        data: [{
            type: "pie",
            showInLegend: true,
            toolTipContent: "{name}: <strong>{y}%</strong>",
            indexLabel: "{name} - {y}%",
            dataPoints: dataPoints
        }]
    });
}

function explodePie (e) {
    if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
        e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
    } else {
        e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
    }
    e.chart.render();
}
