<?php
session_start();
error_reporting(0);
include('includes/config.php');{
if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "delete from  tblmaterial  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();
$msg="Material deleted";

}
 ?>

 <tbody>
<?php $sql = "SELECT * from tblmaterial";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
                                        <tr>
                                            <td> <?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($result->Name);?></td>
                                            <td><?php echo htmlentities($result->Description);?></td>
                                            <td><?php echo htmlentities($result->Points);?></td>
                                            <td><?php echo htmlentities($result->CreationDate);?></td>
                                            <td><a href="editmaterial.php?lid=<?php echo htmlentities($result->id);?>"><i class="material-icons">mode_edit</i></a>
                                            <a href="managematerial.php?del=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you want to delete');"> <i class="material-icons">delete_forever</i></a> </td>
                                        </tr>
                                         <?php $cnt++;} }?>
                                    </tbody>
                                    <?php } ?>