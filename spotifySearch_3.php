<?php
    include 'includes/header.php';//header
    include 'includes/nav.php';//nav
    //include 'templates/spotifySearch_2.php';
    //include 'includes/footer.php';//footer
?>
<div class="content-main">
    <section class="content-section about-section about-section-main aside-col extend">
        <div class="container-fluid nopadding extend">
            <div class="row nopadding">
                <span class="col-lg-2 col-md-12 col-sm-12 col-xs-12 extend-col extend-left"></span><div class="page-header">
<div class="page-header">
    <div class="container">
        <h3>Binge Tunes Search</h3>
        <?php
        $id = $_GET['id'];
        $imageURL = $_GET['url'];
    
        echo "<div class='col-md-4'>";
        echo  "<img src='$imageURL' alt='album cover'>";
        echo "</div>";
        echo "<div class='col-md-8'>";
        $url = "https://api.spotify.com/v1/albums/$id/tracks?market=US";
        

            //$url = "https://api.spotify.com/v1/search?q=$q&type=artist&market=US";
            //echo $url;
            //exit();
            //get the data from json call to api
            $curl = curl_init($url);

            // indicates that we want the response back
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
           // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            //curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            //curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
            // exec curl and get the data back
            $json_data = curl_exec($curl);
            $data = json_decode($json_data, true);
            // remember to close the curl session once we are finished retrieveing the data
            curl_close($curl);
            //var_dump($data);
            
            foreach ($data['items'] as $item):
                //echo $item['name']. '<br>';
                $name = $item['name'];
                $preview_url = $item['preview_url'];
                 echo "<div class='col-md-4'>
                          <div class='caption text-center'>
                            <h4>$name</h4>
                          </div> 
                          <audio controls style='width:98%'>
                            <source src='$preview_url' type='audio/mpeg'>
                            Your browser does not support the audio element.
                          </audio>                        
                        </div>";
            endforeach;
                
        echo '</div>';

        ?>
    </div>
</div>
<?php
//display html footer
//include '/includes/footer.php';
