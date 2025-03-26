<?php
                                                        $rg_id = $_SESSION['fname'];
                                                        // echo $rg_id;
                                                        $email_search = "select id from register WHERE fname='$rg_id' ";
                                                        $query = mysqli_query($con, $email_search);
                                                        $e_count = mysqli_num_rows($query);
                                                        if ($e_count) {
                                                            $e_pass = mysqli_fetch_assoc($query);
                                                            $db_pass = $e_pass['id'];
                                                            // echo $db_pass;
                                                            // echo $db_pass;
                                                            // echo $db_pass;
                                                            // echo $e_pass['id'];
                                                            // $_SESSION['id'] = $e_pass['id'];
                                                            $_SESSION['id'] = $e_pass['id'];
                                                            // echo  $_SESSION['id'];
                                                            $id = $_SESSION['id'];
                                                        }

                                                        // echo $db_pass;

                                                        // include('config/dbcon.php');
                                                        // $rg_id = $_SESSION['fname'];
                                                        $query = "SELECT * from booking WHERE customerid='$db_pass'";
                                                        $query_run = mysqli_query($con, $query);

                                                        if (mysqli_num_rows($query_run) > 0) {
                                                            foreach ($query_run as $row) {
                                                        ?>
                                                        <?php 
                                                        }
                                                    }?>