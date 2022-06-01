<?php
// Number generator generates unique sorted numbers as per count and range.
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lottery numbers generater for Arizona and powerball</title>

<style>
body {
max-width: 992px;
font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif;
  font-weight: normal;
  line-height: normal;
  margin: 0 auto;
  padding: 1.25em;
background: url(textured_stripes.png);
}
p { color: #222; line-height: 1.486; }
/* Normalizing Tags
*******************************************************************************/
small       { font-size: 85%; }
strong, th  { font-weight: bold; }
td, td img  { vertical-align: top; }
sub, sup    { font-size: 75%; line-height: 0; position: relative; vertical-align: baseline; }
sup         { top: -0.5em; }
sub         { bottom: -0.25em; }
pre         { padding: 15px; white-space: pre; white-space: pre-wrap; word-wrap: break-word;
              max-width: 95%; border: thin solid #444; background: #fafafa;}
a           { text-decoration: none; }
.clearfix:before, .clearfix:after,
{ content: ""; display: table; }
.clearfix:after { clear: both; }
.clearfix { zoom: 1; }
h2{margin-bottom:0;margin-left:5px;}
.button {
  border-style: solid;
  border-width: 1px;
  cursor: pointer;
  min-height: 36px;
  background-color: cyan;
  border-color: #507095;
  color: #000;
  transition: background-color 300ms ease-out; }
  button:hover, button:focus, .button:hover, .button:focus {
    background-color: #507095; }
  button:hover, button:focus, .button:hover, .button:focus {
    color: #fff; }
.right-suide{float:right; position:relative;top: 0;display: block;line-height: 2;
  background-color: red;color: white;min-width: 80px;text-align: center;}
figure img { width: auto; }
footer { padding-top: 20px; }
article, header, section {display: block;padding: 5px; margin: 0 auto; width: 98.8992%; }
    .block{display:block;width: 100%;position: relative;min-height: 50px;}
    fieldset{background: rgba(252,252,252,.92)}
    input{height: 2em;min-width: 80px; width: auto; max-width: 80px;  font-size: 1.2em;
      letter-spacing: 1px;}

    input[type="submit"]{background-color: cyan;position:relative; left: -25%}
    input[type="reset"]{background-color: red;}
    label{min-width: 217px;display: inline-block;}
    .numberz{height: 88px;display:block;color: #444;font-weight: bold;background: #fff;padding: 1em; 
      font-family: "Nimbus Mono N", monospace; width: calc(98.8992% - 1.5em);}
      @media screen and (min-width:992px){
        input[type="submit"]{left:auto}
      }
</style>
</head>
<body>

<div class="block">
  <header>
    <h1>Arizona Lottery (unofficial)_<em>*</em> number generator</h1>
  </header>
  <pre>
  Powerball =
    5 white numbers (1 – 69)
    1 red Powerball number (1 – 26)
    -------------------------------
  MegaMillions =
    5 white numbers (1 – 70)
    1 Mega Ball number (1 – 25)
    ---------------------------
  Pick =
    six numbers (1 – 44)
    --------------------
  Fantasy 5 =
    5 numbers (1 – 41)
    ------------------
  </pre>
  <?php 
function getDistinctRandomNumbers ($nb, $min, $max) {
    if ($max - $min + 1 < $nb)
        return false; // or throw an exception

    $res = array();
    do {
        $res[mt_rand($min, $max)] = 1;
    } while (count($res) !== $nb);
    return array_keys($res); 
}
  ?>
  <h2>How It Works</h2>
  <article><ol><li>Enter how many numbers you want to generate in the first box.</li>
  <li>Then enter the range of numbers you would like according to which draw game you are playing for.</li>
  </ol></article>
    <form method="post" name="lottoForm" id="lottoForm" action="<?php echo
        htmlspecialchars($_SERVER['PHP_SELF']); ?>#resultz">
    <fieldset>
    <label>how many numbers</label> <input type="number" name="howmany" id="howmany"
    value="<?php echo empty($_POST['howmany']) ? '' : $_POST['howmany']; ?>">
    </fieldset>
    <fieldset>
    <label>range of numbers. from 1 to ?</label> <input type="number" name="rangeto"
    id="rangeto" value="<?php echo empty($_POST['rangeto']) ? '' : $_POST['rangeto']; ?>">
    </fieldset>
    <fieldset>
    <label for="submit">Luck </label><input class="button" type="submit" name="submit" value="go">
 <a class="button right-suide" href="<?php echo
      htmlspecialchars($_SERVER['PHP_SELF']); ?>" title="restart">restart</a>
    </fieldset>
    </form><br>

      <div id="resultz" class="block numberz" style="display: block;">
      <p>
      <?php if (isset($_POST['submit'])) {
      $howmany = (''!= $_POST['howmany'] ) ? $_POST['howmany'] : 6;
      $rangeto = (''!= $_POST['rangeto'] ) ? $_POST['rangeto'] : 50;
      $numbers = getDistinctRandomNumbers( $howmany, 1, $rangeto);
      
      foreach($numbers as $number ){
        $arr[] = $number;
      }
      sort($arr);
      $items = count($arr);
      for($num = 0; $num < $items; $num += 1){
        echo  $arr[$num]. " ";
      }
  
      }
      ?></p>
      </div>
</div><div class="clearfix"></div>
 
<hr>
<footer><em>*</em>This site is for enjoyment only. No liabilities for anything that goes on here :-) | Brought to you by <a href="https://tradesouthwest.com" title="tradesouthwest website builder">TSW</a> 
If you win or like to donate PayPal me @ <a href="https://paypal.me/tradesouthwest" title="pay larry at tradesouthwest">paypal.me/tsw</a>
 <em>Share me on twitter:</em> <a class="button twitter-share-button" target="_blank" 
 href="https://twitter.com/intent/tweet?text=AZ%20lottery%20number%20generator%20at%20http://tswdev.com/public/lotto.php">
Tweet</a>
</footer>

<script type="text/javascript">
    function setCookieData(c_name, value, expiredays) {
        var exdate = new Date();
        exdate.setDate(exdate.getDate() + expiredays);
        document.cookie = c_name + "=" + value + ";path=/" + ((expiredays ==null) ? ""
        : ";expires=" + exdate.toGMTString());
    }

</script>
</body>
</html>
