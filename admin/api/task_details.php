<?php

include 'dbconnect.php';

if (isset($_POST['Task_id'])) {
  $Task_id = $_POST['Task_id'];

  $qry = "SELECT * FROM tasks WHERE Task_id = $Task_id";

  if ($result = $con->query($qry)) {
    $val = $result->fetch_assoc();
?>
    <form id='updateData'>
      <section id="portfolio-details" class="portfolio-details">
        <div class="container">

          <div class="row gy-4">

            <div class="col-lg-8 " data-aos="zoom-in">
              <div>

                <input type='hidden' name='Task_id' value='<?php echo $val["Task_id"]; ?>' />
                <div class='form-group mt-3'>
                  <label>Title of Task</label>
                  <input class='form-control' type='text' name='Task_title' value='<?php echo $val['Task_Title'] ?>'>
                </div>
                <div class='form-group mt-3'>
                  <label>Description</label>
                  <textarea class='form-control' name='Description' placeholder='Enter the description'><?php echo $val['Description'] ?></textarea>
                </div>

                <?php if (!is_null($val['Task_PDF'])) { ?>
                  <div class="question_div">

                    <p>Reference material uploaded</p>
                    <a id="q_pdf" href="../<?php echo $val['Task_PDF'] ?>" target="_blank"><?php echo $val['Task_PDF'] ?></a>
                  </div>
                <?php } ?>


                <div class="question_div">

                  <p>Student's submission</p>
                  <a id="a_pdf" href="../assignments/<?php echo $val['Submission_file'] ?>" target="_blank"><?php echo $val['Submission_Name'] ?></a>
                </div>
                <div class="portfolio-description">
                  <h2>Comments</h2>
                  <textarea class='form-control' name='Comment' placeholder='Write your comment.'><?php echo $val['Comment'] ?></textarea>


                </div>

              </div>
            </div>

            <div class="col-lg-4" data-aos="fade-left">
              <div class="portfolio-info">
                <h3>DETAILS</h3>
                <ul>
                  <li><strong>Due</strong>: <input type='datetime-local' class='form-control' name='Due_Timestamp' value='<?php
                                                                                                                          $date = date_create($val["Due_Timestamp"]);
                                                                                                                          echo date_format($date, "Y-m-d") . "T" . date_format($date, "H:i:s") ?>' /></li>
                  <?php if (!is_null($val['Submission_date_timestamp'])) { ?>
                    <li><strong>Submitted on</strong>: <?php echo $val['Submission_date_timestamp'] ?></li>
                  <?php } ?>

                  <li><strong>Marks Obtained</strong><input type='number' id='marks_obtained' class='form-control' name='Marks' value='<?php echo $val['Marks'] ?>' /></li>
                  <li><strong>Marks Possible</strong><input type='number' class='form-control' name='Marks_possible' value='<?php echo $val['Marks_possible'] ?>' /></li>

                  <button type='button' class='btn btn-danger' onclick='remove_grading(<?php echo $val["Task_id"]; ?>)'>Remove Grading</button>
                </ul>
              </div>

            </div>

          </div>

        </div>
      </section><!-- End Portfolio Details Section -->

    </form>


    <script>
      $(document).ready(function() {
        $('#updateData').submit(function(event) {
          event.preventDefault();
          var formValues = $(this).serialize();
          $.post("api/update_task.php", formValues, function(data) {
            alert(data);
            tasks_assigned();
          });

        });
      })

      function remove_grading(task_id) {
        $.post('api/remove_grade.php', {
          task_id: task_id
        }, function(data) {
          alert(data);
          open_task(task_id);
          tasks_assigned();
        })

      }
    </script>
<?php
  } else {
    echo $con->error;
  }
} else {
  echo "BOO";
}
