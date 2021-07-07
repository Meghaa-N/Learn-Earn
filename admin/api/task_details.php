<?php

include 'dbconnect.php';

if(isset($_POST['Task_id'])){
    $Task_id = $_POST['Task_id'];

    $qry = "SELECT * FROM tasks WHERE Task_id = $Task_id";

    if($result = $con->query($qry)){
        $val = $result->fetch_assoc();
        ?>
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4" >

          <div class="col-lg-8 " data-aos="zoom-in">
            <div>
          <h1 style="text-align:center;"><?php echo $val['Task_Title'] ?></h1>
          <p style="text-align:center; margin-top: 5%;"><?php echo $val['Description'] ?></p>
          
          <?php if(!is_null($val['Task_PDF']))
            { ?><div class="question_div">

          <p>Reference material</p>
          <a id="q_pdf" href="../<?php echo $val['Task_PDF'] ?>" target="_blank"><?php echo $val['Task_PDF'] ?></a>
        </div >
      <?php } ?>

      <?php if(is_null($val['Submission_file']))
      { ?>
          <form style="margin-top: 5%;" method="post" enctype="multipart/form-data" action="upload_handle.php">
            <label style="display:block;">Your Submission</label>
          <input style="margin-top: 2%;display: block;" id="submission_button" type="file" name="answer">
          <p style="text-align:center"><input type="submit" name="is_submit" id="submit"></p>
        </form>
        <?php }
        else
        {?>
          <div class="question_div">

          <p>Your submission</p>
          <a id="a_pdf" href="../assignments/<?php echo $val['Submission_file'] ?>" target="_blank"><?php echo $val['Submission_Name'] ?></a>
        </div >
      <?php } ?>


        </div>
          </div>

          <div class="col-lg-4" data-aos="fade-left">
            <div class="portfolio-info">
              <h3>DETAILS</h3>
              <ul>
                <li><strong>Due</strong>: <?php echo $val['Due_Timestamp'] ?></li>
                <?php if(!is_null($val['Submission_date_timestamp'])){?>
                  <li><strong>Submitted on</strong>: <?php echo $val['Submission_date_timestamp'] ?></li>
                  <?php } ?>
                  
                <?php if($val['Marks_possible']==0){?>
                  <li><strong>Marks possible</strong>: No Points</li>
                  <?php }

                  else { ?>  
                <li><strong>Marks possible</strong>: <?php echo $val['Marks_possible'] ?></li>
              <?php } ?>
              
              <?php if(!is_null($val['Marks'])){?>
                  <li><strong>Marks obtained</strong>: <?php echo $val['Marks'] ?></li>
                  <?php } ?>
              </ul>
            </div>
            <div class="portfolio-description">
              <h2>Comments from your teacher</h2>
              <p><?php if(!is_null($val['Comment']))
              {
                echo $val['Comment'];
              }
              else
              {
                echo "No Comments yet!";
              }
              ?>
              </p>
              
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

<?php
    }else {
        echo $con->error;
    }
}else{
    echo "BOO";
}