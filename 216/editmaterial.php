<?php
session_start();
error_reporting(0);
include('includes/config.php');
{
if(isset($_POST['update']))
{
$lid=intval($_GET['lid']);
$name=$_POST['name'];
$description=$_POST['description'];
$points=$_POST['points'];
$sql="update tblmaterial set Name=:name,Description=:description,Points=:points where id=:lid";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':points',$points,PDO::PARAM_STR);
$query->bindParam(':lid',$lid,PDO::PARAM_STR);
$query->execute();

$msg="Material updated Successfully";


}

    ?>

                <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title">Edit Material</div>
                    </div>
                    <div class="col s12 m12 l6">
                        <div class="card">
                            <div class="card-content">
                              
                                <div class="row">
                                    <form class="col s12" name="chngpwd" method="post">
                                          <?php if($error){?><div class="errorWrap"><strong>ERROR</strong> : <?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
<?php
$lid=intval($_GET['lid']);
$sql = "SELECT * from tblmaterial where id=:lid";
$query = $dbh -> prepare($sql);
$query->bindParam(':lid',$lid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  

                                        <div class="row">
                                            <div class="input-field col s12">
<input id="name" type="text"  class="validate" autocomplete="off" name="name" value="<?php echo htmlentities($result->Name);?>"  required>
                                                <label for="name">Material Name</label>
                                            </div>


          <div class="input-field col s12">
<textarea id="textarea1" name="description" class="materialize-textarea" name="description" length="500"><?php echo htmlentities($result->Description);?></textarea>
                                                <label for="deptshortname">Description</label>
                                            </div>
                                            <div class="input-field col s12">
<textarea id="textarea2" name="points" class="materialize-textarea" name="points" length="500"><?php echo htmlentities($result->Points);?></textarea>
                                                <label for="deptshortname">Points</label>
                                            </div>
 
<?php }} ?>



<div class="input-field col s12">
<button type="submit" name="update" class="waves-effect waves-light btn indigo m-b-xs">Update</button>

</div>




                                        </div>
                                       
                                    </form>
                                </div>
                            </div>
                        </div>
                     
             
                   
                    </div>
                
                </div>
            </main>
<?php } ?> 