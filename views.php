<?php 
namespace views
{   require_once "vaccum.php";
    use validate\comments_n_story_validate;
    $comment_n_story = new comments_n_story_validate();
    class viewsAdmin
    {
        /* 
            :::
                :::
                    PUBLICATION :::
                            ::: 
        */
        public function pFirst($publicationContainer)
        {   if(empty($publicationContainer))
                echo '<div class="no-post">No Publications Made Yet</div>';
            else 
            {
                foreach($publicationContainer AS $container)
                {
                    echo '<span class="title"><a href="s_publication.php?ref='.$container['rand_id'].'">'; 
                        echo $container['p_title'];  
                    echo '</a></span><br>';
        
                    echo '<span class="date">'; 
                            echo date("{ D } d-M-Y",strtotime($container['p_time'])); 
                    echo '</span><br><hr>';
                }
            }
        
        }
        public function pSecond($publicationContainer)
        {   if(empty($publicationContainer))
                echo '<span  class="no-post">No Publications Made Yet</span>';
            else 
            {
                foreach($publicationContainer AS $container)
                {
                    
                    if($container['icon_name']=="no name")
                    {
                        $description = $GLOBALS['comment_n_story']->clean_comment_from_database($container['P_desc']);
                        echo '<span class="title">'; echo strtoupper($container['p_title']); echo '</span><br>';
                        echo '<span class="date">'; echo date("{ D } d-M-Y",strtotime($container['p_time'])); echo '</span><br><hr>';
                        echo '<span class="main-content">'; echo "CONTENT"; echo'<br>';
                        echo '<span class="content">'; echo $description; echo '</span><br><hr>';
                        echo '<span class="author">'; echo '<span class="tag">AUTHOR : </span>'; echo strtoupper($container['p_author']); echo '</span><br>';
                        echo '<hr>';
                        echo '<div class="edit-btns">';
                            echo '<a href="e_published.php?ref='.$container['rand_id'].'" class="btn btn-md btn-primary ">Edit</a>';
                            echo '<a href="r_published.php?ref='.$container['rand_id'].'" class="btn btn-md btn-danger">Delete</a></div>';
                    }
                    else 
                    {
                        echo '<span class="title">'; echo strtoupper($container['p_title']); echo '</span><br>';
                        echo '<span class="date">'; echo date("{ D } d-M-Y",strtotime($container['p_time'])); echo '</span><br><hr>';
                        echo '<span class="img">'; echo '<img src="'.$container['icon_url'].$container['icon_name'].'" alt="PUBLICATION_IMAGE" />'; echo '</span>';
                        echo '<span class="main-content">'; echo "CONTENT"; echo'<hr>';
                        echo '<span class="content">'; echo $container['P_desc']; echo '</span><br><hr>';
                        echo '<span class="author">'; echo '<span class="tag">AUTHOR : </span>'; echo strtoupper($container['p_author']); echo '</span><br>';
                        echo '<hr>';
                        echo '<div class="edit-btns">';
                            echo '<a href="e_published.php?ref='.$container['rand_id'].'" class="btn btn-md btn-primary ">Edit</a>';
                            echo '<a href="r_published.php?ref='.$container['rand_id'].'" class="btn btn-md btn-danger">Delete</a></div>';
                    }
                }
            }
        }

