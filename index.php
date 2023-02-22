<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html dir="ltr" version="XHTML+RDFa 1.0" xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:dc="http://purl.org/dc/terms/" xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:foaf="http://xmlns.com/foaf/0.1/" xmlns:og="http://ogp.me/ns#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" xmlns:sioc="http://rdfs.org/sioc/ns#" xmlns:sioct="http://rdfs.org/sioc/types#" xmlns:skos="http://www.w3.org/2004/02/skos/core#" xmlns:xsd="http://www.w3.org/2001/XMLSchema#">
<head profile="http://www.w3.org/1999/xhtml/vocab">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-131151740-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-131151740-1');
</script>
<title>BK | <?php echo $this->title(); ?></title>
<meta name="google" content="notranslate">
<meta content="application/xhtml+xml; charset=utf-8" http-equiv="content-type" />
<meta content="IE=edge" http-equiv="X-UA-Compatible" />
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
<meta content="true" name="HandheldFriendly" />
<meta content="index, follow" name="robots" />
<meta content="<?php if ($this->description() != '') {
    echo $this->description(); }
      else {
    echo ''; } ?>" name="description" />
<meta content="<?php if ($this->keywords() != '') { echo $this->keywords(); }
      else {
    echo ''; } ?>" name="keywords" />
<meta content="BK TecHouse" name="author" />
<meta content="Bank of Kigali" property="og:site_name" />
<meta content="article" property="og:type" />
<meta content="" property="fb:app_id" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

</head>
<body>
<?php  
  $this->includeSnippet('wb_personal-nav'); 
  $unique =uniqid();
  $fkey = md5(uniqid());
  ?>

<div class=" container-fluid news-home">

    <div class="opened-page">
        <div class="container">
            <div class="no-img-header">
                <h3 class="title">
                    <?php echo $this->title(); ?>
                </h3>
                <div class="breadcrumbs">
                    <?php echo $this->breadcrumbs('<i class="icon-arrow-left"></i>'); ?>
                </div>
            </div>
        </div>
    </div>


    <?php 
 /*
   //fetch country json
        $myData = file_get_contents(URL_PUBLIC.'public/plugins/bk_atm_branch_locations.json');
        $coordinate = json_decode($myData, TRUE);
        echo '<table class="table">';
        echo '<tr><th>name</th><th>street</th><th>town</th><th>country</th><th>category</th><th>latitude</th><th>longitude</th></tr>';
        foreach( $coordinate['locations'] as $loc){
        echo '<tr><td>'.$loc['name'].'</td><td>'.$loc['street'].'</td><td>'.$loc['town'].'</td><td>'.$loc['country'].'</td><td>'.$loc['category'] 
        .'</td><td>'.$loc['latitude'].'</td><td>'.$loc['longitude'].'</td></tr>';                        
         }              
   echo "</table>";
 */
 
//if(!empty(htmlspecialchars($_GET['__qlr'])) && !empty(htmlspecialchars($_GET['__sid']))){

