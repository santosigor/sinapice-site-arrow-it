<? 
   $sql = "SELECT id_dados, endereco, telefone, celular, email, facebook, instagram, linkedin
   FROM ait_dadosgerais 
   WHERE 1";
   $rs = mysqli_query($con, $sql); 
   $row = mysqli_fetch_array($rs);
   $endereco = $row["endereco"];
   $telefone = $row["telefone"];
   $celular = $row["celular"];
   $email = $row["email"];
   $facebook = $row["facebook"];
   $instagram = $row["instagram"];
   $linkedin = $row["linkedin"];

   $telform = "(".substr($telefone,0,2).") <strong>".substr($telefone,2,-4)." - ".substr($telefone,-4)."</strong>";
   $celform = "(".substr($celular,0,2).") <strong>".substr($celular,2,-4)." - ".substr($celular,-4)."</strong>";
?>

    <footer class="ait-structure__footer">
      <div class="ait-container">
        <div class="row"> 
          <div class="col-md-6 ait-utilities__text-align__center">
            <a href="index.php" class="ait-structure__footer__logo">
              <img src="./dist/images/icons/ait-svg-logo-white.svg" alt="Logo footer">
            </a>
            <ul>
              <li>
                <a href="https://goo.gl/maps/bB93DWEQBm7ytmNAA" target="_blank"><strong>Av. Trindade, 254</strong> - Sala 1208 <br>Bethaville I - Barueri - SP</a>
              </li>
              <li>
                <a href="tel:+55<?=$telefone?>"><?=$telform?></a>
              </li>
              <li>
                <a  href="https://api.whatsapp.com/send?phone=55<?=$celular?>" target="_blank"><?=$celform?></a>
              </li>
              <li>
                <a href="mailto:<?=$email?>"><?=$email?></a>
              </li>
              <li>
                <a href="<?=$facebook?>" target="_blank" title="Facebook">
                  <img src="./dist/images/icons/ait-svg-facebook-white.svg" alt="">
                </a>
                <a href="<?=$instagram?>" target="_blank" title="Instagram">
                  <img src="./dist/images/icons/ait-svg-instagram-white.svg" alt="">
                </a>
                <a href="<?=$linkedin?>" target="_blank" title="Linkedin">
                  <img src="./dist/images/icons/ait-svg-linkedin-white.svg" alt="">
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-6 ait-utilities__text-align__center">
            <img src="./dist/images/icons/ait-svg-faixa-diagonal-footer.svg" alt="">
          </div>
        </div>
      </div>
    </footer>

    <!-- jquery e plugins -->
    <script src="./dist/js/jquery.min.js"></script>
    
    <!-- AIT JS -->    
    <script src="./dist/js/ait.min.js"></script>

  </body>
</html>