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
            margin-right: 50px;
            margin-left: 50px;
        }

        .uname_comment {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-weight: bold;
            font-size: 19px;
            height: 40px;
            padding: 5px;
            border-radius: 5px;
            margin-top: 10px;
            border: #333;

        }

        .content_comment {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            margin-top: 8px;
            font-size: 15px;
            width: 60%;
            padding: 5px;
            border-radius: 5px;
            height: 100px;
        }

        .submit_button {
            margin-top: 30px;
            margin-right: 30px;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            width: 200px;
            height: 50px;
            font-size: 20px;
            border-radius: 5px;
            text-align: center;
        }

        .cancel_button {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            width: 200px;
            height: 50px;
            font-size: 20px;
            border-radius: 5px;
            text-align: center;
        }

    </style>

  </head>

  <body>


    <article>
      <h2 align="center">Ubah Komentar</h2>
      <div align="center">
      <?php
        include "connect.php";

        if (isset($_GET['id_com'])) {
            $id_com = $_GET['id_com'];
            $table_name = $_GET['table_name'];
            $back_page = $_GET['back_page'];


            // Mengeksekusi query untuk mendapatkan komentar berdasarkan ID komentar
            $query = "SELECT * FROM $table_name WHERE id_com = $id_com";
            $result = $conn->query($query);

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $uname = $row["uname"];
                $comment = $row["comment"];

                // Menampilkan formulir untuk mengedit komentar
                echo '<form method="post" action="update.php">';
                echo '    <input type="hidden" name="id_com" value="' . $id_com . '">';
                echo '    <input type="hidden" name="table_name" value="' . $table_name . '">';
                echo '    <input type="hidden" name="back_page" value="' . $back_page . '">';
                echo '    <input class="uname_comment" type="text" name="uname" value="' . $uname . '"><br>';
                echo '    <textarea class="content_comment" name="comment">' . $comment . '</textarea><br>';
                echo '    <input class="submit_button" type="submit" value="Simpan Perubahan" style="font-weight: bold;">';
                echo '    <input class="cancel_button" type="button" value="Batal" style="font-weight: bold;" onclick="history.back();">';
                echo '</form>';

            } else {
                echo "Komentar tidak ditemukan.";
            }
        } else {
            echo "ID komentar tidak valid.";
        }

        $conn->close();
      ?>

      </div>
        
    </article>

    
  </body>
  
</html>