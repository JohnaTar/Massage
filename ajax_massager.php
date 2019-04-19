<?php 

    include ('connect/connect.php');
                          $db = new Database();
                          $sql ='SELECT
prefix.prefix_name,
massager.massager_id,
massager.f_name,
massager.l_name,
massager.n_name,
massager.date_birth,
massager.date_start,
massager.line,
massager.facebook,
massager.instagram,
location.location_name,
massager.tel,
rate.thai_massage,
rate.foot_massage,
rate.oil_massage,
rate.neck_massage
FROM
massager
INNER JOIN prefix ON massager.prefix_id = prefix.prefix_id
INNER JOIN location ON massager.location_id = location.location_id
INNER JOIN rate ON massager.massager_id = rate.massager_id
';

                          $get_data = $db->get_while_data($sql);

                           if(!empty($get_data)){
                                foreach($get_data  as $row){


                            $date = new DateTime($row['date_birth']);
                            $now = new DateTime();
                            $interval = $now->diff($date);
                            $age = $interval->y;

                            $startdate = $row['date_start'];
                            $newDate = date("d-m-Y", strtotime($startdate));
                            $birthdate =$row['date_birth'];
                            $newDate2 = date("d-m-Y", strtotime($birthdate));
                              $response['data'][] = [
       								 'id'           => $row['massager_id'],
        							 'name'         => $row['prefix_name'].' '.$row['f_name'].'              '.$row['l_name'],
       								 'nickname'     => $row['n_name'],
        							 'age'          => $age,
        							 'tel'          => $row['tel'],
        							 'birth'        => $newDate2,
        							 'startdate'    => $newDate,
        							 'facebook'		=> $row['facebook'],
        							 'line'		    => $row['line'],
        							 'instagram'	=> $row['instagram'],
        							 'location'		=> $row['location_name'],
        							 'menu'		    => '
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse'.$row['massager_id'].'" aria-expanded="true" aria-controls="collapseTwo">
        
          <i class="fas fa-tools "></i>
        </a>
        <div id="collapse'.$row['massager_id'].'" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
          
          <li><a class="collapse-item" href="edit_massager?ID='.$row['massager_id'].'">แก้ไข</a></li>
          <li><a class="collapse-item" href="#" onclick="delete_data('.$row['massager_id'].');">ลบ</a></li>
          </div>
        </div>',
                       'thai_massage'       => $row['thai_massage'],
                       'foot_massage'       => $row['foot_massage'],
                       'oil_massage'       => $row['oil_massage'],
                       'neck_massage'       => $row['neck_massage'],

                      ];






                               }

                               echo json_encode($response);
                             }


                      

    


?>