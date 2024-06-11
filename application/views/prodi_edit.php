<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Prodi oleh Akhmad Aprizhal - 2110020062</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: #74ebd5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            max-width: 400px;
            width: 100%;
            backdrop-filter: blur(10px);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .form-container:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .form-group {
            position: relative;
            margin-bottom: 20px;
        }

        label {
            position: absolute;
            top: 15px;
            left: 20px;
            color: #666;
            font-size: 14px;
            transition: top 0.3s ease, font-size 0.3s ease;
            background: white;
            padding: 0 5px;
        }

        input[type="text"] {
            width: calc(100% - 40px);
            padding: 15px 20px;
            margin: 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus {
            border-color: #007bff;
        }

        input[type="text"]:focus+label,
        input[type="text"]:not(:placeholder-shown)+label {
            top: -15px;
            font-size: 12px;
            color: #007bff;
            background: white;
            padding: 0 5px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
            box-shadow: 0 4px 15px rgba(0, 91, 187, 0.3);
        }

        .form-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h1>Form Edit Prodi</h1>
        <form action="<?= site_url('prodi/perbaharui/' . $prodi->id_prodi) ?>" method="post" onsubmit="return validateForm()">
            <div class="form-group">
                <input type="text" name="kode_prodi" id="kode_prodi" placeholder=" " value="<?php echo $prodi->kode_prodi ?>" required>
                <label for="kode_prodi">Kode Prodi</label>
            </div>
            <div class="form-group">
                <input type="text" name="nama_prodi" id="nama_prodi" placeholder=" " value="<?php echo $prodi->nama_prodi ?>" required>
                <label for="nama_prodi">Nama Prodi</label>
            </div>
            <input type="submit" value="Perbaharui">
        </form>
        <div class="form-footer">
            <a href="<?php echo site_url('prodi') ?>">Kembali ke Daftar Prodi</a>
            <p>&copy; 2024 Akhmad Aprizhal - 2110020062</p>
        </div>
    </div>

    <script>
        function validateForm() {
            var kodeProdi = document.getElementById("kode_prodi").value;
            var namaProdi = document.getElementById("nama_prodi").value;
            if (kodeProdi == "" || namaProdi == "") {
                alert("Kode Prodi dan Nama Prodi harus diisi");
                return false;
            }
            return true;
        }
    </script>
</body>

</html>