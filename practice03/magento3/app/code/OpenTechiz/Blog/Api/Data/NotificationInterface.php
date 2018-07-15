<?php
namespace OpenTechiz\Blog\Api\Data;
interface NotificationInterface
{

    const NOTI_ID       = 'noti_id';
    const COMMENT_ID    = 'comment_id';
    const USER_ID       = 'user_id';
    const POST_ID       = 'post_id';
    const CONTENT       = 'content';
    const CREATION_TIME = 'creation_time';
 
    public function getId();

    public function getUserId();
    
    public function getPostId();
   
    public function getCommentId();
   
    public function getContent();

    public function getCreationTime();
    
    public function setId($id);
    
    public function setUserId($user_id);
    
    public function setPostId($post_id);
    
    public function setCommentId($comment_id);
    
    public function setContent($content);
    
    public function setCreationTime($creationTime);
    
}