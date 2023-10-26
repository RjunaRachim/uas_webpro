<html>
  <head>
    <title>Kelompok 3 | Budaya Indonesia</title>
    <link rel="icon" href="imgsrc/xing.png" />
    <link rel="stylesheet" href="cagarbudaya.css">
    <style>

      body {
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        background-color: #D0E7D2;
        padding-top: 20;
        padding-left: 20;
        padding-right: 20;
        padding-bottom: 20;
        border-radius: 20px;
        margin-bottom: 20;
      }


      article {
        background-color: #B0D9B1;
        font-size: 20;
        text-align: justify;
        line-height: 2;
        padding-top: 50px;
        padding-left: 100px;
        padding-right: 100px;
        padding-bottom: 50px;
        border-radius: 20px;
        margin-top: 50px;
        margin-right: 50;
        margin-left: 50px;
      }

    </style>
  </head>

  <body>


    <article>
    <?php
        include "connect.php";

        // Mendapatkan data dari page dimana komentar akan dihapus dengan berdasar ID
        $id_to_delete = $_GET['id_com'];
        $table_name = $_GET['table_name'];
        $back_page = $_GET['back_page'];

        // SQL untuk menghapus data
        $sql = "DELETE FROM $table_name WHERE id_com = $id_to_delete";

        if ($conn->query($sql) === TRUE) {
            echo '<h2 align="center">Komentar Berhasil Dihapus</h2>';
            echo '<p align="center">Anda akan diarahkan ke halaman Komentar dalam 5 Detik <br> atau <br> <a href="' . $back_page . '"><b>KLIK DISINI</b></a></p>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    ?>

        
    </article>

    <script>
        // Fungsi untuk mengarahkan ke halaman lain setelah penundaan
        function redirectToNewPage() {
          setTimeout(function() {
            // URL tujuan redirect
            window.location.href = "<?php echo $back_page; ?>";
          }, 5000); // 5000 milidetik (5 detik)
        }
      
        // Panggil fungsi redirectToNewPage saat halaman dimuat
        window.onload = redirectToNewPage;
      </script>
  </body>
  
</html>