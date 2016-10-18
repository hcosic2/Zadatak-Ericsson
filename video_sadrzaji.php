<!DOCTYPE html>
<?php
include_once 'baza.class.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$baza = new baza();
$baza->spajanje();

$upit = "SELECT url FROM video WHERE id=" . $id;
$odgovor = $baza->upiti($upit);
$red = $odgovor->fetch_assoc();
?>
<html>
    <head>
        <title>Video sadržaji</title>
        <meta charset="UTF-8">
        <meta name="author" content="Hrvoje Ćosić">
        <meta name="keywords" content="Ericsson">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="JavaScript/ericsson.js"></script>
        <link href="CSS/ericsson.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container2">
            <h1 id="naslov"> Video sadržaji </h1>
        </div>

        <div class="container3">
            <nav>
                <ul id="navigacija2">
                    <li><a href="index.php">Naslovnica</a></li>
                </ul>
            </nav>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-sx-12 ">

                    <div class="video-container">
                        <iframe width="560" height="315" src="<?php echo $red['url']; ?>" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <br>
                    <p>Samsung galaxy s4 mini. Izbor materijala je tradicionalna Samsungova sjajeća plastika koju mnogi kritiziraju, dok većini očito ne predstavlja problem. </p>
                    <button id="myBtn" type="submit" class="btn btn-success btn-lg">Više</button><br><br>


                    <div id="myModal" class="modal">

                        <div class="modal-content">
                            <span class="close">&times</span>
                            <div class="modal-body">
                                <p>Veličina videa: 10MB</p>
                                <p>Dužina videa: 1:32min</p>
                                <p>Video postavio: dino1995</p>
                                <p>Ocijena videa: 54</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>

            var modal = document.getElementById('myModal');

            var btn = document.getElementById("myBtn");

            var span = document.getElementsByClassName("close")[0];

            btn.onclick = function () {
                modal.style.display = "block";
            }

            span.onclick = function () {
                modal.style.display = "none";
            }

            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
        <div class="container2">
            <p>Izradio: Hrvoje Ćosić</p>
            <p>Kontakt: hcosic2@foi.hr</p>
        </div>
    </body>
</html>
