<!DOCTYPE html>
<?php 
    include_once './admin_base_designs.php';
    require_once __DIR__ . '/../server_side/getGradeLevels.php';
?>
<html>
    <link rel="stylesheet" href="../css/Admin_subjects.css">
    </head>

    <body>
        <div class="subject-main-content">
            <div class="content">
                <div class="add-subject">

                    <form action="../server_side/post_subjects.php" method="post" class="form">
                        <input type="text" placeholder="Enter Subject Name..." name="subject-name">
                        <div class="radio-container">
                            <p> Is this subject being taught in many grade levels?</p>
                            <input type="radio" id="multiLevelYes" name="subject" value="Yes">
                            <label for="multiLevelYes">  Yes </label>
                            <input type="radio" id="multiLevelNo" name="subject" value="No">
                            <label for="multiLevelNo"> No </label>
                        </div>
                        <div class="select-container" id="select-container">
                            <select name="subject-level" id="subject-level">
                            <?php 
                                $view = new getGradeLevels();
                                $view->createSelectValues();
                            ?>
                        </select>
                        </div>
                        <div class="checkbox-container" id="checkbox-container">
                            <div class="drop-down">
                                <button type="button" id="toggleCheckBox"> Select Subjects applicable </option>
                            </div>
                           <div class="checkboxes" id="checkboxes">
                                <?php 
                                $view = new getGradeLevels();
                                $view->createCheckBoxes();
                                ?>
                           </div>
                        </div>
                        <button type="submit" class="submit-button"> Add subject </button>
                    </form>
                </div>
            </div>
        </div>
    </body>
<script src="../js/subjects-validation.js"defer></script>
</html>