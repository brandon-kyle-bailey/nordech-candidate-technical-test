<?php
    $myArray = [
        [1, 'a'],
        [15, 'b'],
        [4, 'c'],
        [8, 'd'],
        [12, 'e'],
        [22, 'f'],
    ];
    
    
    echo ' Unsorted Array: <br>';
    var_dump($myArray);
    echo '<p></p>';
   
    
    function s($array)
    {
            for ($i=0;$i<sizeof($array)-1;$i++)
            {
                    for ($j=$i+1;$j<sizeof($array);$j++)
                    {
                            if ($array[$j][0] < $array[$i][0])
                            {
                                    for ($k=0;$k<2;$k++)
                                    {       $a[$k] = $array[$i][$k];
                                            $array[$i][$k] = $array[$j][$k];
                                            $array[$j][$k] = $a[$k];
                                    }
                            }
                    }
            }
            return $array;
    }

    echo ' Sorting Array using spaghetti: <br>';
    var_dump(s($myArray));
    echo '<p></p>';
   
   // This is an array sorting operation in the ascending order. We can perform the same operation using the following: 
		usort($myArray, function($a, $b){
			if($a[0] == $b[0]){
				return 0;
			}else{
				return $a['0'] < $b['0'] ? -1 : 1;
			}
		});
		
    echo ' Sorting Array using cleaner PHP5 approach : <br>';
    var_dump($myArray);
    
?>

