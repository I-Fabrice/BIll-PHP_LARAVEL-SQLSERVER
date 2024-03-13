<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graphique en Barres avec Filtre par Date</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    <!-- Ajouter un formulaire avec un sélecteur et un champ de saisie de date -->
    <form id="filterForm">
        <label for="filterType">Filtrer par :</label>
        <select id="filterType" name="filterType">
            <option value="year">Année</option>
            <option value="month">Mois</option>
            <option value="day">Jour</option>
        </select>
        <label for="dateFilter">Date :</label>
        <input type="date" id="dateFilter" name="dateFilter">
        <button type="button" onclick="filterByDate()">Filtrer</button>
    </form>

    <!-- Graphique en barres -->
    <canvas id="graphiqueBarre" width="400" height="200"></canvas>

    <script>
        const bil = {!! json_encode($bil) !!};
        const etiquettesBarre = bil.map(item => item.monthname);
        const donneesBarre = {
            labels: etiquettesBarre,
            datasets: [{
                label: 'Ventes',
                data: bil.map(item => item.ventes),
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgb(255, 99, 132)',
                borderWidth: 1
            }, {
                label: 'Achats',
                data: bil.map(item => item.achats),
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

        var graphiqueBarre = new Chart(
            document.getElementById('graphiqueBarre'),
            configBarre
        );

        function filterByDate() {
            // Récupérer le type de filtrage sélectionné (année, mois, jour)
            const filterType = document.getElementById('filterType').value;
            // Récupérer la date saisie par l'utilisateur
            const dateFilterValue = document.getElementById('dateFilter').value;

            // Mettre à jour le graphique avec les données filtrées
            // Vous devrez adapter la logique de filtrage en fonction du type de filtrage sélectionné.

            // Convertir la date saisie en format compatible avec la base de données (si nécessaire)
            const formattedDate = new Date(dateFilterValue).toISOString().split('T')[0];

            // Logique de filtrage en fonction du type de filtrage sélectionné
            if (filterType === 'year') {
                // Filtrer par année
                const filteredData = bil.filter(item => item.created_at.startsWith(formattedDate.slice(0, 4)));
                updateChart(filteredData);
            } else if (filterType === 'month') {
                // Filtrer par mois
                const filteredData = bil.filter(item => item.created_at.startsWith(formattedDate.slice(0, 7)));
                updateChart(filteredData);
            } else if (filterType === 'day') {
                // Filtrer par jour
                const filteredData = bil.filter(item => item.created_at.startsWith(formattedDate));
                updateChart(filteredData);
            }
        }

        function updateChart(filteredData) {
            // Mettre à jour le graphique avec les données filtrées
            graphiqueBarre.data.datasets[0].data = filteredData.map(item => item.ventes);
            graphiqueBarre.data.datasets[1].data = filteredData.map(item => item.achats);
            graphiqueBarre.update();
        }
    </script>

</body>
</html>
