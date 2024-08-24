<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard PRIMEXPO</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Custom CSS for black background */
        body {
            background-color: #000;
            color: #fff;
        }

        .card {
            background-color: #333;
            border: none;
        }

        .card-header {
            background-color: #444;
            color: #fff;
        }

        .table {
            color: #fff;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #222;
        }

        .table thead th {
            background-color: #444;
            color: #fff;
        }

        .nav-link {
            color: #fff;
        }

        .nav-link.active {
            background-color: #555;
        }

        .btn-outline-secondary {
            color: #fff;
            border-color: #555;
        }

        .btn-outline-secondary:hover {
            background-color: #555;
            border-color: #444;
        }

        /* Remove sidebar and adjust layout */
        #sidebar {
            display: none;
        }

        main {
            margin: 0;
        }

        .container-fluid {
            padding: 0;
        }

        footer {
            background-color: #222;
            color: #fff;
            padding: 10px 0;
        }

        /* Chat Widget Style */
        #chatbot {
            position: fixed;
            bottom: 0;
            right: 0;
            margin: 20px;
            width: 300px;
            height: 400px;
            z-index: 1000;
        }
    </style>
</head>

<body>
    <header>
        <div class="container-fluid">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">DASHBOARD PRIMEXPO</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                        <span data-feather="calendar"></span>
                        This week
                    </button>
                </div>
            </div>
        </div>
    </header>

    <main role="main" class="container-fluid px-md-4">
        <!-- Gantt Chart Section -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-project-diagram"></i> DHTMLX Gantt Chart
            </div>
            <div class="card-body">
                <div id="gantt_here" style="width:100%; height:450px;"></div>
            </div>
        </div>

        <!-- Chart.js Gantt Chart Section -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-bar"></i> Chart.js Gantt Chart
            </div>
            <div class="card-body">
                <canvas id="chartjs_gantt" width="800" height="400"></canvas>
            </div>
        </div>

        <!-- Project Details Section -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-info-circle"></i> Project Details
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Project Name</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Percentage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Wow Spageti (Bandung)</td>
                            <td>2024-08-10</td>
                            <td>2024-08-25</td>
                            <td>In Progress</td>
                            <td>94%</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Garnier Reno RoadShow</td>
                            <td>2024-08-20</td>
                            <td>2024-08-26</td>
                            <td>In Progress</td>
                            <td>85%</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Caresso</td>
                            <td>2023-04-01</td>
                            <td>2023-09-30</td>
                            <td>Pending</td>
                            <td>0%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <footer class="container-fluid text-center">
        <p>&copy; 2024 Edho. All rights reserved.</p>
    </footer>

    <!-- Chatbot Widget -->
    <div id="chatbot"></div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-chart-gantt@1.2.0/dist/chartjs-chart-gantt.min.js"></script>
    <script src="script.js"></script>

    <!-- Initialize DHTMLX Gantt Chart -->
    <script>
        gantt.config.xml_date = "%Y-%m-%d %H:%i";
        gantt.config.date_format = "%Y-%m-%d";
        gantt.config.columns = [
            { name: "text", label: "Task name", tree: true, width: 200 },
            { name: "start_date", label: "Start date", align: "center" },
            { name: "end_date", label: "End date", align: "center" }
        ];
        gantt.init("gantt_here");

        gantt.parse({
            data: [
                { id: 1, text: "Task #1", start_date: "2024-08-10", end_date: "2024-08-15", progress: 0.6 },
                { id: 2, text: "Task #2", start_date: "2024-08-16", end_date: "2024-08-20", progress: 0.4 },
                { id: 3, text: "Task #3", start_date: "2024-08-21", end_date: "2024-08-25", progress: 0.8 }
            ]
        });
    </script>

    <!-- Initialize Chart.js Gantt Chart -->
    <script>
        const ctx = document.getElementById('chartjs_gantt').getContext('2d');

        const chartjsGantt = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Task #1', 'Task #2', 'Task #3'],
                datasets: [
                    {
                        label: 'Tasks',
                        data: [
                            { x: '2024-08-10', x2: '2024-08-15', y: 'Task #1' },
                            { x: '2024-08-16', x2: '2024-08-20', y: 'Task #2' },
                            { x: '2024-08-21', x2: '2024-08-25', y: 'Task #3' }
                        ],
                        backgroundColor: 'rgba(75, 192, 192, 0.5)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                indexAxis: 'y',
                scales: {
                    x: {
                        type: 'time',
                        time: {
                            unit: 'day'
                        },
                        title: {
                            display: true,
                            text: 'Date'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Task'
                        }
                    }
                }
            }
        });
    </script>

    <!-- Chat Widget Initialization -->
    <script>
        // This is just a placeholder for where you'd typically initialize a chat widget.
        // Replace with actual chat widget script as per your choice of provider
        document.getElementById('chatbot').innerHTML = `
            <iframe src="https://your-chat-widget-url" style="width:100%; height:100%; border:none;"></iframe>
        `;
    </script>
</body>

</html>