        /* 
            :::
                :::
                    JOB :::
                            ::: 
        */
        public function jFirst($JobManager)
        {   
            if(empty($JobManager))
                echo '<div class="no-post">No Job Posts Made Yet</div>';
            else 
            {   foreach($JobManager AS $container)
                {
                    echo '<span class="title"><a href="s_job.php?ref='.$container['rand_id'].'">'; 
                        echo strtoupper($container['j_title']);  
                    echo '</a></span><br>';

                    echo '<span class="date">'; 
                            echo date("{ D } d-M-Y",strtotime($container['j_time'])); 
                    echo '</span><br><hr>';
                }
            }
        }
        public function jSecond($JobManager)
        {   if(empty($JobManager))
                echo '<div class="no-post">No Job Posts Made Yet</div>';
            else 
            { 
                foreach($JobManager AS $container)
                {
                    if($container['icon_name']=="no name")
                    {
                        $j_desc = $GLOBALS['comment_n_story']->clean_comment_from_database($container['j_desc']);
                        $j_req = $GLOBALS['comment_n_story']->clean_comment_from_database($container['j_req']);
                        echo '<span class="title">'; echo strtoupper($container['j_title']); echo '</span><br>';
                        echo '<span class="date">'; echo date("{ D } d-M-Y",strtotime($container['j_time'])); echo '</span><br><hr>';
                        echo '<span class="job-desc">'; echo "DESCRIPTION"; echo'<br>';
                        echo '<span class="content">'; echo $j_desc; echo '</span><br><hr>';
                        echo '<span class="job-desc">'; echo "REQUIREMENT(S)"; echo'<br>';
                        echo '<span class="content">'; echo $j_req; echo '</span><br><hr>';
                        echo '<span class="author">'; echo '<span class="tag">AUTHOR : </span>'; echo strtoupper($container['j_author']); echo '</span><br><hr>';
                        echo '<div class="edit-btns">';
                            echo '<a href="e_job.php?ref='.$container['rand_id'].'" class="btn btn-md btn-primary ">Edit</a>';
                            echo '<a href="r_job.php?ref='.$container['rand_id'].'" class="btn btn-md btn-danger">Delete</a></div>';
                    }
                    else 
                    {
                        $j_desc = $GLOBALS['comment_n_story']->clean_comment_from_database($container['j_desc']);
                        $j_req = $GLOBALS['comment_n_story']->clean_comment_from_database($container['j_req']);
                        echo '<span class="title">'; echo strtoupper($container['j_title']); echo '</span><br>';
                        echo '<span class="date">'; echo date("{ D } d-M-Y",strtotime($container['j_time'])); echo '</span><br><hr>';
                        echo '<span class="img">'; echo '<img src="'.$container['icon_url'].$container['icon_name'].'" alt="PUBLICATION_IMAGE" />'; echo '</span>';
                        echo '<div class="job-desc"><span class="title">'; echo "DESCRIPTION"; echo'</span><hr>';
                        echo '<span class="content">'; echo $j_desc; echo '</span></div><br>';
                        echo '<div class="job-req"><span class="job-req">'; echo "REQUIREMENT(S)"; echo'<hr>';
                        echo '<span class="content">'; echo $j_req; echo '</span></div><hr>';
                        echo '<div class="author"><span class="write">'; echo '<span class="tag">AUTHOR : </span>'; echo strtoupper($container['j_author']); echo '</span></div><br><hr>';
                        echo '<div class="edit-btns">';
                            echo '<a href="e_job.php?ref='.$container['rand_id'].'" class="btn btn-md btn-primary ">Edit</a>';
                            echo '<a href="r_job.php?ref='.$container['rand_id'].'" class="btn btn-md btn-danger">Delete</a></div>';
                    
                    }
                    
                }
            }
        }

