<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mahasiswa oleh Akhmad Aprizhal - 211020062</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%);
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 1000px;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
            border: 1px solid rgba(255, 255, 255, 0.18);
            transition: transform 0.3s ease;
        }

        .glass-card:hover {
            transform: translateY(-10px);
        }

        .btn-custom {
            border: none;
            border-radius: 50px;
            padding: 10px 20px;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-custom:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .btn-success-custom {
            background-color: #28a745;
            color: white;
        }

        .btn-info-custom {
            background-color: #007bff;
            color: white;
        }

        .btn-danger-custom {
            background-color: #dc3545;
            color: white;
        }

        .btn-warning-custom {
            background-color: #ff8c00;
            color: white;
        }

        .modal-content {
            background: rgba(255, 255, 255, 0.8);
            border-radius: 20px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        table {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        table:hover {
            transform: translateY(-5px);
        }

        thead {
            background: rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            color: #333;
        }

        .welcome-message-container {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .welcome-message {
            font-size: 2.5rem;
            font-weight: bold;
            color: #ffffff;
            text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            animation: glow 1.5s infinite alternate;
            position: relative;
            overflow: hidden;
            padding: 20px;
            border-radius: 15px;
            background: rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 1000px;
            text-align: center;
        }

        .welcome-message::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            height: 100%;
            width: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            animation: slide 3s infinite;
        }

        @keyframes slide {
            0% {
                left: -100%;
            }

            50% {
                left: 100%;
            }

            100% {
                left: -100%;
            }
        }

        @keyframes glow {
            0% {
                text-shadow: 0 0 8px rgba(255, 255, 255, 0.2), 0 0 16px rgba(255, 255, 255, 0.2), 0 0 24px rgba(255, 255, 255, 0.2);
            }

            100% {
                text-shadow: 0 0 16px rgba(255, 255, 255, 0.6), 0 0 32px rgba(255, 255, 255, 0.6), 0 0 48px rgba(255, 255, 255, 0.6);
            }
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="welcome-message-container">
            <h1 class="welcome-message">Selamat Datang di web Akhmad Aprizhal</h1>
        </div>
        <a href="<?php echo site_url('mahasiswa/tambah') ?>" class="btn btn-success-custom btn-custom mb-3"><i class="fas fa-plus"></i> Tambah</a>
        <a href="<?php echo site_url('mahasiswa/cetak') ?>" class="btn btn-warning-custom btn-custom mb-3" target="_blank"><i class="fas fa-print"></i> Cetak</a>
        <div class="glass-card">
            <table class="table table-bordered table-striped mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-center">NO</th>
                        <th scope="col" class="text-center">NIM</th>
                        <th scope="col" class="text-center">Nama</th>
                        <th scope="col" class="text-center">Program Studi</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($mahasiswa as $row) { ?>
                        <tr>
                            <td class="text-center"><?php echo $no++ ?></td>
                            <td><?php echo $row->NIM ?></td>
                            <td><?php echo $row->nama_mhs ?></td>
                            <td><?php echo $row->nama_prodi ?></td>
                            <td class="text-center">
                                <a href="<?php echo site_url('mahasiswa/edit/' . $row->id_mahasiswa) ?>" class="btn btn-info-custom btn-custom mr-2">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <button class="btn btn-danger-custom btn-custom" data-toggle="modal" data-target="#confirmDeleteModal<?php echo $row->id_mahasiswa ?>">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <?php foreach ($mahasiswa as $row) { ?>
        <div class="modal fade" id="confirmDeleteModal<?php echo $row->id_mahasiswa ?>" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel<?php echo $row->id_mahasiswa ?>" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteModalLabel<?php echo $row->id_mahasiswa ?>">Konfirmasi Hapus</h5>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin menghapus data ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-custom" data-dismiss="modal">Batal</button>
                        <a href="<?php echo site_url('mahasiswa/hapus/' . $row->id_mahasiswa) ?>" class="btn btn-danger-custom btn-custom">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>