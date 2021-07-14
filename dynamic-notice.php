<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'kyauserver786');
define('DB_NAME', 'kyanc');
/* Connection with Database */
$pdo_conn = new PDO("mysql:host=" .DB_SERVER. ";dbname=" .DB_NAME, DB_USERNAME,DB_PASSWORD);
// session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Khwaja Yunus Ali Nursing College</title>
    <link rel='shortcut icon' href='admin/img/favicon/kyanc.ico'>
    <meta charset='utf-16'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='admin/vendor/bootstrap/css/bootstrap.min.css'>
    <link rel="stylesheet" href="admin/css/custom.css">
    <link href='admin/vendor/fontawesome/css/all.css' rel='stylesheet'>
    <script type="text/javascript" src="admin/vendor/jquery/jquery.min.js"></script>
    <script src='admin/vendor/jquery/newsbox.min.js'></script>
    <script src='admin/vendor/popper.js/popper.min.js'></script>
    <script src='admin/vendor/bootstrap/js/bootstrap.min.js'></script>
    <script src='admin/js/newsboxslider.js'></script>
 </head>
   <!-- NOTICE BOARD -->
<?php
//Notice Section
    $query = "SELECT * FROM slidnewsgallery WHERE type = 'notice' and snstatus = 'active' ORDER BY snid DESC LIMIT 5";    
    $stat = $pdo_conn->prepare($query);
    $stat->execute();
    $rowCount = $stat->rowCount();
    $notice = '';
    if ($rowCount >0) {
           foreach ($stat->fetchAll() as $row) {   
            $notice .='<tr>'.
                        '<td><i class="fas fa-bell"></i></td>'.      
                        '<td class="news-item">'.$row['title'].'</td>'.
                        '<td><a href="admin/snfile/'.$row['snfilename'].'" target="_blank" title="click to download"> Download</a></td>'.
                        '<td><b>Post Date:</b>'.$row['sndate'].'</td>'
                      .'</tr>';
           }  
         }   
    $notice_board =  $notice;
?>
      <div class='mt-5 w-100'>
        <div class='notice_board mb-2'>
          <div class='card'>
            <div class='card-header text-center p-0'>
              <div class='p-1'><h6><i class='fas fa-newspaper'></i> NOTICE BOARD</h6></div>
            </div>
            <div class='card-body'>
                  <div class='row'>
                    <div class='col'>
                      <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <td width="10%">SL</td>
                            <td width="30%">Title</td>
                            <td width="30%">File</td>
                            <td width="30%">Date</td>
                          </tr>
                        </thead>
                        <tbody class='notice_board_slider'>              
                              <?php  echo $notice_board;?>                                            
                        </tbody>         
                       </table>
                      </div>
                    </div>
                </div>
            </div>
            <div class='card-footer'>
            </div>
          </div>
        </div>
      </div>             
   <!-- #NOTICE BOARD -->
 </body>
</html>
