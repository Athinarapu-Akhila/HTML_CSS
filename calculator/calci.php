 <?php
    if(isset($_POST["s1"])){
        $n1=$_POST["num1"];
        $n2=$_POST["num2"];
        $op=$_POST["operator"];
        $conn = mysqli_connect("localhost","root","") or die("Connection failed: ");
		$db=mysqli_select_db($conn,"akhila") or die("Database not selected");
        $res=mysqli_query($conn,"SELECT * from `calculator` where '$n1'=num1 && '$n2'=num2 && '$op'=operator");
        if(mysqli_num_rows($res)!=0){
            while($x=mysqli_fetch_array($res)){
                echo "RESULT".$x['result'];
                echo "<br> (From Database)";
            }
        }
        else{
            switch($op){
                case '+': $res=$n1+$n2;
                break;
                case '-': $res=$n1-$n2;
                break;
                case '*': $res=$n1*$n2;
                break;
                case'/': $res=$n1/$n2;
                break;
                case '%': $res=$n1%$n2;
                break;
            }
            mysqli_query($conn,"insert into calculator values($n1,'$op',$n2,$res)");
            echo "RESULT : $res <br> (from computation)";

        }
    }
    ?>