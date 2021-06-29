<? include("header.php");

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

    <section class="ait-content__contato-page">
      <div class="ait-container">
        <div class="row">
          <div class="col-md-6 col-lg-5">
            <div class="ait-typography__h1">Quando vamos tomar um café?</div>
            <ul>
              <li>
                <a href="tel:+55<?=$telefone?>"><?=$telform?></a>
                <p>Telefone</p>
              </li>
              <li>
                <a href="mailto:<?=$email?>"><?=$email?></a>
                <p>E-mail</p>
              </li>
              <li>
                <a  href="https://api.whatsapp.com/send?phone=55<?=$celular?>" target="_blank"><?=$celform?></a>
                <p>
                  WhatsApp <span>Suporte em atendimento 24 x 7</span>
                </p>
              </li>
              <li>
                <a href="<?=$facebook?>" target="_blank" title="Facebook">
                  <img src="./dist/images/icons/ait-svg-facebook.svg" alt="">
                </a>
                <a href="<?=$instagram?>" target="_blank" title="Instagram">
                  <img src="./dist/images/icons/ait-svg-instagram.svg" alt="">
                </a>
                <a href="<?=$linkedin?>" target="_blank" title="Linkedin">
                  <img src="./dist/images/icons/ait-svg-linkedin.svg" alt="">
                </a>
              </li>
            </ul>
            <div class="ait-content__contato-page__info">
              <div class="ait-typography__h3 ait-utilities__color__blue">Arrow IT <br>Soluções em Tecnologia</div>
              <a href="https://goo.gl/maps/bB93DWEQBm7ytmNAA" target="_blank"><?=$endereco?></a>
            </div>
          </div>
          <div class="col-md-6 col-lg-7">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3658.7219460368365!2d-46.87049478502309!3d-23.50652268471013!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cf03d22ffb1e47%3A0x872f33af5d4784aa!2sAv.%20Trindade%2C%20254%20-%20Bethaville%20I%2C%20Barueri%20-%20SP%2C%2006404-326!5e0!3m2!1spt-BR!2sbr!4v1620818264948!5m2!1spt-BR!2sbr" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
        </div>
      </div>
    </section>

<? include("footer.php"); ?>