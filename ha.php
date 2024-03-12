<!DOCTYPE html>
<html>
<head>
  <title>Accueil</title>
  <link rel="stylesheet" href="hi.css">
</head>
<body>
    <marquee direction="right"><strong class="ja">WELCOME TO MY WEBSITE</strong></marquee>
    <p><h1>CALCULE VOTRE MOYENNE</h1></p>
    <p>Les Notes des modules :</p>
    <hr>
    <form method="post" action= ""> 
    <p>Entrer Le Nombre Du Module 
    <input type="number" name="nomber" placeholder="Nombre Du Module" id="nomber">
   <button type="submit">VALIDER</button></p>
  </form>
    <?php
    echo'<form method="post"> ';
  $nomber=0;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (isset($_POST["nomber"])){
      $nomber = intval($_POST["nomber"]);
      $totalNotes = 0;

      echo '<br>Le Nomber de Module :<input type="text" id="nbr" name="nbr" value="' . $nomber . '"><br>';
    

      for ($i = 1; $i <= $nomber; $i++) 
      {
        echo '<br><input type="text" id="note'.$i.'" name="note'.$i.'" placeholder="Note Module '.$i.'" ><br>';
        echo '<br>';
      }
      echo '<br><input  type="submit" value="ok" name="Ok" ><br>';
        echo'</form> ';}
        if (isset($_POST["note1"])&&isset($_POST["Ok"])){
          $totalNotes = 0;
          $x=array("");
          $r=0;
          //echo filter_input(input_POST,"nbr",FILTER_SANITIZE_NUMBER_INT);
          for ($i = 1; $i <= ($_POST["nbr"]); $i++) {
           // echo $i;
            $note[$i] = floatval($_POST['note'.$i]);
            if ($note[$i]<12){
              $x[$i-1]="Module $i";
              $r+=1;
              }
            $totalNotes += $note[$i];
      }
      
        $moyenne= $totalNotes /($_POST["nbr"]);}
        if (isset($r)){
          if($r>0){
        echo "<h1 class='pt'>Les Module Non Valide :</h1>";
        for ($i = 0; $i <($_POST["nbr"]) ; $i++){
          if ($note[$i+1]<12){
            $n=$note[$i+1];
          echo "<h2>$x[$i] (La Note: $n )<br></h2>";}}
        }
      }}
      // verificatio
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($moyenne) && isset($_POST["Ok"])){
      if ($moyenne >= 12) {
        echo "<p><div><h1 class='pt'>Votre moyenne est  $moyenne</h1></div><strong class='li'>semestre validé!</strong></p>";
      } else {
        echo "<p><div><h1 class='pt'>Votre moyenne est  $moyenne</h1></div><strong class='lo'>semestre non validé.</strong></p>";
      }
        }}
    ?>
</body>
</html>
