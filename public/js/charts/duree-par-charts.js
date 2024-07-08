document.addEventListener('DOMContentLoaded', function() {
    let chartGenre, chartTechnicien, chartType;

    // Function to convert seconds to HH:MM:SS format
    function formatDuration(seconds) {
        const hours = Math.floor(seconds / 3600);
        const minutes = Math.floor((seconds % 3600) / 60);
        const remainingSeconds = seconds % 60;

        return `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${remainingSeconds.toString().padStart(2, '0')}`;
    }

    // Function to get data for "duree par genre" chart
    function getDataForGenre() {
        const from = document.getElementById('fromgenre').value;
        const to = document.getElementById('togenre').value;

        fetch(`/statistiques/duree-par-genre?from=${from}&to=${to}`)
            .then(response => response.json())
            .then(data => {
                console.log('Genre Data:', data);
                const labels = data.data.map(item => item.Genre);
                const durationsInSeconds = data.data.map(item => item.DureeTotale);

                const ctx = document.getElementById('dureeParGenre').getContext('2d');

                if (chartGenre) {
                    chartGenre.destroy();
                }

                chartGenre = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Total Duration per Genre',
                            data: durationsInSeconds,
                            backgroundColor: 'rgb(75, 192, 192)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    callback: value => formatDuration(value)
                                }
                            }
                        }
                    }
                });
            })
            .catch(error => {
                console.error('Error fetching genre data:', error);
            });
    }

    // Function to get data for "duree par technicien" chart
    function getDataForTechnicien() {
        const from = document.getElementById('fromTechnicien').value;
        const to = document.getElementById('toTechnicien').value;

        fetch(`/statistiques/duree-par-technicien?from=${from}&to=${to}`)
            .then(response => response.json())
            .then(data => {
                console.log('Technicien Data:', data);
                const labels = data.map(item => `${item.Nom} ${item.Prenom}`);
                const durationsInSeconds = data.map(item => item.DureeTotale);

                const ctx = document.getElementById('dureeParTechnicien').getContext('2d');

                if (chartTechnicien) {
                    chartTechnicien.destroy();
                }

                chartTechnicien = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Total Duration per Technician',
                            data: durationsInSeconds,
                            backgroundColor: 'rgb(75, 192, 192)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    callback: value => formatDuration(value)
                                }
                            }
                        }
                    }
                });
            })
            .catch(error => {
                console.error('Error fetching technicien data:', error);
            });
    }

    function getDataForType() {
        const from = document.getElementById('fromtype').value;
        const to = document.getElementById('totype').value;

        fetch(`/statistiques/duree-par-type?from=${from}&to=${to}`)
            .then(response => response.json())
            .then(data => {
                console.log('Type Data:', data);
                const labels = data.map(item => item.Type_support);
                const durationsInSeconds = data.map(item => item.DureeTotale);

                const ctx = document.getElementById('dureeParType').getContext('2d');

                if (chartType) {
                    chartType.destroy();
                }

                chartType = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Total Duration per Type',
                            data: durationsInSeconds,
                            backgroundColor: 'rgb(75, 192, 192)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    callback: value => formatDuration(value)
                                }
                            }
                        }
                    }
                });
            })
            .catch(error => {
                console.error('Error fetching type data:', error);
            });
    }

    getDataForType();
    getDataForGenre();
    getDataForTechnicien();
    

    // Affecter des fonctions getData à la fenêtre pour les gestionnaires de clics sur les boutons
    window.getDataForGenre = getDataForGenre;
    window.getDataForTechnicien = getDataForTechnicien;
    window.getDataForType = getDataForType;
});