        /* 
            :::
                :::
                    FEEDBACK :::
                            ::: 
        */
        public function fFirst($FeedManager)
        {   
            if(empty($FeedManager))
                echo '<div  class="no-post">No Feedback Received Yet</div>';
            else 
            { 
                foreach($FeedManager AS $container)
                {
                    echo '<span class="title"><a href="s_feed.php?ref='.$container['rand_id'].'">'; 
                        echo strtoupper($container['f_name']);  
                    echo '</a></span><br>';

                    echo '<span class="date">'; 
                            echo date("{ D } d-M-Y",strtotime($container['f_time'])); 
                    echo '</span><br><hr>';
                }
            }
        }
        public function fSecond($FeedManager)
        {  if(empty($FeedManager))
                echo '<div class="no-post">No Feedback Received Yet</div>';
            else 
            { foreach($FeedManager AS $container)
                {
                    
                        echo '<span class="title">'; echo strtoupper($container['f_name']); echo '</span><br>';
                        echo '<span class="date">'; echo date("{ D } d-M-Y",strtotime($container['f_time'])); echo '</span><br><hr>';
                        echo '<span class="main-content">'; echo "Message"; echo'<br><hr>';
                        echo '<span class="content">'; echo $container['f_message']; echo '</span><br><hr>';
                        echo '<span class="content">'; echo 'Contacts'; echo '</span><br><hr>';
                        echo '<span class="contact">'; echo $container['f_num']; echo '</span><br>';
                        echo '<span class="contact">'; echo $container['f_email']; echo '</span><br>';
                }
            }
        }
    }
    class viewsUser
    {
        /* 
            :::
                :::
                    PUBLICATION :::
                            ::: 
        */
        public function pFirst($publicationContainer)
        {   if(empty($publicationContainer))
                echo '<div class="no-post">No Publications Made Yet</div>';
            else 
            {
                foreach($publicationContainer AS $container)
                {
                    echo '<span class="title"><a href="us_publication.php?ref='.$container['rand_id'].'">'; 
                        echo $container['p_title'];  
                    echo '</a></span><br>';
        
                    echo '<span class="date">'; 
                            echo date("{ D } d-M-Y",strtotime($container['p_time'])); 
                    echo '</span><br><hr>';
                }
            }
        
        }
        public function pSecond($publicationContainer)
        {   if(empty($publicationContainer))
                echo '<span  class="no-post">No Publications Made Yet</span>';
            else 
            {
                foreach($publicationContainer AS $container)
                {
                    $description = $GLOBALS['comment_n_story']->clean_comment_from_database($container['P_desc']);
                    if($container['icon_name']=="no name")
                    {
                        echo '<span class="title">'; echo strtoupper($container['p_title']); echo '</span><br>';
                        echo '<span class="date">'; echo date("{ D } d-M-Y",strtotime($container['p_time'])); echo '</span><br><hr>';
                        echo '<span class="ctitle">'; echo " "; echo'</span><br>';
                        echo '<span class="content">'; echo $description; echo '</span><br><hr>';
                        echo '<span class="author">'; echo '<span class="tag">AUTHOR : </span>'; echo strtoupper($container['p_author']); echo '</span><br>';
                        echo '<hr>';
                       
                    }
                    else 
                    {
                        echo '<h5 class="title">'; echo strtoupper($container['p_title']); echo '</h5>';
                        echo '<span class="date">'; echo date("{ D } d-M-Y",strtotime($container['p_time'])); echo '</span><br><hr>';
                        echo '<span class="img">'; echo '<img src="'.str_replace("../","",$container['icon_url']).$container['icon_name'].'" alt="PUBLICATION_IMAGE" />'; echo '</span>';
                        echo '<span class="ctitle">'; echo "CONTENT"; echo'</span><hr>';
                        echo '<span class="content">'; echo $container['P_desc']; echo '</span><br><hr>';
                        echo '<span class="author">'; echo 'AUTHOR : '; echo strtoupper($container['p_author']); echo '</span><br>';
                        echo '<hr>';
                       
                    }
                }
            }
        }

