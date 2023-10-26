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

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
                if (isset($_POST["id_com"], $_POST["uname"], $_POST["comment"])) {
                    $id_com = $_POST["id_com"];
                    $uname = $_POST["uname"];
                    $comment = $_POST["comment"];
                    $table_name = $_POST['table_name'];
                    $back_page = $_POST['back_page'];

                    // Gunakan prepared statement untuk menghindari serangan SQL Injection
                    $query = $conn->prepare("UPDATE $table_name SET uname = ?, comment = ? WHERE id_com = ?");
                    $query->bind_param("ssi", $uname, $comment, $id_com);

                    if ($query->execute()) {
                        echo '<h2 align="center">Perubahan Berhasil Disimpan</h2>';
                        echo '<p align="center">Anda akan diarahkan ke halaman Komentar dalam <b>5 Detik</b> <br> atau <br> <a href="' . $back_page . '"><b>KLIK DISINI</b></a></p>';
                    } else {
                        echo "Terjadi kesalahan saat menyimpan perubahan: " . $conn->error;
                    }

                    $query->close();
                } else {
                    echo "Data yang dibutuhkan tidak ditemukan.";
                }
            } else {
                echo "Permintaan tidak valid.";
            }

            $conn->close();
        ?>
        
    </article>

    <script>
        // Fungsi untuk mengarahkan ke halaman lain setelah penundaan
        function redirectToNewPage() {
          setTimeout(function() {
            
            window.location.href = "<?php echo $back_page; ?>";
          }, 5000); // 5000 milidetik (5 detik)
        }
      
        // Panggil fungsi redirectToNewPage saat halaman dimuat
        window.onload = redirectToNewPage;
      </script>
  </body>
  
</html>