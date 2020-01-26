 <?php include "inc/header.php"; ?>
 <?php 
    spl_autoload_register(function($class){
        include "classes/".$class.".php";
    });
 ?>
 <?php 
 $user=new Student();
 if(isset($_POST['create'])){
    $name=$_POST['name'];
    $dept=$_POST['dept'];
    $age=$_POST['age'];

    $user->setName($name);
    $user->setDept($dept);
    $user->setAge($age);

    if($user->insert()){
        echo "Your insert is <strong>successfully</strong>";
    }

 }

if(isset($_POST['Update'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $dept=$_POST['dept'];
    $age=$_POST['age'];

    $user->setName($name);
    $user->setDept($dept);
    $user->setAge($age);

    if($user->Update($id)){
        echo "Your Update is <strong>successfully</strong>";
    }

 }


 ?>
<?php 
    if(isset($_GET['action']) && $_GET['action']=='Delete'){
    $id= (int)$_GET['id'];
    if($user->Delete($id)){
        echo "Your Delete is <strong>successfully</strong>";
    }
}

 ?>


<?php 
    if(isset($_GET['action']) && $_GET['action']=='Update'){
    $id= (int)$_GET['id'];
    $result =$user->readById($id);

 ?>
<form action="" method="post">
 <table>
    <tr>

        <input type="hidden" name="id" value="<?php echo $result['id'] ;?>"/>

        <td>Name: </td>
        <td><input type="text" name="name" value="<?php echo $result['name'] ;?>" required="1"/></td>    
    </tr>

    <tr>
       <td>Department: </td>
        <td><input type="text" name="dept" value="<?php echo $result['dept'] ;?>" required="1"/></td>
    </tr>

    <tr>
      <td>Age: </td>
        <td><input type="text" name="age" value="<?php echo $result['age'] ;?>" required="1"/></td>
    </tr>
    <tr>
      <td></td>
        <td>
        <input type="submit" name="Update" value="Submit"/>
        <input type="reset" value="Clear"/>
        </td>
    </tr>
  </table>
</form>

<?php } else { ?>

<section class="mainleft">
<form action="" method="post">
 <table>
    <tr>
        <td>Name: </td>
        <td><input type="text" name="name" placeholder="Your name" required="1"/></td>    
    </tr>

    <tr>
       <td>Department: </td>
        <td><input type="text" name="dept" placeholder="Your Department" required="1"/></td>
    </tr>

    <tr>
      <td>Age: </td>
        <td><input type="text" name="age" placeholder="Your Age" required="1"/></td>
    </tr>
    <tr>
      <td></td>
        <td>
        <input type="submit" name="create" value="Submit"/>
        <input type="reset" value="Clear"/>
        </td>
    </tr>
  </table>
</form>

</section>

<?php } ?>

<section class="mainright">
  <table class="tblone">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Department</th>
        <th>Age</th>
        <th>Action</th>
    </tr>
 <?php 
$i=0;
    foreach ($user->readAll() as $key => $value){ 
        $i++;
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td> <?php echo $value['name'];?></td>
        <td><?php echo $value['dept'];?></td>
        <td><?php echo $value['age'];?></td>
        <td>
          <?php echo "<a href='index.php?action=Update&&id=".$value['id']."'>Edit<a>";?> ||
            <?php echo "<a href='index.php?action=Delete&&id=".$value['id']."'onClick='return confirm(\"Are you sure delete your Data.....\")'>Delete<a>";?>
        </td>
    </tr>
<?php } ?>
   
  </table>
</section>
<?php include "inc/footer.php"; ?>