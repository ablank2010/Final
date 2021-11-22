<?php

/*      
Amanda Blank
INFO 1335 WW - Software Engineering Found. II
Hands-on Final Project
11/22/2021

*/
require_once('database.php');


/* ------Class Id 1 ------*/
try{
    $qry = 'SELECT * FROM assignment
    JOIN class 
    ON assignment.class_id = class.class_id 
    WHERE assignment.class_id = 1';

 
$statement = $db->prepare($qry);
$statement->execute();
$assign_1_grade = $statement->fetchAll();
$statement->closeCursor();


}catch (PDOException $e) {
    $error_message = $e->getMessage();
    include 'database_error.php';
    exit();
}


/*------Class ID 2 ------*/
try{
    $qry2 = 'SELECT * FROM assignment
    JOIN class 
    ON assignment.class_id = class.class_id 
    WHERE assignment.class_id = 2';

 
$statement2 = $db->prepare($qry2);
$statement2->execute();
$assign_2_grade = $statement2->fetchAll();
$statement2->closeCursor();


}catch (PDOException $e) {
    $error_message = $e->getMessage();
    include 'database_error.php';
    exit();
}


/*------- Class ID 3 ------*/
try{
    $qry3 = 'SELECT * FROM assignment
    JOIN class 
    ON assignment.class_id = class.class_id 
    WHERE assignment.class_id = 3';

 
$statement3 = $db->prepare($qry3);
$statement3->execute();
$assign_3_grade = $statement3->fetchAll();
$statement3->closeCursor();


}catch (PDOException $e) {
    $error_message = $e->getMessage();
    include 'database_error.php';
    exit();
}

/* ---- Points calculation ID 1 -----*/

try {
$sum1 = 'SELECT SUM(pt_possible)
FROM assignment
WHERE class_id = 1';

$statement4 = $db->prepare($sum1);
$statement4->execute();
$sum_1 = $statement4->fetch();
$statement4->closeCursor();
$sum_1 = $sum_1[0];
}catch (PDOException $e) {
    $error_message = $e->getMessage();
    include 'database_error.php';
    exit();
    
}


try{
$sum2 = 'SELECT SUM(pt_earn)
FROM assignment
WHERE class_id= 1';

$statement5 = $db->prepare($sum2);
$statement5->execute();
$sum_2 = $statement5->fetch();
$statement5->closeCursor();
$sum_2 = $sum_2[0];


} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include 'database_error.php';
    exit();
    
}


/* ------ Points calculation ID 2 -------*/
try {
    $sum3 = 'SELECT SUM(pt_possible)
    FROM assignment
    WHERE class_id = 2';
    
    $statement6 = $db->prepare($sum3);
    $statement6->execute();
    $sum_3 = $statement6->fetch();
    $statement6->closeCursor();
    $sum_3 = $sum_3[0];
    }catch (PDOException $e) {
        $error_message = $e->getMessage();
        include 'database_error.php';
        exit();
        
    }


    try{
        $sum4 = 'SELECT SUM(pt_earn)
        FROM assignment
        WHERE class_id= 2';
        
        $statement7 = $db->prepare($sum4);
        $statement7->execute();
        $sum_4 = $statement7->fetch();
        $statement7->closeCursor();
        $sum_4= $sum_4[0];
        
        
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include 'database_error.php';
            exit();
            
        }

/*-------Points Calculation ID 3 -------*/

try {
    $sum5 = 'SELECT SUM(pt_possible)
    FROM assignment
    WHERE class_id = 3';
    
    $statement8 = $db->prepare($sum5);
    $statement8->execute();
    $sum_5 = $statement8->fetch();
    $statement8->closeCursor();
    $sum_5 = $sum_5[0];
    }catch (PDOException $e) {
        $error_message = $e->getMessage();
        include 'database_error.php';
        exit();
        
    }


    
    try{
        $sum6 = 'SELECT SUM(pt_earn)
        FROM assignment
        WHERE class_id= 3';
        
        $statement9 = $db->prepare($sum6);
        $statement9->execute();
        $sum_6 = $statement9->fetch();
        $statement9->closeCursor();
        $sum_6= $sum_6[0];
        
        
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include 'database_error.php';
            exit();
            
        }



        //----Final Grade Function -----
        function finalGradePerc($endGrade,$grade){
            $gradePercent = ($endGrade/$grade);
            $finalGradePercent =number_format($gradePercent, 2);
        
        
            if($finalGradePercent == 1){
                echo "100%";
            } else{
                $finalGradePercent = $finalGradePercent * 100;
                echo $finalGradePercent."%";
            }
            
        }



?>




 <!DOCTYPE html>
 <head>
     <title>Classes and Grades</title>
     <link rel="stylesheet" href="stylesheet.css">
</head>

<body>
    <main>

<h1>Classes and Grades</h1>


<table>
   





<!-- grades for assignment class_id of 1 -->
<tr>
        <th>Class</th>
        <th>Department</th>
        <th>Number</th>
        <th>Class Section</th>
        <th>Semester</th>
        <th>Year</th>
        <th>Assignment description</th>
        <th>Points Possible</th>
        <th>Points Earned</th>
        <th>Final Percentage</th>
