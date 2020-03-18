<?php
session_start();
error_reporting(0);
include('includes/config.php');
{
if(isset($_POST['add']))
{
$name=$_POST['name'];
$description=$_POST['description'];
$points=$_POST['points'];
$sql="INSERT INTO tblmaterial(Name,Description,Points) VALUES(:name,:description,:points)";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':points',$points,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Material added Successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}

    ?>

    <form class="col s12" name="chngpwd" method="post">
                                          <?php 
                                                    if($error){?>
                                                        <div class="errorWrap"><strong>ERROR</strong> : <?php echo htmlentities($error); ?> </div><?php } 
                                                    else if($msg){?>
                                                        <div class="succWrap"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                                            <div class="input-field col s12">
<input id="name" type="text"  class="validate" autocomplete="off" name="name"  required>
                                                <label for="name">Material Name</label>
                                            </div>


          <div class="input-field col s12">
<textarea id="textarea1" name="description" class="materialize-textarea" name="description" length="500"></textarea>
                                                <label for="deptshortname">Description</label>
                                            </div>
 <div class="input-field col s12">
<textarea id="textarea2" name="points" class="materialize-textarea" name="points" length="500"></textarea>
                                                <label for="deptshortname">Points per kg</label>
                                            </div>




<div class="input-field col s12">
<button type="submit" name="add" class="waves-effect waves-light btn indigo m-b-xs">ADD</button>

</div>




                                        </div>
                                       
                                    </form>
                                    <?php } ?> 