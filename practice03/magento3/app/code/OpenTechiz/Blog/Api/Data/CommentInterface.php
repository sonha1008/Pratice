<?php
namespace OpenTechiz\Blog\Api\Data;
interface CommentInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const COMMENT_ID       = 'comment_id';
    const USER_ID       = 'user_id';
    const POST_ID         = 'post_id';
    const COMMENT       = 'comment';
    const EMAIL         = 'email';
    const PENDING       = 'pending';
    const CREATION_TIME = 'creation_time';
    const UPDATE_TIME   = 'update_time';
    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();
    /**
     *
     * @return string
     */
    public function getUserId();
    /**
     *
     * @return string|null
     */
    public function getPostId();
    /**
     * Get content
     *
     * @return string|null
     */
    public function getComment();
    /**
     * Get creation time
     * 
     * @return string
     */
    public function getEmail();
    /**
     *
     * @return string|null
     */
    public function getPending();

    public function getCreationTime();
    /**
     * Get update time
     *
     * @return string|null
     */
    public function getUpdateTime();
    /**
     * Is active
     *
     * @return bool|null
     */
    /**
     * Set ID
     *
     * @param int $id
     * @return \OpenTechiz\Blog\Api\Data\PostInterface
     */
    public function setId($id);
    /**
     * Set URL Key
     *
     * @param string $url_key
     * @return \OpenTechiz\Blog\Api\Data\PostInterface
     */
    public function setUserId($user_id);
    /**
     * Return full URL including base url.
     *
     * @return mixed
     */
      public function setPostId($post_id);
    /**
     * Set title
     *
     * @param string $title
     * @return \OpenTechiz\Blog\Api\Data\PostInterface
     */
    public function setComment($comment);
    /**
     * Set content
     *
     * @param string $content
     * @return \OpenTechiz\Blog\Api\Data\PostInterface
     */
    public function setEmail($email);

    public function setPending($pending);
    /**
     * Set creation time
     *
     * @param string $creationTime
     * @return \OpenTechiz\Blog\Api\Data\PostInterface
     */
    public function setCreationTime($creationTime);
    /**
     * Set update time
     *
     * @param string $updateTime
     * @return \OpenTechiz\Blog\Api\Data\PostInterface
     */
    public function setUpdateTime($updateTime);
    /**
     * Set is active
     *
     * @param int|bool $isActive
     * @return \OpenTechiz\Blog\Api\Data\PostInterface
     */
}