        /* 
            :::
                :::
                    JOB :::
                            ::: 
        */
        public function jFirst($JobManager)
        {   
            if(empty($JobManager))
                echo '<div class="no-post">No Job Posts Made Yet</div>';
            else 
            {   foreach($JobManager AS $container)
                {
                    echo '<span class="title"><a href="us_jobs.php?ref='.$container['rand_id'].'">'; 
                        echo strtoupper($container['j_title']);  
                    echo '</a></span><br>';

                    echo '<span class="date">'; 
                            echo date("{ D } d-M-Y",strtotime($container['j_time'])); 
                    echo '</span><br><hr>';
                }
            }
        }
        public function jSecond($JobManager)
        {   if(empty($JobManager))
                echo '<div class="no-post">No Job Posts Made Yet</div>';
            else 
            { 
                foreach($JobManager AS $container)
                {
                    if($container['icon_name']=="no name")
                    {
                        $j_desc = $GLOBALS['comment_n_story']->clean_comment_from_database($container['j_desc']);
                        $j_req = $GLOBALS['comment_n_story']->clean_comment_from_database($container['j_req']);
                        echo '<span class="title"><strong>'; echo strtoupper($container['j_title']); echo '</strong></span><br>';
                        echo '<span class="date">'; echo date("{ D } d-M-Y",strtotime($container['j_time'])); echo '</span><br><hr>';
                        echo '<span class="job-desc"><strong>'; echo "JOB DESCRIPTION"; echo'</strong><br>';
                        echo '<span class="content">'; echo$j_desc; echo '</span><br><hr>';
                        echo '<span class="job-desc"><strong>'; echo "JOB REQUIREMENT(S)"; echo'</strong><br>';
                        echo '<span class="content">'; echo $j_req; echo '</span><br><hr>';
                        echo '<span class="author">'; echo '<span class="tag">AUTHOR : </span>'; echo strtoupper($container['j_author']); echo '</span><br><hr>';
                       
                    }
                    else 
                    {
                        $j_desc = $GLOBALS['comment_n_story']->clean_comment_from_database($container['j_desc']);
                        $j_req = $GLOBALS['comment_n_story']->clean_comment_from_database($container['j_req']);
                        echo '<span class="title"><strong>'; echo strtoupper($container['j_title']); echo '</strong></span><br>';
                        echo '<span class="date">'; echo date("{ D } d-M-Y",strtotime($container['j_time'])); echo '</span><br><hr>';
                        echo '<span class="img">'; echo '<img src="'.str_replace("../","",$container['icon_url']).$container['icon_name'].'" alt="PUBLICATION_IMAGE" />'; echo '</span>';
                        echo '<div class="job-desc"><span class="title"><strong>'; echo "JOB DESCRIPTION"; echo'</strong></span><hr>';
                        echo '<span class="content">'; $j_desc; echo '</span></div><br>';
                        echo '<div class="job-req"><span><strong>'; echo "JOB REQUIREMENT(S)"; echo'</strong></span><hr>';
                        echo '<span class="content">'; echo $j_req; echo '</span></div><hr>';
                        echo '<div class="author"><span class="write">'; echo '<span class="tag">AUTHOR : </span>'; echo strtoupper($container['j_author']); echo '</span></div><br><hr>';
                    
                    }
                    
                }
            }
        }

        /* 
            :::
                :::
                    FEEDBACK :::
                            ::: 
        */
        public function fFirst($FeedManager)
        {   
            if(empty($FeedManager))
                echo '<div  class="no-post">No Feedback Received Yet</div>';
            else 
            { 
                foreach($FeedManager AS $container)
                {
                    echo '<span class="title"><a href="s_feed.php?ref='.$container['rand_id'].'">'; 
                        echo strtoupper($container['f_name']);  
                    echo '</a></span><br>';

                    echo '<span class="date">'; 
                            echo date("{ D } d-M-Y",strtotime($container['f_time'])); 
                    echo '</span><br><hr>';
                }
            }
        }
        public function fSecond($FeedManager)
        {  if(empty($FeedManager))
                echo '<div class="no-post">No Feedback Received Yet</div>';
            else 
            { foreach($FeedManager AS $container)
                {
                    
                        echo '<span class="title">'; echo strtoupper($container['f_name']); echo '</span><br>';
                        echo '<span class="date">'; echo date("{ D } d-M-Y",strtotime($container['f_time'])); echo '</span><br><hr>';
                        echo '<span class="main-content">'; echo "Message"; echo'<br><hr>';
                        echo '<span class="content">'; echo $container['f_message']; echo '</span><br><hr>';
                        echo '<span class="content">'; echo 'Contacts'; echo '</span><br><hr>';
                        echo '<span class="contact">'; echo $container['f_num']; echo '</span><br>';
                        echo '<span class="contact">'; echo $container['f_email']; echo '</span><br>';
                }
            }
        }
    }
}
    
