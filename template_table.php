<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Spreadsheet Data Viewer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 90%;
            margin: 20px auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        .filters {
            margin-bottom: 20px;
        }
        .filters label {
            margin-right: 10px;
            font-weight: bold;
        }
        .filters input {
            margin-right: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Google Spreadsheet Data Viewer</h1>
        <div class="filters">
            <label for="search">Filter:</label>
            <input type="text" id="search" placeholder="Type to search...">
        </div>
        <table>
            <thead>
                <tr id="table-header"></tr>
            </thead>
            <tbody id="table-body"></tbody>
        </table>
    </div>

    <script>
        // Fetch data from PHP script
        fetch('fetch-data.php')
            .then(response => response.json())
            .then(data => {
                // Display headers
                const headerRow = data[0];
                const tableHeader = document.getElementById('table-header');
                headerRow.forEach(header => {
                    const th = document.createElement('th');
                    th.textContent = header;
                    tableHeader.appendChild(th);
                });

                // Display rows
                const tableBody = document.getElementById('table-body');
                data.slice(1).forEach(row => {
                    const tr = document.createElement('tr');
                    row.forEach(cell => {
                        const td = document.createElement('td');
                        td.textContent = cell;
                        tr.appendChild(td);
                    });
                    tableBody.appendChild(tr);
                });

                // Add filtering functionality
                const searchInput = document.getElementById('search');
                searchInput.addEventListener('input', () => {
                    const filter = searchInput.value.toLowerCase();
                    const rows = tableBody.querySelectorAll('tr');
                    rows.forEach(row => {
                        const cells = Array.from(row.querySelectorAll('td'));
                        const matches = cells.some(cell => cell.textContent.toLowerCase().includes(filter));
                        row.style.display = matches ? '' : 'none';
                    });
                });
            })
            .catch(error => console.error('Error:', error));
    </script>
</body>
</html>
