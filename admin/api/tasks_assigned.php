<?php

include 'dbconnect.php';

if(isset($_POST['student_id'])){
    $student = $_POST['student_id'];

    ?>
 
    <div class='container'>
        
            <?php
                  $sql="SELECT * FROM tasks where Task_Status=1 and Student_id=$student";
                  if($result=$con->query($sql)){
                      ?>
                    
                    <div class="row mt-3" data-aos="fade-up" data-aos-delay="200">
                    <h3>Assigned</h3>
                      <?php
                    while($val=$result->fetch_assoc()){
                        ?>

                        <div class="col-md-3 col-sm-6 item">
                            <div class="card item-card card-block p-4" >
                            <h4 class="card-title"><?php echo $val['Task_Title'] ?></h4>
                            <!-- img src="https://static.pexels.com/photos/7096/people-woman-coffee-meeting.jpg" alt="Photo of sunset" -->
                                <h5 class="item-card-title mt-3 mb-3">Due on: <?php echo $val['Due_Timestamp'] ?></h5>
                                <p class="card-text">This is a company that builds websites, web apps and e-commerce solutions.</p> 
                                <button onclick='open_task(<?php echo $val["Task_id"]?>)' type="hidden" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#taskViewModal">
                                    View Assignment
                                </button>
                            </div>
                        </div>


                        <?php
                    }
                    ?>
                    </div>
                    <?php
                  }else{
                      echo $con->error;
                  }

            ?>

            <?php
                  $sql="SELECT * FROM tasks where Task_Status=2 and Student_id=$student";
                  if($result=$con->query($sql)){
                    ?>
                  
                  <div class="row mt-3" data-aos="fade-up" data-aos-delay="200">
                  <h3>Completed</h3>
                    <?php
                  while($val=$result->fetch_assoc()){
                      ?>

                      <div class="col-md-3 col-sm-6 item">
                          <div class="card item-card card-block p-4" >
                          <h4 class="card-title"><?php echo $val['Task_Title'] ?></h4>
                          <!-- img src="https://static.pexels.com/photos/7096/people-woman-coffee-meeting.jpg" alt="Photo of sunset" -->
                              <h5 class="item-card-title mt-3 mb-3">Due on: <?php echo $val['Due_Timestamp'] ?></h5>
                              <p class="card-text">Submitted on: <?php echo $val['Submission_date_timestamp'] ?></p> 
                              <button onclick='open_task(<?php echo $val["Task_id"]?>)' type="hidden" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#taskViewModal">
                                    View Assignment
                                </button>
                          </div>
                      </div>

                      <?php
                  }
                  ?>
                  </div>
                  <?php
                }else{
                    echo $con->error;
                }

            ?>

<?php
                  $sql="SELECT * FROM tasks where Task_Status=3 and Student_id=$student";
                  if($result=$con->query($sql)){
                    ?>
                  
                  <div class="row mt-3" data-aos="fade-up" data-aos-delay="200">
                  <h3>Graded</h3>
                    <?php
                  while($val=$result->fetch_assoc()){
                      ?>

                      <div class="col-md-3 col-sm-6 item">
                          <div class="card item-card card-block p-4" >
                          <h4 class="card-title"><?php echo $val['Task_Title'] ?></h4>
                          <!-- img src="https://static.pexels.com/photos/7096/people-woman-coffee-meeting.jpg" alt="Photo of sunset" -->
                              <h5 class="item-card-title mt-3 mb-3">Due on: <?php echo $val['Due_Timestamp'] ?></h5>
                              <div class="card-text">
                                  <p>Submitted on: <?php echo $val['Submission_date_timestamp'] ?></p>
                                  <p>Marks: <?php echo $val['Marks']. '/'. $val['Marks_possible'];?></p>
                                </div> 
                                <button onclick='open_task(<?php echo $val["Task_id"]?>)' type="hidden" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#taskViewModal">
                                    View Assignment
                                </button>
                          </div>
                      </div>
                      <!--div class=" portfolio-item filter-app" id=<?php echo $val['Task_id'] ?> onclick="assignment_divert(this.id)">
                          <div style="margin-bottom: 2px;" class="portfolio-wrap">
                          <div class="topic_tabs"  >
                              <h3 style="text-align: center; font-size: 18px;"></h3>
                              <p style="text-align: center;">Due: </p>
                          </div>
                          </div>
                      </div --->

                      <?php
                  }
                  ?>
                  </div>
                  <?php
                }else{
                    echo $con->error;
                }

            ?>      
    </div>

<?php
}