</tr>



<!-- <p><?php// echo '<pre>'; var_dump($assign_1_grade); ?> -->

<tr>
    <?php foreach ($assign_1_grade as $assign_grade) : ?>

    <td><?php echo $assign_grade['name']; ?> </td>
    <td><?php echo $assign_grade['debt']; ?> </td>
    <td><?php echo $assign_grade['num']; ?> </td>
    <td><?php echo $assign_grade['section']; ?> </td>
    <td><?php echo $assign_grade['semester']; ?> </td>
    <td><?php echo $assign_grade['year']; ?> </td>    
    <td><?php echo $assign_grade['description']; ?></td>
    <td><?php echo $assign_grade['pt_possible']; ?></td>
    <td><?php echo $assign_grade['pt_earn']; ?></td>
    <td><?php echo finalGradePerc($assign_grade['pt_earn'],$assign_grade['pt_possible']); ?> </td>
   
</tr>
<?php endforeach;?>


<tr>
    <th colspan='7'></th>
    <th>Total Points Possible</th>
    <th>Total Points Earnted</th>
    <th>Final Grade</th>
</tr>

<tr>
        <td colspan='7'></td>
        <td><?php echo $sum_1;//implode($sum_1); ?></td>
        <td><?php echo $sum_2;?> </td>
        <td><?php echo finalGradePerc($sum_2,$sum_1); ?></td>


      <!-- Testing
        <p><?php// echo '<pre>'; var_dump($sum_1); ?></p>  -->
    </tr>
    
    

    </table>

<!-- grades for assignment class_id of 2 -->
    <table>

<tr>
        <th>Class</th>
        <th>Department</th>
        <th>Number</th>
        <th>Class Section</th>
        <th>Semester</th>
        <th>Year</th>
        <th>Assignment description</th>
        <th>Points Possible</th>
        <th>Points Earned</th>
        <th>Final Percentage</th>
</tr>





<tr>
    <?php foreach ($assign_2_grade as $assign_grade2) : ?>

    <td><?php echo $assign_grade2['name']; ?> </td>
    <td><?php echo $assign_grade2['debt']; ?> </td>
    <td><?php echo $assign_grade2['num']; ?> </td>
    <td><?php echo $assign_grade2['section']; ?> </td>
    <td><?php echo $assign_grade2['semester']; ?> </td>
    <td><?php echo $assign_grade2['year']; ?> </td>    
    <td><?php echo $assign_grade2['description']; ?></td>
    <td><?php echo $assign_grade2['pt_possible']; ?></td>
    <td><?php echo $assign_grade2['pt_earn']; ?></td>
    <td><?php echo finalGradePerc($assign_grade2['pt_earn'],$assign_grade2['pt_possible']); ?> </td>
</tr>
<?php endforeach;?>


<tr>
    <th colspan='7'></th>
    <th>Total Points Possible</th>
    <th>Total Points Earnted</th>
    <th>Final Grade</th>
</tr>

<tr>
        <td colspan='7'></td>
        <td><?php echo $sum_3; ?></td>
        <td><?php echo $sum_4;?> </td>
        <td><?php echo finalGradePerc($sum_4,$sum_3); ?></td>



    </tr>

    </table>



<!-- grades for assignment class_id of 3 -->
    <table>


<tr>
        <th>Class</th>
        <th>Department</th>
        <th>Number</th>
        <th>Class Section</th>
        <th>Semester</th>
        <th>Year</th>
        <th>Assignment description</th>
        <th>Points Possible</th>
        <th>Points Earned</th>
        <th>Final Percentage</th>
</tr>





<tr>
    <?php foreach ($assign_3_grade as $assign_grade3) : ?>

    <td><?php echo $assign_grade3['name']; ?> </td>
    <td><?php echo $assign_grade3['debt']; ?> </td>
    <td><?php echo $assign_grade3['num']; ?> </td>
    <td><?php echo $assign_grade3['section']; ?> </td>
    <td><?php echo $assign_grade3['semester']; ?> </td>
    <td><?php echo $assign_grade3['year']; ?> </td>    
    <td><?php echo $assign_grade3['description']; ?></td>
    <td><?php echo $assign_grade3['pt_possible']; ?></td>
    <td><?php echo $assign_grade3['pt_earn']; ?></td>
    <td><?php echo finalGradePerc($assign_grade3['pt_earn'],$assign_grade3['pt_possible']); ?></td>
</tr>
<?php endforeach;?>

<tr>
    <th colspan='7'></th>
    <th>Total Points Possible</th>
    <th>Total Points Earnted</th>
    <th>Final Grade</th>    
</tr>

<tr>
        <td colspan='7'></td>
        <td><?php echo $sum_5; ?></td>
        <td><?php echo $sum_6;?> </td>
        <td><?php echo finalGradePerc($sum_6,$sum_5) ; ?></td>

 
    </tr>

</table>








</main>
</body>
</html>