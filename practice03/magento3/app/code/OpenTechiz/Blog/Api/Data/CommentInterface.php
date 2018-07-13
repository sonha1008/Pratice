<?php
namespace OpenTechiz\Blog\Api\Data;
interface CommentInterface
{

    const COMMENT_ID       = 'comment_id';
    const USER_ID       = 'user_id';
    const POST_ID         = 'post_id';
    const COMMENT       = 'comment';
    const EMAIL         = 'email';
    const PENDING       = 'pending';
    const CREATION_TIME = 'creation_time';
    const UPDATE_TIME   = 'update_time';
 
    public function getId();

    public function getUserId();
    
    public function getPostId();
   
    public function getComment();
   
    public function getEmail();
    
    public function getPending();

    public function getCreationTime();
    
    public function getUpdateTime();
    
    public function setId($id);
    
    public function setUserId($user_id);
    
    public function setPostId($post_id);
    
    public function setComment($comment);
    
    public function setEmail($email);

    public function setPending($pending);
    
    public function setCreationTime($creationTime);
    
    public function setUpdateTime($updateTime);

}