<?php
session_start();

if (!isset($_SESSION['student_id'])) {
    header("Location: ../login.php");
    exit();
}

include("../includes/db.php");

$sql = "SELECT * FROM notes";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecture Notes</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #f4f7fc;
            padding: 40px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #1e3a8a;
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #1e3a8a;
            color: white;
            padding: 15px;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        tr:nth-child(even) {
            background: #f9fafb;
        }

        tr:hover {
            background: #eef4ff;
        }

        .btn-download {
            display: inline-block;
            background: #2563eb;
            color: white;
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 6px;
            transition: 0.3s;
        }

        .btn-download:hover {
            background: #1d4ed8;
        }

        .no-data {
            text-align: center;
            color: #777;
            padding: 20px;
            font-size: 18px;
        }

        @media(max-width:768px) {

            body {
                padding: 15px;
            }

            .container {
                padding: 20px;
            }

            table,
            thead,
            tbody,
            th,
            td,
            tr {
                display: block;
                width: 100%;
            }

            thead {
                display: none;
            }

            tr {
                margin-bottom: 15px;
                border: 1px solid #ddd;
                border-radius: 8px;
                overflow: hidden;
                background: white;
            }

            td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }

            td::before {
                position: absolute;
                left: 15px;
                font-weight: bold;
                text-align: left;
            }

            td:nth-child(1)::before {
                content: "Title";
            }

            td:nth-child(2)::before {
                content: "Download";
            }
        }
    </style>
</head>

<body>

<div class="container">

    <h1>📚 Available Lecture Notes</h1>

    <table>

        <tr>
            <th>Title</th>
            <th>Download</th>
        </tr>

        <?php
        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
        ?>

        <tr>

            <td><?php echo $row['title']; ?></td>

            <td>
                <a class="btn-download"
                   href="../uploads/notes/<?php echo $row['file_name']; ?>"
                   download>
                    Download
                </a>
            </td>

        </tr>

        <?php
            }
        } else {
        ?>

        <tr>
            <td colspan="2" class="no-data">
                No lecture notes available.
            </td>
        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>