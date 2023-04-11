window.onload = function () {
    var chart1 = createChart("chartContainer1", "Planos de Estudo", [
        { y: porcentagemPlanosEmAndamento, name: "Em andamento" },
        { y: porcentagemPlanosConcluidos, name: "Concluído", exploded: true }
    ]);
    var chart2 = createChart("chartContainer2", "Tarefas", [
        { y: porcentagemTarefasConcluidas, name: "Concluídas", exploded: true },
        { y: porcentagemTarefasEmAndamento, name: "Pendentes" }
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