//Data filter function
    function isValid($data) {
           $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8'); //, ENT_QUOTES, 'UTF-8'
          // $data = strtoupper($data);
           return $data;
            }

  $q= isValid($_GET['__qlr']);  
  
    $ndata = substr($q, strpos($q, "_") + 3);   
   
   // echo $ndata;
    
     
    //ALl Branches Location
       if($ndata=='6f61a292e4'){ 
         $query= "SELECT * FROM ".TABLE_PREFIX."locate WHERE service='BRANCH' ORDER BY id ASC ";
        }
        //ALl Branches Location in Kigali
        elseif($ndata=='9b0c6f'){ 
             $query= "SELECT * FROM ".TABLE_PREFIX."locate WHERE service='BRANCH' AND province='KIGALI' ORDER BY id ASC";
            }
        //ALl Branches Location in Eastern
        elseif($ndata=='99ac0d'){ 
             $query= "SELECT * FROM ".TABLE_PREFIX."locate WHERE service='BRANCH' AND province='EASTERN' ORDER BY id ASC";
            }
         //ALl Branches Location in Western
        elseif($ndata=='1050e99b0'){ 
             $query= "SELECT * FROM ".TABLE_PREFIX."locate WHERE service='BRANCH' AND province='WESTERN' ORDER BY id ASC";
            } 
            
         //ALl Branches Location in NORTHERN
        elseif($ndata=='74dec8'){ 
             $query= "SELECT * FROM ".TABLE_PREFIX."locate WHERE service='BRANCH' AND province='NORTHERN' ORDER BY id ASC ";
            } 
            
          //ALl Branches Location in SOUTHERN
        elseif($ndata=='f4d0ec6'){ 
             $query= "SELECT * FROM ".TABLE_PREFIX."locate WHERE service='BRANCH' AND province='SOUTHERN' ORDER BY id ASC ";
            } 
            
          
         //All ATM Locations
           elseif($ndata=='ee861c45'){
             $query= "SELECT * FROM ".TABLE_PREFIX."locate WHERE service='ATM' ORDER BY id ASC ";  
            } 
            
          //ALl ATMs Location in Kigali
        elseif($ndata=='a3b73ea'){ 
             $query= "SELECT * FROM ".TABLE_PREFIX."locate WHERE service='ATM' AND province='KIGALI' ORDER BY id ASC ";
            }
        //ALl ATMs Location in Eastern
        elseif($ndata=='e5f2ee'){ 
             $query= "SELECT * FROM ".TABLE_PREFIX."locate WHERE service='ATM' AND province='EASTERN' ORDER BY id ASC ";
            }
         //ALl ATMs Location in Western
        elseif($ndata=='4bc889'){ 
             $query= "SELECT * FROM ".TABLE_PREFIX."locate WHERE service='ATM' AND province='WESTERN' ORDER BY id ASC ";
            } 
            
         //ALl ATMs Location in NORTHERN
        elseif($ndata=='f687c'){ 
             $query= "SELECT * FROM ".TABLE_PREFIX."locate WHERE service='ATM' AND province='NORTHERN' ORDER BY id ASC ";
            } 
            
          //ALl ATMs Location in SOUTHERN
        elseif($ndata=='ad6600'){ 
             $query= "SELECT * FROM `".TABLE_PREFIX."locate` WHERE `service`='ATM' AND `province`='SOUTHERN' ORDER BY `id` ASC ";
            } 

         //Return Unique location
        elseif(htmlspecialchars($_GET['option'])==uniq){ 
             $query= "SELECT * FROM `".TABLE_PREFIX."locate` WHERE `id`='$ndata'";
            }
            
         //if serch button is clicked
         elseif(($_SERVER["REQUEST_METHOD"] == "POST")){  // && (isset($_POST['d1b9ba394e']))
             
            $key=isValid($_POST['location']); 
             $query= "SELECT * FROM ".TABLE_PREFIX."locate WHERE  keyword='$key' ORDER BY id ASC ";
             
            }   
            
             else{  
               $query= "SELECT * FROM `".TABLE_PREFIX."locate`  ORDER BY `id` ASC ";      
                }
 
            /* }
            else{
               $query= "SELECT * FROM ".TABLE_PREFIX."locate  ORDER BY id ASC "; 
                }
            */
    
 ?>

    <div class="container-fluid ">

        <div class="container map-page">

            <div class="row">

                <div class="col-md-4 box-in hidden-xs">

                    <div class="top-toggle">
                        <center>
                            <button class="btn btn-outlined btn-primary" data-toggle="collapse"
                                data-target="#byProvince,#all" role="menuitem" tabindex="-1">
                                Find Location by Province &nbsp;<i class="fa fa-angle-right"></i></button>
                        </center>
                    </div>

                    <div class="option-list ">

                        <div id="byProvince" class="collapse">

                            <h3>Branches Locations</h3>

                            <ul class="menu-listing">
                                <li><a
                                        href="<?php echo URL_PUBLIC; ?>find-us?__qlr=<?php echo $unique ;?>_846f61a292e4&__sid=<?php echo $fkey; ?>">All
                                        Branches</a></li>
                                <li><a
                                        href="<?php echo URL_PUBLIC; ?>find-us?__qlr=<?php echo $unique ;?>_299b0c6f&__sid=<?php echo $fkey; ?>&__zm=12">Kigali</a>
                                </li>
                                <li><a
                                        href="<?php echo URL_PUBLIC; ?>find-us?__qlr=<?php echo $unique ;?>_3d99ac0d&__sid=<?php echo $fkey; ?>&__zm=12">
                                        Eastern Province</a></li>
                                <li><a
                                        href="<?php echo URL_PUBLIC; ?>find-us?__qlr=<?php echo $unique ;?>_331050e99b0&__sid=<?php echo $fkey; ?>&__zm=12">
                                        Western Province</a></li>
                                <li><a
                                        href="<?php echo URL_PUBLIC; ?>find-us?__qlr=<?php echo $unique ;?>_7f74dec8&__sid=<?php echo $fkey; ?>&__zm=12">
                                        Northern Province</a></li>
                                <li><a
                                        href="<?php echo URL_PUBLIC; ?>find-us?__qlr=<?php echo $unique ;?>_98f4d0ec6&__sid=<?php echo $fkey; ?>&__zm=12">
                                        Southern Province</a></li>
                            </ul>

                            <h3>ATMs Locations</h3>
                            <ul class="menu-listing">
                                <li><a
                                        href="<?php echo URL_PUBLIC; ?>find-us?__qlr=<?php echo $unique ;?>_e9ee861c45&__sid=<?php echo $fkey; ?>">All
                                        ATMs</a></li>
                                <li><a
                                        href="<?php echo URL_PUBLIC; ?>find-us?__qlr=<?php echo $unique ;?>_eda3b73ea&__sid=<?php echo $fkey; ?>&__zm=12">Kigali</a>
                                </li>
                                <li><a
                                        href="<?php echo URL_PUBLIC; ?>find-us?__qlr=<?php echo $unique ;?>_64e5f2ee&__sid=<?php echo $fkey; ?>&__zm=12">
                                        Eastern Province</a></li>
                                <li><a
                                        href="<?php echo URL_PUBLIC; ?>find-us?__qlr=<?php echo $unique ;?>_154bc889&__sid=<?php echo $fkey; ?>&__zm=12">
                                        Western Province</a></li>
                                <li><a
                                        href="<?php echo URL_PUBLIC; ?>find-us?__qlr=<?php echo $unique ;?>_3ff687c&__sid=<?php echo $fkey; ?>&__zm=12">
                                        Northern Province</a></li>
                                <li><a
                                        href="<?php echo URL_PUBLIC; ?>find-us?__qlr=<?php echo $unique ;?>_eead6600&__sid=<?php echo $fkey; ?>&__zm=12">
                                        Southern Province</a></li>
                            </ul>

                        </div>




                        <div id="all" class="collapse in">


                            <?php  try {
                $db = Record::getConnection();
                $q = $db->prepare($query);
                $q->execute();
                $data = $q->fetchall(PDO::FETCH_OBJ);
                     }
                        catch (PDOException $e) {
                            echo $e->getMessage();
                            echo $q->errorCode();
                        }
                if (empty($data)) {
                   //echo '<p style="padding-left:30px; font-family:Hind-bold, sans-serif;">Sorry! no data avilable.</p>';
                     } 
           else {
 echo '<ul class="menu-listing">';
    foreach($data as $listBranch) {
   echo '<li><a href="'.URL_PUBLIC.'find-us?__qlr= '.$unique.'_gt'.$listBranch->id.'&__sid= '.$fkey.'&option=uniq">';
               echo '<strong>'.$listBranch->name.'</strong><br>';  
                 echo $listBranch->road.'<br>';
                   echo 'P.O. Box 175, Kigali, Rwanda<br>';
                      echo '+250 '.$listBranch->contact.'<br><br>';
                      echo '<strong>Working Hours</strong><br>';
                      
                      if(($listBranch->all_days)==='empty'){
                          echo 'Mon - Fri: '.$listBranch->mon_fri.'<br>'; 
                          echo 'Saturday: '.$listBranch->sat.'<br>';
                          echo 'Sunday: '.$listBranch->sun;
                      }
                      
                      if(($listBranch->all_days)!='empty'){
                      echo $listBranch->all_days;   
                      } 
                echo '</a></li>';
              } 
     echo '</ul>';
           }
             ?>
















                        </div>


                    </div>


                </div>



                <div class="col-md-8 box-in">
                    <div class="top-search">



                        <form action="<?php echo URL_PUBLIC.'find-us'; ?>" method="post">
                            <div class="input-group col-md-12" style="padding-left:15px; padding-right:15px;">
                                <input name="location" maxlength="150" class="form-control input-lg map_input"
                                    placeholder="Search by District, Sector & Cell" required="" type="text">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary btn-lg" type="submit" name="d1b9ba394e">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>



                    </div>
                    <div id="map"></div>

                </div>


            </div>
        </div>
    </div>
