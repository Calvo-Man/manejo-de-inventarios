
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de personas en el sistema</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
        }
        .card-title {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }
        .card {
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            width: 100%;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .img-thumbnail {
            width: 100px;
            height: auto;
        }
        @media print {
            .card {
                border: none;
                margin: 0;
                padding: 0;
            }
            .table th, .table td {
                border: 1px solid #000;
                padding: 6px;
            }
            .table th {
                background-color: #fff;
                color: #000;
            }
            .img-thumbnail {
                width: 80px;
            }
        }
    </style>
</head>
<body>
    <h5 class="card-title">Listado de personas en el sistema</h5>
    <div class="card">
        <div class="table-responsive">
            <table class="table table-sm table-bordered">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Apellido paterno</th>
                        <th>Apellido materno</th>
                        <th>Nombres</th>
                        <th>Fecha de nacimiento</th>
                    </tr>
                </thead>
                <tbody>
                   
                    <tr> 
                            <td>

                                <?php echo $ruta ?> 

                            </td>                   
                        <td>{{ $persona->paterno }}</td>
                        <td>{{ $persona->materno }}</td>
                        <td>{{ $persona->nombre }}</td>
                        <td>{{ $persona->fecha_nacimiento }}</td>
                    </tr>
                   
                </tbody>       
            </table>
        </div>
    </div>
</body>
</html>

