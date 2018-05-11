<?php


        require "dbutil.php";
        $db = DbUtil::loginConnection();

        $stmt = $db->stmt_init();

        $Results = '<ul class="Results">';

        if($stmt->prepare("select * from clothing where name like ?") or die(mysqli_error($db))) {

                $searchString = '%' . $_GET['searchName'] . '%';
                $stmt->bind_param(s, $searchString);
                $stmt->execute();
                $stmt->bind_result($clothingID, $imageLink, $name, $price, $stock, $description, $brand, $color, $release_date_year, $release_date_season);
                while($stmt->fetch()) {
                        //echo "<p> $name </p>";
                        $Results .= '<li>';
                        $Results .= '<img src="' . "$imageLink" . '" style="width:230px;height:230px;"/>';
                        $Results .= "<h4>$name</h4>";
                        $Results .= '<p>';
                        $Results .= " $description";
                        $Results .= " $brand";
                        $Results .= " $color" . '</p>';
                        $Results .= '<p>' . "$" . "$price";
                        $Results .= " " . "stock: $stock";
  
                        $Results .= '<p>' . "$release_date_year";
                        $Results .= " $release_date_season" . '</p>';
                        $Results .= '</li>';
                }
                $Results .= '</ul>';
                echo $Results;

                $stmt->close();
        }

        $db->close();


?>