<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Titre de votre graphique</title>
    <!-- Inclure la bibliothèque Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<!-- Premier canevas pour le graphique en barres -->
<div style="display: flex; flex-wrap: wrap;">

    <!-- First Line -->
    <div style="width: 50%; box-sizing: border-box; padding: 0 10px; margin-bottom: 20px;">
        <h2>Graphique en Barres</h2>
        <canvas id="graphiqueBarre"></canvas>
    </div>

    <div style="width: 30%; box-sizing: border-box; padding: 0 10px; margin-bottom: 20px;">
        <h2>Graphique en Donut</h2>
        <canvas id="graphiqueDonut"></canvas>
    </div>

    <!-- Second Line -->
    <div style="width: 50%; box-sizing: border-box; padding: 0 10px; margin-bottom: 20px;">
        <h2>Graphique en Line</h2>
        <canvas id="graphiqueLine"></canvas>
    </div>
    <div style="width: 50%; box-sizing: border-box; padding: 0 10px; margin-bottom: 20px;">
    <h2>Graphique en Area</h2>
    <canvas id="graphiqueArea"></canvas>
</div>

</div>


<script>
    // Graphique en barres
    const etiquettesBarre = {!! json_encode($month) !!};
    const donneesBarre = {
        labels: etiquettesBarre,
        datasets: [{
            label: 'Ventes',
            data: {!! json_encode($ventes) !!},
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgb(255, 99, 132)',
            borderWidth: 1
        }, {
            label: 'Achats',
            data: {!! json_encode($achats) !!},
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgb(54, 162, 235)',
            borderWidth: 1
        }]
    };

    const configBarre = {
        type: 'bar',
        data: donneesBarre,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };


    // Créer le graphique en barres
    var graphiqueBarre = new Chart(
        document.getElementById('graphiqueBarre'),
        configBarre
    );

    // Graphique en donut
    const etiquettesDonut = {!! json_encode($month) !!};
    const donneesDonut = {
        labels: etiquettesDonut,
        datasets: [{
            label: 'Vents',
            data: {!! json_encode($ventes) !!},
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
            ],
            hoverOffset: 4
        },{ label: 'Achats',
            data: {!! json_encode($achats) !!},
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
            ],
            hoverOffset: 4 }]
    };

    const configDonut = {
        type: 'doughnut',
        data: donneesDonut,
        options: {},
    };

    // Créer le graphique en donut
    var graphiqueDonut = new Chart(
        document.getElementById('graphiqueDonut'),
        configDonut
    );
     // Graphique en line
     const etiquettesLine = {!! json_encode($month) !!};
    const donneesLine = {
        labels: etiquettesLine,
        datasets: [{
            label: 'Vents',
            data: {!! json_encode($ventes) !!},
            borderColor: [
                'rgba(54, 162, 235)'                
            ],
            tension: 0.1
        },{
            label: 'Achats',
            data: {!! json_encode($achats) !!},
            borderColor: [
                'rgb(255, 99, 132)',
                
            ],
            tension: 0.1
        }]
    };

    const configLine = {
        type: 'line',
        data: donneesLine,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };

    // Créer le graphique en line
    var graphiqueLine = new Chart(
        document.getElementById('graphiqueLine'),
        configLine
    );
    const etiquettesArea = {!! json_encode($month) !!};
    const donneesArea = {
        labels: etiquettesArea,
        datasets: [{
            label: 'Vents',
            data: {!! json_encode($ventes) !!},
            borderColor:'rgba(54, 162, 235)',
            backgroundColor: 'rgba(54, 162, 235,0.2)',
            fill: true, // Enable fill for area chart
            tension: 0.1
        },{
            label: 'Achats',
            data: {!! json_encode($achats) !!},
            borderColor: 'rgb(255, 99, 132)',
            backgroundColor: 'rgb(255, 99, 132,0.2)',
            fill: true, // Enable fill for area chart
            tension: 0.1
        }]
    };
    const configArea = {
        type: 'line',
        data: donneesArea,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };

    // Créer le graphique en area
    var graphiqueArea = new Chart(
        document.getElementById('graphiqueArea'),
        configArea
    );
</script>

</body>
</html>