</div>



<!-- <script type="text/javascript" src="<?php echo THEMES_PATH; ?>assets/js/gmap.locator.js"></script>-->
<script>
    function initMap() {
    <? php  try {
            //$db = Record::getConnection();
            $stmt = $db -> prepare($query);
            $stmt -> execute();
            $dataForSelect = $stmt -> fetchall(PDO:: FETCH_OBJ);
        }
        catch (PDOException $e) {
                            echo $e -> getMessage();
                            echo $stmt -> errorCode();
        }
        if (empty($dataForSelect)) {
            //echo '<p style="padding-left:30px; font-family:Hind-bold, sans-serif;">Sorry! no data avilable.</p>';
        }
        else {
            foreach($dataForSelect as $record)
            { ?>
     var <? php echo $record -> service.$record -> id; ?> = {
                    info: '<strong><?php echo $record->name;  ?></strong><br>\
      <?php echo $record->road;  ?><br>P.O. Box 175, Kigali, Rwanda<br>\
    	Phone : +250 <?php echo $record->contact;  ?><br><br>\
        <strong>Working Hours</strong><br>\
        <?php if(($listBranch->all_days)==='empty'){?><br>\
        <?php  echo 'Mon - Fri: '.$listBranch->mon_fri; ?><br>\
         <?php  echo 'Saturday: '.$listBranch->sat; ?><br>\
          <?php  echo 'Sunday: '.$listBranch->sun; } ?><br>\
          <?php if(($listBranch->all_days)!='empty'){?><br>\
           <?php  echo $listBranch->all_days; } ?><br>\
       <a href="https://www.google.com/maps/search/?api=1&query=<?php echo $record->latitude.', '.$record->logitude; ?>">Get Direction</a>',
                        lat: <? php echo $record -> latitude;  ?>,
                            long: <? php echo $record -> logitude;  ?>
  };
 <? php  }
        }  ?>



	var locations = [
    <? php try {
            $stmt2 = $db -> prepare($query);
            $stmt2 -> execute();
            $data = $stmt2 -> fetchall(PDO:: FETCH_OBJ);
        }
        catch (PDOException $e) {
                            echo $e -> getMessage();
                            echo $stmt2 -> errorCode();
        }
        if (empty($data)) {
            //echo '<p style="padding-left:30px; font-family:Hind-bold, sans-serif;">Sorry! no data avilable.</p>';
        }
        else {
            foreach($data as $info){
    ?>
                    [<? php echo $info -> service.$info -> id; ?>.info, <? php echo $info -> service.$info -> id; ?>.lat, <? php echo $info -> service.$info -> id; ?>.long, <? php echo $info -> id; ?>],
 
 <? php }
        } ?>
 ];

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 9 <? php //if(!empty(htmlspecialchars($_GET['__zm']))){ echo htmlspecialchars($_GET['__zm']); } else{ echo 9; } ?>,
		center: new google.maps.LatLng(-1.947874, 30.059625),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var infowindow = new google.maps.InfoWindow({});

        var marker, i;

        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map
            });

            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    infowindow.setContent(locations[i][0]);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
    }

</script>
<!--<script async defer 	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAN-v6oA36_EoDEUEdXp5R_AfR1YLsIbKQ&callback=initMap"></script>-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAV9ZH0ifOsqU6WEJ2CDsZ5duHdaDPZI3Y&amp;callback=initMap"
    type="text/javascript"></script>

</body>
</html>