<?php 

    include ('connect/connect.php');
                          $db = new Database();
                          $sql ='SELECT member.m_id,prefix.prefix_name,member.f_name,
                                        member.l_name,member.n_name,member.tel,
										member.timestamp,member.date_birth,salary.salary_name,
										member.facebook,member.line,member.instagram,member.job,
										status.status_name,address.adress,address.amphur,
										address.district,address.province,address.zipcode,
										gender.gender_name 
								FROM member
								INNER JOIN prefix ON member.prefix_id = prefix.prefix_id
								INNER JOIN salary ON member.salary_id = salary.salary_id
								INNER JOIN status ON member.status_id = status.status_id
								INNER JOIN address ON member.m_id = address.m_id
								INNER JOIN gender ON member.gender_id = gender.gender_id

';

                          $get_data = $db->get_while_data($sql);

                           if(!empty($get_data)){
                                foreach($get_data  as $row){

                            $startdate = $row['timestamp'];
                            $newDate = date("d-m-Y", strtotime($startdate));
                            $birthdate =$row['date_birth'];
                            $newDate2 = date("d-m-Y", strtotime($birthdate));
                              $response['data'][] = [
       								 'id'           => $row['m_id'],
        							 'name'         => $row['prefix_name'].' '.$row['f_name'].'              '.$row['l_name'],
       								 'nickname'     => $row['n_name'],
       								 'gender'       => $row['gender_name'],
        							 'age'          => '30',
        							 'tel'          => $row['tel'],
        							 'birth'        => $newDate2,
        							 'startdate'    => $newDate,
        							 'salary'       => $row['salary_name'],
        							 'facebook'		=> $row['facebook'],
        							 'line'		    => $row['line'],
        							 'instagram'	=> $row['instagram'],
        							 'job'		    => $row['job'],
        							 'status'		=> $row['status_name'],
        							 'menu'		    => $row['status_name'],
        							 'adress'		=> $row['adress'].' ต.'.$row['district'].' อ.'.$row['amphur'].' จ.'.$row['province'].' '.$row['zipcode']





        						



                                  ];






                               }

                               echo json_encode($response);
                             }


                      

    


?>