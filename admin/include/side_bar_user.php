				<div class="sidebar-user media">                    
                    <img src="../images/profile_img/<?php echo $user_obj->getProfileImg(); ?>" alt="user" class="rounded-circle img-thumbnail mb-1">
                    <span class="online-icon"><i class="mdi mdi-record text-success"></i></span>
                    <div class="media-body align-item-center">
                        <h5><?php echo $user_obj->getFirstName() . " " . $user_obj->getLastName(); ?></h5>
                    </div>                    
                </div>